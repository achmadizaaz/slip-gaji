@extends('layouts.app')

@section('title', 'Daftar Role')

@section('content')
    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content">
            <div class="container-fluid"> 
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                            <h4 class="page-title">Roles</h4>
                            <div class="d-flex gap-1">

                                <!-- Create Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                                    <i class="bi bi-cloud-arrow-up me-1"></i> Create a role
                                </button>

                            </div><!--end col-->                             
                        </div><!--end page-title-box-->
                    </div><!--end col-->
                </div><!--end row-->
                
                <x-alert-error/>
                <x-alert-status/>  

                @if (session('import-failed'))
                    {{-- Error Validation Import Files --}}
                    <div class="alert alert-danger alert-dismissible fade show mt-3" role="alert">
                        <button type="button" class="btn-sm btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        <strong>Error Imports:</strong>
                        <ul>
                            @foreach (session('import-failed') as $failure)
                                @foreach ($failure->errors() as $error)
                                    <li>Row {{ $failure->row(). ', ' . $error }}</li>
                                @endforeach
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex gap-2 mb-2">
                                    {{-- <div>
                                        Total  {{ $roles->total() }} <i>roles</i>
                                    </div> --}}
                                    <table>
                                        <tr>
                                            <td class="me-2">Tampilkan </td>
                                            <td>
                                                <form action="{{ route('session.per-page') }}" method="GET">
                                                    @csrf
                                                    <select name="per_page" onchange="this.form.submit()" class="form-select form-select-sm" style="width: 100px">
                                                        <option value="10" @if (session('sessionPerPage') == 10)
                                                            selected
                                                        @endif>10</option>
                                                        <option value="25" @if (session('sessionPerPage') == 25)
                                                        selected
                                                        @endif>25</option>
                                                        <option value="50" @if (session('sessionPerPage') == 50)
                                                        selected
                                                        @endif>50</option>
                                                        <option value="100" @if (session('sessionPerPage') == 100)
                                                        selected
                                                        @endif>100</option>
                                                    </select>
                                                </form>
                                            </td>
                                            <td> data/halaman</td>
                                        </tr>
                                    </table>
                                </div>

                                <div class="table-responsive">
                                    <table class="table">
                                        <thead class="table-light">
                                        <tr>
                                            <th style="width: 16px;">
                                                #
                                            </th>
                                            <th class="ps-0">Name</th>
                                            <th>Level</th>
                                            <th>Description</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($roles as $role)
                                            <tr>
                                                <td style="width: 16px;">
                                                    {{ ($roles->currentPage() - 1) * $roles->perPage() + $loop->iteration }}
                                                </td>
                                                <td>{{ $role->name }}</td>
                                                <td>{{ $role->level }} </td>
                                                <td>{{ $role->description ?? '-' }} </td>
                                                <td>   
                                                    <div class="d-flex gap-1">

                                                        <button type="button" class="btn btn-sm btn-success reset_password" data-bs-toggle="modal" data-bs-target="#changePasswordModal" data-name="{{ $role->name }}" data-id="{{ $role->id }}" data-username="{{ $role->username }}" data-bs-tooltip title="Ubah katasandi">
                                                            <i class="bi bi-lock"></i>
                                                        </button>

                                                        <button type="button" class="btn btn-sm btn-danger confirm_delete" data-bs-toggle="modal" data-bs-target="#deleteModal"  data-name="{{ $role->name }}" data-id="{{ $role->id }}" data-username="{{ $role->username }}" data-bs-tooltip="tooltip" title="Hapus">
                                                            <i class="bi bi-trash"></i>
                                                        </button>

                                                    </div> <!-- END D-Flex Action -->
                                                </td>
                                            </tr> 
                                            @endforeach
                                                                                                                            
                                        </tbody>
                                    </table>
                                    <div class="d-flex align-items-center flex-row-reverse">
                                        {{ $roles->onEachSide(0)->appends(request()->input())->links('layouts.pagination') }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->                                     
            </div><!-- container -->
            
            
        </div>
        <!-- end page content -->
    </div>
    <!-- end page-wrapper -->

    <!-- Modal Import User -->
    <div class="modal fade" id="createModal" tabindex="-1" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="createModalLabel">Create Role</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('role.store') }}" method="POST">
            @csrf
            <div class="modal-body">
                <div class="mb-3">
                    <label for="name" class="form-label">
                        Name Role <span class="fst-italic text-danger">*</span>
                    </label>
                    <input type="text" name="name" class="form-control" required placeholder="Masukan nama role">
                </div>
                <div class="mb-3">
                    <label for="level" class="form-label">
                        Level <span class="fst-italic text-danger">*</span>
                    </label>
                    <select name="level" id="level" class="form-select" required>
                        <option value="">Choose a option</option>
                        @for ($i = 1; $i < 11; $i++)
                           <option value="{{ $i }}"> {{ $i }} </option>
                        @endfor
                    </select>
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">
                        Description
                    </label>
                    <textarea name="description" id="description" cols="30" rows="5" class="form-control" placeholder="(Opsional) Silakan isikan deskripsi role"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Create role</button>
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </form>
        </div>
    </div>
    </div>

    <!-- Modal Delete -->
    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="deleteModalLabel">Delete</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <form action="#" id="formDelete" method="POST">
                    @csrf
                    @method('DELETE')
                    <div class="modal-body">
                        <label for="confirm_delete" class="form-label">Anda yakin ingin role pengguna  <span id="deleteName" class="fw-bold text-danger"></span>? </label>
                        <input type="text" class="form-control" name="confirm" id="confirm_delete" required>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger">Delete</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    <!-- Modal Change Password -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                <h1 class="modal-title fs-5" id="changePasswordModalLabel">Ubah Katasandi</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="#" id="formChangePassword" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="modal-body">
                        <div class="mb-1">
                            Apakah yakin ingin mengubah katasandi <span id="changePasswordUsername" class="fw-bold text-success"></span> - [<span id="changePasswordName" class="fw-bold text-success"></span>]?
                        </div>
                        <input type="text" class="form-control" name="password" id="password" placeholder="Masukan katansandi baru" required minlength="8">
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-success">Ubah Sandi</button>
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $('.confirm_delete').click(function(e) {
            let name = $(this).data('name');
            let id = $(this).data('id');
            let url = "{{ route('role.delete', ':id') }}";
            route = url.replace(':id', id);
            $('#deleteName').text(name);
            $('#confirm_delete').attr('placeholder', 'Ketikan: '+ name)
            $('#formDelete').attr('action', route);
        });
        
        $('.reset_password').click(function(e) {
            let name = $(this).data('name');
            let username = $(this).data('username');
            let id = $(this).data('id');
            let url = "{{ route('user.change.password', ':id') }}";
            route = url.replace(':id', id);
            $('#changePasswordName').text(name);
            $('#changePasswordUsername').text(username);
            $('#formChangePassword').attr('action', route);
        });


    </script>
@endpush