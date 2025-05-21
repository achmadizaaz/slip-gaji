@extends('layouts.app')

@section('title', 'Edit user: '.$user->name)

@section('content')
<div class="page-wrapper">

    <!-- Page Content-->
    <div class="page-content">
        <div class="container-fluid"> 
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                        <h4 class="page-title">Detail User: {{ $user->name }}</h4>                    
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div><!--end row-->

            <div class="card shadow">
                <div class="card-body">
                    <div class="row">
                        <div class="col-2">
                            @if (isset($user->image))
                            <img src="{{ asset('storage/'.$user->image) }}" width="100%" height="200px" class="rounded-2" id="preview-image">
                            @else
                                <img src="{{ asset('themes/images/no-avatar.webp') }}" width="100%" height="200px" class="rounded-2" id="preview-image">
                            @endif
                            <div class="mt-2 text-center">
                                <input type="file" name="image" id="uploadImage" style="display:none" accept=".jpg,.png,.jpeg">
                                <label for="uploadImage" class="btn btn-sm text-bg-info w-100">Upload a image</label>
                            </div>
                        </div>
                        <div class="col-4">
                            
                            <div class="mb-3">
                                    <div class="form-label">Username:</div>
                                    <input type="text" name="username" class="form-control @error('username')
                                            is-invalid
                                        @enderror" autofocus required value="{{ old('username', $user->username) }}">

                                    @error('username')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                <div class="form-label">Name:</div>
                                <input type="text" name="name" class="form-control @error('name')
                                            is-invalid
                                        @enderror" autofocus required value="{{ old('name', $user->name) }}">

                                    @error('name')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>
                            <div class="mb-3">
                                    <div class="form-label">Email:</div>
                                    <input type="text" name="email" class="form-control @error('email')
                                            is-invalid
                                        @enderror" autofocus required value="{{ old('email', $user->email) }}">

                                    @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                            </div>
                           
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <div class="form-label">Satus:</div>
                                <select name="is_active" class="form-select" id="is_active">
                                    <option value="active" @selected($user->is_active == 1)>Active</option>
                                    <option value="inactive" @selected($user->is_active == 0)>Inactive</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <div class="form-label">Last login at:</div>
                                <div>
                                    {!! $user->last_login_at ?? '<i>belum pernah login</i>' !!}
                                </div>
                            </div>
                            <div class="mb-3">
                                <div class="form-label">Last login IP:</div>
                                <div>
                                    {!! $user->last_login_ip ?? '<i>belum pernah login</i>' !!}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex gap-1">
                        <button class="btn btn-warning">
                            Update
                        </button>
                        <a href="{{ route('user.show', $user->slug) }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left me-1"></i> Go Back
                        </a>
                    </div>
               </div>
             </div>
        </div><!-- container -->
        
        
    </div>
    <!-- end page content -->
</div>
<!-- end page-wrapper -->
@endsection