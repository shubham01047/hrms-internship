<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use App\Models\SalaryStructure;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PayrollController extends Controller
{
    public function index()
    {
        $payrolls = Payroll::with('user')->orderBy('month', 'desc')->get();
        $employees = User::all();
        return view('payrolls.index', compact('payrolls', 'employees'));
    }
    public function generate($user_id, $month)
    {
        $user = User::findOrFail($user_id);
        $structure = SalaryStructure::where('user_id', $user_id)->first();
        if (!$structure) {
            return back()->with('error', "Salary structure not found for {$user->name}");
        }
        $taxAmount = $structure->basic * ($structure->tax / 100);
        $pfAmount = $structure->basic * ($structure->pf / 100);
        $esiAmount = $structure->basic * ($structure->esi / 100);
        $gross = $structure->basic + $structure->hra + $structure->allowances;
        $net = $gross - ($taxAmount + $pfAmount + $esiAmount);
        Payroll::updateOrCreate(
            ['user_id' => $user_id, 'month' => $month],
            [
                'basic' => $structure->basic,
                'hra' => $structure->hra,
                'allowances' => $structure->allowances,
                'tax_amount' => $taxAmount,
                'pf_amount' => $pfAmount,
                'esi_amount' => $esiAmount,
                'gross_salary' => $gross,
                'net_salary' => $net,
            ]
        );
        return back()->with('success', "Payroll generated for {$user->name} ({$month})");
    }
    public function payslip($id)
    {
        $payroll = Payroll::with('user')->findOrFail($id);
        $pdf = Pdf::loadView('payrolls.payslip', compact('payroll'));
        return $pdf->download('Payslip-' . $payroll->user->name . '.pdf');
    }
    public function generateAll($month)
    {
        $employees = User::whereHas('salaryStructure')->get();
        foreach ($employees as $user) {
            $structure = $user->salaryStructure;
            $taxAmount = $structure->basic * ($structure->tax / 100);
            $pfAmount = $structure->basic * ($structure->pf / 100);
            $esiAmount = $structure->basic * ($structure->esi / 100);
            $gross = $structure->basic + $structure->hra + $structure->allowances;
            $net = $gross - ($taxAmount + $pfAmount + $esiAmount);
            Payroll::updateOrCreate(
                ['user_id' => $user->id, 'month' => $month],
                [
                    'basic' => $structure->basic,
                    'hra' => $structure->hra,
                    'allowances' => $structure->allowances,
                    'tax_amount' => $taxAmount,
                    'pf_amount' => $pfAmount,
                    'esi_amount' => $esiAmount,
                    'gross_salary' => $gross,
                    'net_salary' => $net,
                ]
            );
        }
        return back()->with('success', "Payroll generated for all employees for {$month}");
    }
    public function destroy(Payroll $payroll)
    {
        $payroll->delete();
        return back()->with('success', 'Payroll deleted successfully.');
    }
    public function destroyAll()
    {
        Payroll::query()->delete();  
        return back()->with('success', 'All payrolls deleted successfully.');
    }

}
