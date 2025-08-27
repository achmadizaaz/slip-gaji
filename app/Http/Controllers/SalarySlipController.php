<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalarySlipController extends Controller
{
    public function store(Request $request)
    {
        $slip = new SalarySlip($request->all());
        $slip->calculateTotals();
        $slip->save();

        return redirect()->back()->with('success', 'Slip gaji berhasil dibuat!');
    }

    public function show(SalarySlip $salarySlip)
    {
        return view('salary_slips.show', compact('salarySlip'));
    }
}
