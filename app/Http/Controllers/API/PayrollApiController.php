<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Payroll;
use App\Models\SalaryStructure;
use App\Models\User;
use Illuminate\Http\Request;

class PayrollApiController extends Controller
{
    public function index()
    {
        $payrolls = Payroll::with('user')->orderBy('month', 'desc')->get();
        return response()->json([
            'success' => true,
            'data' => $payrolls
        ]);
    }
    public function generate($userId, $month)
    {
        $user = User::findOrFail($userId);
        $structure = SalaryStructure::where('user_id', $userId)->first();
        if (!$structure) {
            return response()->json([
                'success' => false,
                'message' => "Salary structure not found for {$user->name}"
            ], 404);
        }
        $taxAmount = $structure->basic * ($structure->tax / 100);
        $pfAmount = $structure->basic * ($structure->pf / 100);
        $esiAmount = $structure->basic * ($structure->esi / 100);
        $gross = $structure->basic + $structure->hra + $structure->allowances;
        $net = $gross - ($taxAmount + $pfAmount + $esiAmount);
        $payroll = Payroll::updateOrCreate(
            ['user_id' => $userId, 'month' => $month],
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
        return response()->json([
            'success' => true,
            'message' => "Payroll generated for {$user->name} ({$month})",
            'data' => $payroll
        ]);
    }
    public function generateAll($month)
    {
        $employees = User::whereHas('salaryStructure')->get();
        $generated = [];
        foreach ($employees as $user) {
            $structure = $user->salaryStructure;
            $taxAmount = $structure->basic * ($structure->tax / 100);
            $pfAmount = $structure->basic * ($structure->pf / 100);
            $esiAmount = $structure->basic * ($structure->esi / 100);
            $gross = $structure->basic + $structure->hra + $structure->allowances;
            $net = $gross - ($taxAmount + $pfAmount + $esiAmount);
            $payroll = Payroll::updateOrCreate(
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
            $generated[] = $payroll;
        }
        return response()->json([
            'success' => true,
            'message' => "Payroll generated for all employees for {$month}",
            'data' => $generated
        ]);
    }
    public function show($id)
    {
        $payroll = Payroll::with('user')->findOrFail($id);
        return response()->json([
            'success' => true,
            'data' => $payroll
        ]);
    }
    public function destroy($id)
    {
        $payroll = Payroll::findOrFail($id);
        $payroll->delete();
        return response()->json([
            'success' => true,
            'message' => 'Payroll deleted successfully.'
        ]);
    }
    public function destroyAll()
    {
        Payroll::query()->delete();
        return response()->json([
            'success' => true,
            'message' => 'All payrolls deleted successfully.'
        ]);
    }
}
