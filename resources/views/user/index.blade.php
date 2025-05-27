@extends('layouts.app')

@section('title', 'Daftar Pengguna')

@section('content')
    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content">
            <div class="container-fluid"> 
                
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                            <h4 class="page-title">Daftar Pengguna</h4>
                            <div class="d-flex gap-1">
                                {{-- <a href="#" class="btn btn-info" >
                                    <i class="bi bi-circle me-1"></i> Reset
                                </a> --}}

                                <!-- Import Button trigger modal -->
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#importModal">
                                    <i class="bi bi-cloud-arrow-up me-1"></i> Import
                                </button>

                                <a href="{{ route('user.create') }}" class="btn btn-primary" >
                                    <i class="fa-solid fa-plus me-1"></i> Buat baru
                                </a>
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
                                        Total  {{ $users->total() }} <i>users</i>
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
                                            <th>Username</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Last login at</th>
                                            <th class="text-center">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                            <tr>
                                                <td style="width: 16px;">
                                                    {{ ($users->currentPage() - 1) * $users->perPage() + $loop->iteration }}
                                                </td>
                                                <td class="ps-0">
                                                    @if ($user->image)
                                                        <img src="{{  asset('storage/'.$user->image) }}" alt="{{ $user->name }}" class="thumb-md d-inline rounded-circle me-1">
                                                    @else
                                                        <img src="{{  asset('themes/images/no-avatar.webp') }}"  alt="{{ $user->name }}" class="thumb-md d-inline rounded-circle me-1">
                                                    @endif
                                                    <p class="d-inline-block align-middle mb-0">
                                                        <span class="font-13 fw-medium">{{ $user->name }}</span> 
                                                    </p>
                                                </td>
                                                <td>{{ $user->username }}</td>
                                                <td>{{ $user->email }} </td>
                                                <td>
                                                    @if ($user->is_active)
                                                        <span class="badge bg-success-subtle text-success">Active</span>
                                                        @else
                                                        <span class="badge bg-danger-subtle text-danger">Inactive</span>
                                                    @endif
                                                </td>
                                                <td>{!! $user->last_login_at ?? '<i>Belum pernah login</i>' !!}</td>
                                                <td class="text-center">    
                                                    <a href="{{ route('user.show', $user->slug) }}" class="btn btn-sm btn-info" data-bs-tooltip title="Detail">
                                                        <i class="bi bi-info-circle"></i>
                                                    </a>                                                   
                                                    <a href="{{ route('user.edit', $user->slug) }}" class="btn btn-sm btn-warning" data-bs-tooltip title="Edit">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>

                                                    <button type="button" class="btn btn-sm btn-success reset_password" data-bs-toggle="modal" data-bs-target="#changePasswordModal" data-name="{{ $user->name }}" data-id="{{ $user->id }}" data-username="{{ $user->username }}" data-bs-tooltip title="Ubah katasandi">
                                                        <i class="bi bi-lock"></i>
                                                    </button>

                                                    <button type="button" class="btn btn-sm btn-danger confirm_delete" data-bs-toggle="modal" data-bs-target="#deleteModal"  data-name="{{ $user->name }}" data-id="{{ $user->id }}" data-username="{{ $user->username }}" data-bs-tooltip="tooltip" title="Hapus">
                                                        <i class="bi bi-trash"></i>
                                                    </button>

                                                    </a>
                                                </td>
                                            </tr> 
                                            @endforeach
                                                                                                                            
                                        </tbody>
                                    </table>
                                    <div class="d-flex align-items-center flex-row-reverse">
                                        {{ $users->onEachSide(0)->appends(request()->input())->links('layouts.pagination') }}
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
    <div class="modal fade" id="importModal" tabindex="-1" aria-labelledby="importModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header">
            <h1 class="modal-title fs-5" id="importModalLabel">Import Users</h1>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <form action="{{ route('user.import') }}" method="POST" enctype="multipart/form-data">
        <div class="modal-body">
                @method('PUT')
                @csrf
                <div class="mb-3">
                    Silakan unduh template impor pengguna melalui link berikut untuk memastikan format data sesuai. <a href="{{ route('user.download.template.import') }}">
                        <span class="badge bg-success-subtle text-success">Download Template</span>
                    </a>
                </div>
                <div class="mb-3">
                    <input type="file" class="form-control" name="file" accept=".csv">
                </div>
                <div>
                    Silakan unggah file dengan ketentuan sebagai berikut:
                    <ul>
                        <li>Format File: CSV (.csv)</li>
                        <li>Struktur Format: File harus mengikuti struktur yang telah disediakan. Pastikan setiap kolom dan urutan kolom sesuai dengan template yang diberikan.</li>
                        <li>Ekstensi File: Harus berekstensi .csv. File dengan ekstensi lain tidak akan diterima.</li>
                        <li>Konsistensi Data: Pastikan data dalam file tidak mengandung karakter khusus yang tidak diperlukan dan sesuai dengan format data masing-masing kolom (misalnya: tanggal, angka, teks, dll).</li>
                    </ul>
                    Jika file tidak sesuai dengan format yang telah ditentukan, proses unggah atau pemrosesan data dapat gagal.
                </div>
            
        </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-success">Import data</button>
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
                        <label for="confirm_delete" class="form-label">Anda yakin ingin menghapus pengguna  <span id="deleteName" class="fw-bold text-danger"></span>? </label>
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
            let username = $(this).data('username');
            let id = $(this).data('id');
            let url = "{{ route('user.delete', ':id') }}";
            route = url.replace(':id', id);
            $('#deleteName').text(name);
            $('#confirm_delete').attr('placeholder', 'Ketikan: '+ username)
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