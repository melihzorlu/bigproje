<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    /**
     * Belirli bir şirkete ait şubeleri getir
     */
    public function getBranches($company_id)
    {
        $branches = Branch::where('company_id', $company_id)->get(['id', 'name']);

        return response()->json([
            'success' => true,
            'data' => $branches
        ]);
    }
    public function getByCompany($company_id)
    {
        return Branch::where('company_id', $company_id)->get();
    }

    /**
     * Yeni şube ekle (Form üzerinden eklenecekse kullanılabilir)
     */
    public function store(Request $request)
    {
        $request->validate([
            'company_id' => 'required|exists:companies,id',
            'name' => 'required|string|max:255',
            'address' => 'nullable|string|max:255',
        ]);

        $branch = Branch::create([
            'company_id' => $request->company_id,
            'name' => $request->name,
            'address' => $request->address,
        ]);

        return redirect()->back()->with('success', 'Şube başarıyla eklendi.');
    }
}
