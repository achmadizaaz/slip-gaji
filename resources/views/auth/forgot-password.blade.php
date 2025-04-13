@extends('layouts.guest')

@section('title', 'Forget password')

@section('content')
<div class="container-xxl">
    <div class="row vh-100 d-flex justify-content-center">
        <div class="col-12 align-self-center">
            <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 mx-auto">
                        <div class="card shadow">
                            <div class="card-body p-0 border-bottom auth-header-box rounded-top">
                                <div class="text-center p-3">
                                    <h4 class="mt-3 mb-1 fw-semibold text-white fs-18">Reset Password</h4>   
                                    <p class="text-muted fw-medium mb-0">Enter your Email and instructions will be sent to you!</p>  
                                </div>
                            </div>
                            
                            <div class="card-body pt-0">     
                                <form class="my-4" method="POST" action="{{ route('password.email') }}">
                                    @csrf            
                                    <div class="form-group mb-2">
                                        <input type="text" class="form-control" id="userEmail" name="email" placeholder="Enter Email Address" required autofocus >                               
                                    </div><!--end form-group-->             
                                    
                                    <div class="form-group mb-0 row">
                                        <div class="col-12">
                                            <div class="d-grid mt-3">
                                                <button class="btn btn-primary" type="submit">
                                                    {{ __('Email Password Reset Link') }}
                                                </button>
                                            </div>
                                        </div><!--end col--> 
                                    </div> <!--end form-group-->                           
                                </form><!--end form-->
                            </div><!--end card-body-->
                        </div><!--end card-->
                    </div><!--end col-->
                </div><!--end row-->
            </div><!--end card-body-->
        </div><!--end col-->
    </div><!--end row-->                                        
</div><!-- container -->
@endsection