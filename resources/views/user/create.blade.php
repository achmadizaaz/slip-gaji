@extends('layouts.app')

@section('title', 'Create User')

@section('content')
<div class="page-wrapper">
    <!-- Page Content-->
    <div class="page-content">
        <div class="container-fluid"> 
            <x-alert-error/>
            <x-alert-status/>   
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                        <h4 class="page-title">
                            Buat Pengguna Baru
                        </h4>                    
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div><!--end row-->

            <div class="card shadow">
                <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-2">
                                <div class="mb-3">
                                    <img src="{{ asset('themes/images/no-avatar.webp') }}" width="100%" height="200px" class="rounded-2" id="preview-image">
                                    <div class="mt-2 text-center">
                                        <input type="file" name="image" id="uploadImage" style="display:none" accept=".jpg,.png,.jpeg">
                                        <label for="uploadImage" class="btn btn-sm text-bg-info w-100">Upload a image</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="mb-2">
                                    <label for="name" class="form-label">
                                        Name <small class="text-danger">*</small>
                                    </label>
                                    <input type="text" name="name" class="form-control @error('name')
                                            is-invalid
                                        @enderror" autofocus required value="{{ old('name') }}">

                                    @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3 ">
                                        <label for="username" class="form-label">
                                            Username <small class="text-danger">*</small>
                                        </label>
                                        <input type="text" name="username" class="form-control @error('username')
                                            is-invalid
                                        @enderror" required value="{{ old('username') }}">
                                        
                                        @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
            
                                <div class="mb-3">
                                        <label for="email" class="form-label">
                                            Email <small class="text-danger">*</small>
                                        </label>
                                        <input type="email" name="email" class="form-control @error('email')
                                            is-invalid
                                        @enderror" required value="{{ old('email') }}">

                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                               <div class="mb-3">
                                    <label for="password" class="form-label">
                                        Password <small class="text-danger">*</small>
                                    </label>
                                    <input type="text" name="password" class="form-control @error('password')
                                        is-invalid                                        
                                    @enderror" required>

                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                               </div>
                               <div class="mb-2">
                                    <label for="status" class="form-label">
                                        Status <small class="text-danger">*</small>
                                    </label>
                                    <select name="is_active" id="status" class="form-select @error('is_active') is-invalid @enderror" required>
                                        <option value="">Pilih salah satu</option>
                                        <option value="inactive" @selected(old('is_active') == 'inactive')>Inactive</option>
                                        <option value="active" @selected(old('is_active') == 'active')>Active</option>
                                    </select>

                                    @error('is_active')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                               </div>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex gap-1">
                            <button type="submit" class="btn btn-primary">
                                Submit
                            </button>
                            <a href="{{ route('user.index') }}" class="btn btn-secondary">
                                Kembali
                            </a>
                        </div>
                   </div>
                </form>
             </div>
                                              
        </div><!-- container -->
        
    </div>
    <!-- end page content -->
</div>
<!-- end page-wrapper -->

@endsection

@push('scripts')
    <script>
        // PREVIEW IMAGE
        $('#uploadImage').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image').attr('src', e.target.result); 
            }
            reader.readAsDataURL(this.files[0]); 
        });
    </script>
@endpush