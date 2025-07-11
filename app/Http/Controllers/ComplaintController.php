<?php

namespace App\Http\Controllers;
use App\Models\Branch; // En üste ekle

use App\Models\Complaint;
use App\Models\ComplaintFile;
use App\Models\Company;
use App\Models\Category;
use App\Models\ComplaintCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

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
            'files.*' => 'nullable|file|mimes:jpg,jpeg,png,webp,pdf|max:5120',
        ]);

        // Benzersiz slug oluştur
        $baseSlug = Str::slug($request->title);
        $slug = $baseSlug;
        $counter = 1;
        while (Complaint::where('slug', $slug)->exists()) {
            $slug = $baseSlug . '-' . $counter++;
        }

        // Şikayet kaydını oluştur
        $complaint = Complaint::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'slug' => $slug,
            'description' => $request->description,
            'status' => 'pending',
            'company_id' => 1, // Step2'de değiştirilecek
        ]);

        // Dosyaları işle (varsa)
        $files = $request->file('files');
        if (is_array($files)) {
            $userId = auth()->id();
            $dateStr = now()->format('Y-m-d');
            $index = 1;

            foreach ($files as $file) {
                if ($file->isValid()) {
                    $ext = $file->getClientOriginalExtension();
                    $newName = "{$userId}_{$dateStr}_{$slug}_{$index}.{$ext}";

                    // Dosyayı storage/public/complaint_files altına kaydet
                    $path = $file->storeAs('complaint_files', $newName, 'public');

                    // Veritabanına kaydet
                    ComplaintFile::create([
                        'complaint_id' => $complaint->id,
                        'reply' => $path,
                        'employer_id' => $userId,
                        'created_at' => now(),
                    ]);

                    $index++;
                }
            }
        }

        return redirect()->route('complaints.step2', $complaint->id);
    }
    public function step2($id)
    {
        $complaint = Complaint::findOrFail($id);
        $companies = Company::orderBy('name')->get();
        $branches = $complaint->company_id ? Branch::where('company_id', $complaint->company_id)->get() : collect();

        return view('pages.complaint.step2', compact('complaint', 'companies', 'branches'));
    }

    public function storeStep2(Request $request, $id)
    {
        $complaint = Complaint::findOrFail($id);

        $rules = [
            'company_id' => 'required',
            'files.*' => 'nullable|mimes:jpg,jpeg,png,webp,pdf|max:5120'
        ];

        if ($request->company_id === 'new') {
            $rules = array_merge($rules, [
                'new_name' => 'required|string|max:255',
                'new_address' => 'required|string|max:255',
                'new_tax_number' => 'required|string|max:20',
                'new_mersis_no' => 'nullable|string|max:20',
                'new_branch_name' => 'required|string|max:255',
                'new_branch_address' => 'required|string|max:255',
            ]);
        } else {
            $rules['company_id'] .= '|exists:companies,id';
            $rules['branch_id'] = 'required|exists:branches,id';
        }

        $validated = $request->validate($rules);

        // Yeni firma oluşturulacaksa:
        if ($request->company_id === 'new') {
            $existingCompany = Company::where('tax_number', $request->new_tax_number)->first();

            if ($existingCompany) {
                $complaint->company_id = $existingCompany->id;

                // Firma varsa, default şubesini atlamamak adına ilk şubeyi bul
                $branch = $existingCompany->branches()->first(); // Eloquent ilişki tanımlı olmalı
                $complaint->branch_id = $branch ? $branch->id : null;

            } else {
                $company = Company::create([
                    'name' => $request->new_name,
                    'address' => $request->new_address,
                    'tax_number' => $request->new_tax_number,
                    'mersis_no' => $request->new_mersis_no,
                    'owner_id' => auth()->id(),
                ]);

                $branch = \App\Models\Branch::create([
                    'company_id' => $company->id,
                    'name' => $request->new_branch_name,
                    'address' => $request->new_branch_address,
                ]);

                $complaint->company_id = $company->id;
                $complaint->branch_id = $branch->id;
            }

        } else {
            $complaint->company_id = $request->company_id;
            $complaint->branch_id = $request->branch_id;
        }

        $complaint->save();

        // Dosya işlemleri (varsa)
        if ($request->hasFile('files')) {
            $dateStr = now()->format('Y-m-d');
            $slugTitle = $complaint->slug;
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
            'category_ids' => 'required|array|min:1|max:4',
            'category_ids.*' => 'exists:categories,id',
            'details' => 'nullable|string'
        ]);

        foreach ($request->category_ids as $categoryId) {
            ComplaintCategory::create([
                'complaint_id' => $id,
                'category_id' => $categoryId,
            ]);
        }

        return redirect()->route('home')->with('complaint_success', true);
    }
    public function videoStep1()
    {
        return view('pages.complaint.video-step1');
    }

    public function videoStore(Request $request)
    {
        $videoPath = null;

        // Bilgisayardan gelen base64 video
        if ($request->has('recorded_video')) {
            $videoData = $request->input('recorded_video');
            $video = base64_decode(preg_replace('#^data:video/\w+;base64,#i', '', $videoData));
            $filename = 'video_' . time() . '.webm';
            Storage::disk('public')->put('complaints/videos/' . $filename, $video);
            $videoPath = $filename;
        }

        // Mobil cihazdan yüklenen video
        if ($request->hasFile('uploaded_video')) {
            $file = $request->file('uploaded_video');
            $filename = 'upload_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('public/complaints/videos', $filename);
            $videoPath = $filename;
        }

        $slug = 'video-' . Str::random(10);

        $complaint = Complaint::create([
            'user_id' => auth()->id(),
            'title' => 'Video ile Şikayet',
            'slug' => $slug,
            'status' => 'pending',
            'description' => '',
            'company_id' => 1
        ]);

        \App\Models\ComplaintVideo::create([
            'complaint_id' => $complaint->id,
            'video_path' => $videoPath
        ]);

        return redirect()->route('complaints.video.step2', $complaint->id);
    }

    public function videoStep2($id)
    {
        $complaint = Complaint::findOrFail($id);
        return view('pages.complaint.video-step2', compact('complaint'));
    }

    public function videoStoreStep2(Request $request, $id)
    {
        $request->validate([
            'description' => 'required|string|max:3000'
        ]);

        $complaint = Complaint::findOrFail($id);
        $complaint->update([
            'description' => $request->description
        ]);

        return redirect()->route('complaints.video.step3', $complaint->id);
    }

    public function videoStep3($id)
    {
        $complaint = Complaint::findOrFail($id);
        $companies = Company::orderBy('name')->get();

        // Eğer complaint içinde company_id varsa, ona ait şubeleri getir
        $selectedCompanyId = $complaint->company_id;
        $branches = $selectedCompanyId
            ? \App\Models\Branch::where('company_id', $selectedCompanyId)->get()
            : collect(); // boş koleksiyon

        return view('pages.complaint.video-step3', compact('complaint', 'companies', 'branches'));
    }

    public function videoComplete(Request $request, $id)
    {
        $complaint = Complaint::findOrFail($id);

        $rules = [
            'company_id' => 'required',
        ];

        // Yeni firma ekleniyorsa
        if ($request->company_id === 'new') {
            $rules = array_merge($rules, [
                'new_name' => 'required|string|max:255',
                'new_address' => 'required|string|max:255',
                'new_tax_number' => 'required|string|max:20',
                'new_mersis_no' => 'nullable|string|max:20',
                'new_branch_name' => 'required|string|max:255',
                'new_branch_address' => 'required|string|max:255',
            ]);
        } else {
            $rules['company_id'] .= '|exists:companies,id';
            $rules['branch_id'] = 'nullable|exists:branches,id';
        }

        $validated = $request->validate($rules);

        // Eğer yeni firma ekleniyorsa
        if ($request->company_id === 'new') {
            $existingCompany = Company::where('tax_number', $request->new_tax_number)->first();

            if ($existingCompany) {
                $company = $existingCompany;
            } else {
                $company = Company::create([
                    'name' => $request->new_name,
                    'address' => $request->new_address,
                    'tax_number' => $request->new_tax_number,
                    'mersis_no' => $request->new_mersis_no,
                    'owner_id' => auth()->id(),
                ]);
            }

            // Yeni şubeyi oluştur
            $branch = Branch::create([
                'company_id' => $company->id,
                'branch_name' => $request->new_branch_name,
                'address' => $request->new_branch_address,
            ]);

            $complaint->company_id = $company->id;
            $complaint->branch_id = $branch->id;

        } else {
            // Mevcut firma seçildiyse
            $complaint->company_id = $request->company_id;
            $complaint->branch_id = $request->branch_id ?? null;
        }

        $complaint->save();

        return redirect()->route('home')->with('complaint_success', 'Deneyiminiz başarıyla sisteme yüklendi.');
    }
}

