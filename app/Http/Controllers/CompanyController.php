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
                'footer_color' => 'nullable|string|max:20',
                'system_title' => 'nullable|string|max:255',
                'timings' => 'required|array',
                'timings.*.day_from' => 'required|string',
                'timings.*.day_to' => 'required|string',
                'timings.*.start' => 'required|date_format:H:i',
                'timings.*.end' => 'required|date_format:H:i',
            ]);
            if ($request->hasFile('company_logo')) {
                if ($company->company_logo && File::exists(public_path('images/' . $company->company_logo))) {
                    File::delete(public_path('images/' . $company->company_logo));
                }
                $file = $request->file('company_logo');
                $filename = time() . '_' . $file->getClientOriginalName();
                $file->move(public_path('images'), $filename);
                $company->company_logo = $filename;
            }
            $company->fill($request->only([
                'company_name',
                'company_description',
                'navbar_color',
                'sidebar_color',
                'primary_color',
                'text_color',
                'footer_color',
                'system_title'
            ]));
            $company->timings = json_encode($request->timings);
            $company->save();
            return redirect()->route('company.edit', $company->id)
                ->with('success', 'Company details updated successfully!');
        } catch (\Exception $e) {
            return redirect()->route('company.edit', $id)
                ->with('error', 'Error: ' . $e->getMessage());
        }
    }
}
