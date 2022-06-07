@extends('layouts.auth.app')

@section('content')
<!-- Main Container -->
<main id="main-container">
    <!-- Page Content -->
    <div class="bg-image" style="background-image: url('/theme/media/photo/login-side.jpg');">
        <div class="row g-0 bg-primary-op">
            <!-- Main Section -->
            <div class="hero-static col-md-6 d-flex align-items-center bg-body-extra-light">
                <div class="p-3 w-100">
                    <!-- Header -->
                    <div class="mb-3 text-center">
                        <a class="link-fx fw-bold fs-1" href="/">
                            <span class="text-dark">M</span><span class="text-primary">T</span>
                        </a>
                        <p class="text-uppercase fw-bold fs-sm text-muted">Sign Up</p>
                    </div>
                    <!-- END Header -->

                    <!-- Sign In Form -->
                    <!-- jQuery Validation (.js-validation-signin class is initialized in js/pages/op_auth_signin.min.js which was auto compiled from _js/pages/op_auth_signin.js) -->
                    <!-- For more info and examples you can check out https://github.com/jzaefferer/jquery-validation -->
                    <div class="row g-0 justify-content-center">
                        <div class="col-sm-8 col-xl-6">
                            <form class="js-validation-signin" method="POST" action="{{ route('register.post') }}">
                                @csrf
                                <div class="py-3">
                                    <div class="mb-4">
                                        <input type="text" class="form-control form-control-lg form-control-alt" id="login-username" name="name" placeholder="Name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <input type="email" class="form-control form-control-lg form-control-alt" id="login-username" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <input type="password" class="form-control form-control-lg form-control-alt" id="login-password" name="password" placeholder="Password" required autocomplete="current-password">
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                    <div class="mb-4">
                                        <input type="password" class="form-control form-control-lg form-control-alt" id="login-password" name="password_confirmation" placeholder="Confirm Password" required autocomplete="current-password">
                                        @error('password_confirm')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <button type="submit" class="btn w-100 btn-lg btn-hero btn-primary">
                                        <i class="fa fa-fw fa-sign-in-alt opacity-50 me-1"></i> Sign Up
                                    </button>
                                    <p class="mt-3 mb-0 d-lg-flex justify-content-lg-between">
                                        @if (Route::has('login'))
                                        <a class="btn btn-sm btn-alt-secondary d-block d-lg-inline-block mb-1" href="{{ route('login') }}">
                                            <i class="fa fa-exclamation-triangle opacity-50 me-1"></i> Already a member?
                                        </a>
                                        @endif
                                    </p>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- END Sign In Form -->
                </div>
            </div>
            <!-- END Main Section -->

            <!-- Meta Info Section -->
            <div class="hero-static col-md-6 d-none d-md-flex align-items-md-center justify-content-md-center text-md-center">
                <div class="p-3">
                    <p class="display-6 fw-bold text-white mb-3">
                        Lorem Ipsum</p>
                    <p class="display-1 fw-bold text-white mb-3">
                        Neque porro
                    </p>
                    <p class="fs-lg fw-semibold text-white-75 mb-0">
                        Copyright &copy; <span data-toggle="year-copy"></span>
                    </p>
                </div>
            </div>
            <!-- END Meta Info Section -->
        </div>
    </div>
    <!-- END Page Content -->
</main>
<!-- END Main Container -->
@endsection