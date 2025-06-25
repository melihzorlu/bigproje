<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use App\Models\ComplaintFile;
use App\Models\Company;
use App\Models\Category;
use App\Models\ComplaintCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ComplaintController extends Controller
{
    public function index()
    {
        $complaints = Complaint::latest()->get();
        return view('pages.complaint', compact('complaints'));
    }

    public function show($slug)
    {
        $complaint = Complaint::where('slug', $slug)->firstOrFail();
        $complaint->increment('view_count');
        return view('pages.complaint-detail', compact('complaint'));
    }

    // 1. ADIM: Formu göster
    public function createStep1()
    {
        return view('pages.complaint.create');
    }

    // 1. ADIM: Formu kaydet
    public function storeStep1(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'files.*' => 'nullable|mimes:jpg,jpeg,png,webp,pdf|max:5120',
        ]);

        // Slug üret
        $baseSlug = Str::slug($request->title);
        $slug = $baseSlug;
        $counter = 1;
        while (Complaint::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter++;
        }

        // Şikayet kaydı oluşturuluyor
        $complaint = Complaint::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'status' => 'pending',
            'company_id' => 1 // Step 2'de değiştirilecek
        ]);

        // Dosya eklenmişse işle
        if ($request->hasFile('files')) {
            $dateStr = now()->format('Y-m-d');
            $slugTitle = $slug;
            $userId = auth()->id();
            $index = 1;

            foreach ($request->file('files') as $file) {
                $ext = $file->getClientOriginalExtension();
                $newName = "{$userId}_{$dateStr}_{$slugTitle}_{$index}.{$ext}";

                $path = $file->storeAs('complaint_files', $newName, 'public');

                ComplaintFile::create([
                    'complaint_id' => $complaint->id,
                    'reply' => $path,
                    'employer_id' => $userId,
                    'created_at' => now(),
                ]);

                $index++;
            }
        }

        return redirect()->route('complaints.step2', $complaint->id);
    }
    public function step2($id)
    {
        $complaint = Complaint::findOrFail($id);
        $companies = Company::orderBy('name')->get();

        return view('pages.complaint.step2', compact('complaint', 'companies'));
    }

    public function storeStep2(Request $request, $id)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'files.*' => 'nullable|mimes:jpg,jpeg,png,webp,pdf|max:5120', // her dosya için 5 MB sınır

        ]);

        $complaint = Complaint::findOrFail($id);
        $complaint->update([
            'company_id' => $request->company_id,
        ]);

        return redirect()->route('complaints.step3', ['id' => $complaint->id]);
    }

    // 3. ADIM: Kategori seçimi
    public function step3($id)
    {
        $complaint = Complaint::findOrFail($id);
        $categories = Category::orderBy('name')->get(); // DÜZELTME: Category modelinden alınmalı

        return view('pages.complaint.step3', compact('complaint', 'categories'));
    }

    public function storeStep3(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'details' => 'nullable|string'
        ]);

        ComplaintCategory::create([
            'complaint_id' => $id,
            'category_id' => $request->category_id,
        ]);

        return redirect()->route('home')->with('success', 'Şikayet başarıyla tamamlandı.');
    }
}
