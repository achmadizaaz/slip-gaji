<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Models\Role;
use App\Models\User;
use App\Services\FileService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    protected $model, $fileService ;
    
    public function __construct(User $model, FileService $fileService)
    {
        $this->model = $model;
        $this->fileService = $fileService;
    }

    public function index(Request $request)
    {
        return view('user.index', [
            'users' => $this->model->all(),
        ]);
    }

    public function create(Request $request)
    {
        return view('user.create');
    }

    public function store(UserRequest $request)
    {
        if (isset($request->image)) {
            $image = $this->fileService->uploadFile($request->image, 'users', 'public');
        }

        // Change is_active value (active/inactive) to bolean
        $is_active = $request->is_active == 'active' ? 1 : 0;

        $user = $this->model->create([
            'name' => $request->name,
            'email' => $request->email,
            'username' =>$request->username,
            'password' => Hash::make($request->password),
            'is_active' => $is_active,
            'image' => $image ?? null,
        ]);

        $role = Role::find($request->role);

        $user->assignRole($role);

        return to_route('user.index')->with('success', 'Pengguna telah berhasil ditambahkan!');
    }

    public function show($slug)
    {
        return view('user.show', [
            'user' => $this->model->where('slug', $slug)->firstOrFail(),
        ]);
    }

    public function edit(Request $request)
    {
        return view('user.edit', [
            'user' => $this->model->find($request->param('id')),
        ]);
    }

    public function update(UserRequest $request)
    {
        $user = $this->model->find($request->param('id'));

        $user->fill($request->validated()); 
    }

    public function delete(Request $request, int $id)
    {

        // Cari user berdasarkan id
        $user = $this->model->findOrFail($id);

        // Validation konfirmasi penghapusan
        if($request->confirm != $user->username){
            return back()->with('failed', 'Konfirmasi penghapusan tidak cocok');
        }

        // Jika user terdapat image
        // Hapus file image
        if(isset($user->image)){
            $this->fileService->deleteFile($user->image);
        };

        $user->delete();

        return to_route('user.index')->with('success', 'Pengguna telah berhasil dihapus');
    }
}
