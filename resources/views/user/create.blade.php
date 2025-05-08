@extends('layouts.app')

@section('title', 'Create User')

@section('content')
<div class="page-wrapper">

    <!-- Page Content-->
    <div class="page-content">
        <div class="container-fluid"> 
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                        <h4 class="page-title">Create User</h4>                    
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div><!--end row-->

            <div class="card shadow">
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-2">
                                <img src="{{ asset('themes/images/no-avatar.webp') }}" width="100%" height="200px" class="rounded-2" id="preview-image">
                                <div class="mt-2 text-center">
                                    <input type="file" name="'image" id="image" style="display:none">
                                    <label for="image" class="btn btn-sm text-bg-info w-100">Upload a image</label>
                                </div>
                            </div>
                            <div class="col-4">
                               <div class="mb-3">
                                    <label for="username" class="form-label">
                                        Username <small class="text-danger">*</small>
                                    </label>
                                    <input type="text" name="username" class="form-control" autofocus required>
                               </div>
                               <div class="mb-3">
                                    <label for="email" class="form-label">
                                        Email <small class="text-danger">*</small>
                                    </label>
                                    <input type="email" name="email" class="form-control" required>
                               </div>
                               <div class="mb-2">
                                    <label for="name" class="form-label">
                                        Name <small class="text-danger">*</small>
                                    </label>
                                    <input type="text" name="name" class="form-control" required>
                               </div>
                            </div>
                            <div class="col-4">
                               <div class="mb-3">
                                    <label for="password" class="form-label">
                                        Password <small class="text-danger">*</small>
                                    </label>
                                    <input type="text" name="password" class="form-control" autofocus required>
                               </div>
                               <div class="mb-2">
                                <label for="status" class="form-label">
                                    Status <small class="text-danger">*</small>
                                </label>
                                <select name="status" id="status" class="form-select" required>
                                    <option value="inacative">Inactive</option>
                                    <option value="active">Active</option>
                                </select>
                               </div>
                            </div>
                        </div>
                        <hr>
                        <div class="d-flex gap-1">
                            <button type="submit" class="btn btn-primary">Create a user</button>
                            <a href="{{ route('user.index') }}" class="btn btn-secondary">Back</a>
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