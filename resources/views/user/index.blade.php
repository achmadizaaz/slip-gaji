@extends('layouts.app')

@section('title', 'List Users')

@section('content')
    <div class="page-wrapper">

        <!-- Page Content-->
        <div class="page-content">
            <div class="container-fluid"> 
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box d-md-flex justify-content-md-between align-items-center">
                            <h4 class="page-title">List Users</h4>
                            <div>
                                <a href="{{ route('user.create') }}" class="btn btn-primary" ><i class="fa-solid fa-plus me-1"></i> Add User</a>
                            </div><!--end col-->                             
                        </div><!--end page-title-box-->
                    </div><!--end col-->
                </div><!--end row-->
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
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
                                            <th class="text-end">Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($users as $user)
                                            <tr>
                                                <td style="width: 16px;">
                                                    {{ $loop->iteration }}
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
                                                <td class="text-end">    
                                                    <a href="{{ route('user.show', $user->slug) }}" class="btn btn-sm btn-info" data-bs-toggle="tooltip" title="Detail">
                                                        <i class="bi bi-info-circle"></i>
                                                    </a>                                                   
                                                    <a href="{{ route('user.edit', $user->slug) }}" class="btn btn-sm btn-warning" data-bs-toggle="tooltip" title="Edit">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-success reset-password"  data-id="{{ $user->id }}" data-username="{{ $user->username }}" data-bs-toggle="tooltip" title="Reset password">
                                                        <i class="bi bi-arrow-clockwise"></i>
                                                    </a>
                                                    <a href="#" class="btn btn-sm btn-danger delete-user" data-id="{{ $user->id }}" data-username="{{ $user->username }}" data-bs-toggle="tooltip" title="Remove">
                                                        <i class="bi bi-trash3"></i>
                                                    </a>
                                                </td>
                                            </tr> 
                                            @endforeach
                                                                                                                            
                                        </tbody>
                                    </table>
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
@endsection