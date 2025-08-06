<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\Roles\ConfirmDeleteRoleRequest;
use App\Http\Requests\Roles\RoleRequest;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    protected $model;
    public function __construct(Role $model)
    {
        $this->model = $model;
    }

    public function index(Request $request)
    {
        return view('role.index', [
            'roles' => $this->model->filter($request->only(['search']))->paginate(10),
        ]);
    }

    public function store(RoleRequest $request)
    {
        $this->model->create([
            'code' => $request->code,
            'name' => $request->name,
            'is_admin' => $request->is_admin,
            'description' => $request->description
        ]);

        return to_route('role.index')->with('success', 'Role telah berhasil ditambahkan!');
    }

    public function getRoleJsonById($id)
    {
        return response()->json($this->model->findOrFail($id));
    }

    public function update(Request $request, $id)
    {
        $role = $this->model->findOrFail($id);
        $role->update([
            'name' => $request->name,
            'is_admin' => $request->is_admin,
            'description' => $request->description
        ]);

        return back()->with('success', 'Role telah berhasil diperbarui!');
    }

    public function destroy(ConfirmDeleteRoleRequest $request, $id)
    {
        $role = $this->model->findOrFail($id);
        $role->delete();

        return back()->with('success', 'Role telah berhasil dihapus!');
    }

}
