@extends('layouts.guest')

@section('coontent')
    <div class="container-scroller">
        <div class="container-fluid page-body-wrapper full-page-wrapper">
            <div class="content-wrapper d-flex align-items-center auth px-0">
                <div class="row w-100 mx-0">
                    <div class="col-lg-4 mx-auto">
                        <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                            <div class="brand-logo">
                                <h3 class="font-weight-bold">Taom-Tanlang </h3>
                            </div>

                            <!-- Laravel login form -->
                            <form method="POST" action="{{ route('login') }}" class="pt-3">
                                @csrf
                                <!-- Username or Email Field -->
                                <div class="form-group">
                                    <input type="email"
                                           class="form-control form-control-lg @error('email') is-invalid @enderror"
                                           name="email"
                                           value="{{ old('email') }}"
                                           placeholder="Email"
                                           required
                                           autofocus>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- Password Field -->
                                <div class="form-group">
                                    <input type="password"
                                           class="form-control form-control-lg @error('password') is-invalid @enderror"
                                           name="password"
                                           placeholder="Password"
                                           required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>

                                <!-- Sign In Button -->
                                <div class="mt-3">
                                    <button type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                        Kirish
                                    </button>
                                </div>

                                <!-- Google login -->
                                <div class="mb-2 mt-3">
                                    <a href="{{ route('google.redirect') }}" class="btn btn-block btn-google auth-form-btn">
                                        <i class="ti-google mr-2"></i> Google orqali Login
                                    </a>
                                </div>

                                <!-- Register link -->
                                <div class="text-center mt-4 font-weight-light">
                                    Ro'yxatdan o'tish uchun <a href="{{ route('register') }}" class="text-primary">- Register</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- content-wrapper ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
@endsection
