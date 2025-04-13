@extends('layouts.guest')

@section('title', 'Login')

@section('content')
 <!-- Session Status -->
 <x-auth-session-status class="mb-4" :status="session('status')" />
<div class="container-xxl">
    <div class="row vh-100 d-flex justify-content-center">
        <div class="col-12 align-self-center">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 mx-auto">
                        <div class="card shadow">
                            <div class="card-body p-0 bg-black auth-header-box rounded-top">
                                <div class="text-center p-3">
                                    <h4 class="mt-3 mb-1 fw-semibold text-white fs-18">{{ env('APP_NAME') }}</h4>   
                                    <p class="text-muted fw-medium mb-0">Sign in to continue.</p>  
                                </div>
                            </div>
                            <div class="card-body pt-0">     
                                <form class="my-4" method="POST" action="{{ route('login') }}">     
                                    @csrf       
                                    @if($errors->any())
                                        <div class="d-flex align-items-center alert alert-danger alert-dismissible fade show py-2" role="alert">
                                        <small>{{ implode('', $errors->all(':message')) }}</small>
                                        <button type="button" class="btn-close small" data-bs-dismiss="alert" aria-label="Close" style="padding: 12px;"></button>
                                        </div>
                                    @endif                            
                                    <div class="form-group mb-2">
                                        <label class="form-label" for="username">Username</label>
                                        <input type="text" class="form-control" id="username" name="login" placeholder="Enter username" value="{{ old('login') }}" required>          
                                                             
                                    </div><!--end form-group--> 
        
                                    <div class="form-group">
                                        <label class="form-label" for="userpassword">Password</label>                                            
                                        <input type="password" class="form-control" name="password" id="userpassword" placeholder="Enter password" required>                            
                                    </div><!--end form-group--> 
        
                                    <div class="form-group row mt-3">
                                        <div class="col-sm-6">
                                            <div class="form-check form-switch form-switch-primary">
                                                <input class="form-check-input" type="checkbox" id="customSwitchSuccess">
                                                <label class="form-check-label" for="customSwitchSuccess">Remember me</label>
                                            </div>
                                        </div><!--end col--> 
                                        
                                        <div class="col-sm-6 text-end">
                                            @if (Route::has('password.request'))
                                                <a  href="{{ route('password.request') }}" class="'fst-italic">
                                                    {{ __('Forgot your password?') }}
                                                </a>
                                            @endif
                                        </div><!--end col--> 
                                    </div><!--end form-group--> 
        
                                    <div class="form-group mb-0 row">
                                        <div class="col-12">
                                            <div class="d-grid mt-3">
                                                <button class="btn btn-primary" type="submit">Log In <i class="fas fa-sign-in-alt ms-1"></i></button>
                                            </div>
                                            <div class="d-grid mt-2">
                                                <button class="btn bg-danger-subtle text-danger" type="submit">
                                                    <i class="fab fa-google align-self-center"></i> Google Account
                                                </button>
                                            </div>
                                        </div><!--end col--> 
                                    </div> <!--end form-group-->                           
                                </form><!--end form-->
                                <div class="text-center">
                                    @if (Route::has('register'))
                                    <p class="text-muted">Don't have an account ?  
                                            <a  href="{{ route('register') }}">
                                                {{ __('Register now') }}
                                            </a>
                                        </p>
                                    @endif
                                </div>
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end card-body-->
        </div><!--end col-->
    </div><!--end row-->                                        
</div><!-- container -->
@endsection