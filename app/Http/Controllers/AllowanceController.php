<?php

namespace App\Http\Controllers;

use App\Models\Allowance;
use Illuminate\Http\Request;

class AllowanceController extends Controller
{
    protected $model;
    public function __construct(Allowance $model)
    {
        $this->model = $model;
    }

    public function index()
    {
        $allowances = $this->model->all();

        return view('allowances.index', compact('allowances'));
    }

    public function store(Request $request)
    {
        $amount = preg_replace('/\D/', '', $request->input('default_amount'));

        $request->validate([
            'nama' => 'string|required',
            'default_amount' => 'required',
        ]);

        $this->model->create([
            'nama' => $request->nama,
            'default_amount' => $amount
        ]);

        return back()->with('success', 'Data tunjangan berhasil ditambahkan!');
    }

    public function update($id)
    {
        $this->model->where('id', $id)->update([

        ]);

        return back()->with('success', 'Data tunjanngan berhasil ditambahkan!');
    }

    public function destroy($id)
    {
        $this->model->find($id)->delete();

        return back()->with('success', 'Data tunjangan berhasil dihapus!');
    }


}
