@extends('layouts.app')

@section('title', 'Detail User')

@section('content')
<div class="page-wrapper">

    <!-- Page Content-->
    <div class="page-content">
        <div class="container-fluid"> 
            <div class="row">
                <div class="col-sm-12">
                    <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                        <h4 class="page-title">Detail User</h4>                    
                    </div><!--end page-title-box-->
                </div><!--end col-->
            </div><!--end row-->

            <div class="card shadow">
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
                                <div class="form-label">Username:</div>
                                <h4>{{ $user->username }}</h4>
                            </div>
                           <div class="mb-3">
                                <div class="form-label">Email:</div>
                                <h4>{{ $user->email }}</h4>
                           </div>
                           <div class="mb-2">
                                <div class="form-label">Name:</div>
                                <h4>{{ $user->name }}</h4>
                           </div>
                        </div>
                        <div class="col-4">
                           <div class="mb-2">
                            <div class="form-label">Satus:</div>
                                <span class="badge bg-primary">{{ $user->status ? 'Active' : 'Inactive' }}</span>
                           </div>
                        </div>
                    </div>
                    <hr>
                    <div class="d-flex gap-1">
                        <button type="submit" class="btn btn-primary">Create a user</button>
                        <a href="{{ route('user.index') }}" class="btn btn-secondary">Back</a>
                    </div>
               </div>
             </div>
                                              
        </div><!-- container -->
        
    </div>
    <!-- end page content -->
</div>
<!-- end page-wrapper -->
@endsection