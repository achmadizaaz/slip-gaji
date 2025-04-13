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

            <div class="card">
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
                                 <label for="username" class="form-label">Username</label>
                                 <input type="text" name="username" class="form-control" autofocus>
                            </div>
                            <div class="mb-3">
                                 <label for="email" class="form-label">Email</label>
                                 <input type="email" name="email" class="form-control">
                            </div>
                            <div class="mb-2">
                             <label for="status" class="form-label">Status</label>
                             <select name="status" id="status" class="form-select">
                                 <option value="inacative">Inactive</option>
                                 <option value="active">Active</option>
                             </select>
                            </div>
                         </div>
                         <div class="col-4">
                            <div class="mb-3">
                                 <label for="username" class="form-label">Username</label>
                                 <input type="text" name="username" class="form-control" autofocus>
                            </div>
                            <div class="mb-3">
                                 <label for="email" class="form-label">Email</label>
                                 <input type="email" name="email" class="form-control">
                            </div>
                            <div class="mb-2">
                             <label for="status" class="form-label">Status</label>
                             <select name="status" id="status" class="form-select">
                                 <option value="inacative">Inactive</option>
                                 <option value="active">Active</option>
                             </select>
                            </div>
                         </div>
                     </div>
                     <hr>
                     <button type="button" class="btn btn-primary">Create a user</button>
                </div>
             </div>
                                              
        </div><!-- container -->
        
    </div>
    <!-- end page content -->
</div>
<!-- end page-wrapper -->
@endsection