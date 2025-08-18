<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class CompanyController extends Controller implements HasMiddleware
{
     public static function middleware(): array
    {
        return [
            new Middleware('permission:edit company', only: ['edit']),
        ];
    }
    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('company.edit', compact('company'));
    }
    public function update(Request $request, $id)
    {
        try {
            $company = Company::findOrFail($id);

            $request->validate([
                'company_name' => 'required|string|max:255',
                'company_description' => 'nullable|string',
                'company_logo' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'navbar_color' => 'nullable|string|max:20',
                'sidebar_color' => 'nullable|string|max:20',
                'primary_color' => 'nullable|string|max:20',
                'text_color' => 'nullable|string|max:20',
                'system_title' => 'nullable|string|max:255',
            ]);

            // ✅ Handle logo upload + delete old

            if ($request->hasFile('company_logo')) {
                // Delete existing logo if it exists
                if ($company->company_logo && File::exists(public_path('images/' . $company->company_logo))) {
                    File::delete(public_path('images/' . $company->company_logo));
                }

                // Store new logo in public/images/
                $file = $request->file('company_logo');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images'), $filename);

                // Save filename in database
                $company->company_logo = $filename;
            }

            // ✅ Update other fields
            $company->fill($request->only([
                'company_name',
                'company_description',
                'navbar_color',
                'sidebar_color',
                'primary_color',
                'text_color',
                'system_title'
            ]));

            $company->save();

            // ✅ Redirect back to edit page with success
            return redirect()->route('company.edit', $company->id)
                ->with('success', 'Company details updated successfully!');

        } catch (\Exception $e) {
            // ✅ Redirect back to edit page with error
            return redirect()->route('company.edit', $id)
                ->with('error', 'Error: ' . $e->getMessage());
        }
    }


}
