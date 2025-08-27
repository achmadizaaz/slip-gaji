<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Http\Requests\EmployeeRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected $model;

    public function __construct(Employee $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        return view('employee.index', [
            'employees' => $this->model->paginate(10)
        ]);

    }

    public function store(EmployeeRequest $request)
    {
        $amount = preg_replace('/\D/', '', $request->input('gaji_pokok'));

        $this->model->create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'email' => $request->email,
            'status_kepegawaian' => $request->status_kepegawaian,
            'gaji_pokok' => $amount
        ]);

        return back()->with('success', 'Data Pengawai Berhasil Dibuat!');
    }
}
