<?php

namespace App\Http\Controllers;

use App\Models\Payroll;
use App\Models\SalaryStructure;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;

class PayrollController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('permission:generate payroll', only: ['generate']),
            new Middleware('permission:generate all payrolls', only: ['generateAll']),
            new Middleware('permission:delete payroll', only: ['destroy']),
            new Middleware('permission:delete all payrolls', only: ['destroyAll']),

        ];
    }
    public function index()
    {
        if (auth()->user()->can('view all payrolls')) {
            $payrolls = Payroll::with('user')->orderBy('month', 'desc')->get();
        } else {
            $payrolls = Payroll::with('user')
                ->where('user_id', auth()->id())
                ->orderBy('month', 'desc')
                ->get();
        }
        $employees = User::all();
        return view('payrolls.index', compact('payrolls', 'employees'));
    }
    public function generate($user_id, $month)
{
    $user = User::findOrFail($user_id);
    if (!auth()->user()->can('generate payroll')) {
        if (auth()->id() !== $user->id) {
            return back()->with('error', 'You do not have permission to generate payroll for this employee.');
        }
    }
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
        if (auth()->user()->can('generate all payrolls')) {
            $employees = User::whereHas('salaryStructure')->get();
        } else {
            $employees = User::where('id', auth()->id())
                ->whereHas('salaryStructure')
                ->get();
        }
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
