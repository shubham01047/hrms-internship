<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CompanyController extends Controller
{
    public function edit()
    {
        $company = Company::first();
        return view('admin.company.edit', compact('company'));
    }

   public function update(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'system_title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'logo' => 'nullable|string|max:255',
    ]);

    $company = Company::first(); // Assumes only one row exists

    if (!$company) {
        return back()->with('error', 'Company not found!');
    }

    $company->update([
        'name' => $request->name,
        'system_title' => $request->system_title,
        'description' => $request->description,
        'logo' => $request->logo,
    ]);

    return back()->with('success', 'Company updated successfully!');
}
}
