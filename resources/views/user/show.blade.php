@extends('layouts.app')

@section('title', $user->name)

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
                            <img src="{{ asset('storage/'.$user->image) }}" width="100%" height="200px" class="rounded-2">
                            @else
                                <img src="{{ asset('themes/images/no-avatar.webp') }}" width="100%" height="200px" class="rounded-2">
                            @endif
                        </div>
                        <div class="col-4">
                            
                            <div class="mb-3">
                                    <div class="form-label">Username:</div>
                                    <div class="fw-bold">{{ $user->username }}</div>
                            </div>
                            <div class="mb-3">
                                <div class="form-label">Name:</div>
                                <div  class="fw-bold">{{ $user->name }}</div>
                            </div>
                            <div class="mb-3">
                                    <div class="form-label">Email:</div>
                                    <div  class="fw-bold">{{ $user->email }}</div>
                            </div>
                           
                        </div>
                        <div class="col-4">
                            <div class="mb-3">
                                <div class="form-label">Satus:</div>
                                    <span class="badge bg-primary">{{ $user->is_active ? 'Active' : 'Inactive' }}</span>
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
                        <a href="{{ route('user.index') }}" class="btn btn-secondary">
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