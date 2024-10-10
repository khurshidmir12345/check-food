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
                            <!-- Registration Form -->
                            <form method="POST" action="{{ route('register') }}" class="pt-3">
                                @csrf
                                <!-- Username Field -->
                                <div class="form-group">
                                    <input type="text"
                                           class="form-control form-control-lg @error('name') is-invalid @enderror"
                                           name="name" value="{{ old('name') }}" placeholder="Foydalanuvchi nomi" required>
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                       <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <!-- Email Field -->
                                <div class="form-group">
                                    <input type="email"
                                           class="form-control form-control-lg @error('email') is-invalid @enderror"
                                           name="email" value="{{ old('email') }}" placeholder="Electron pochta" required>
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
                                           name="password" placeholder="Parol" required>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <input type="password"
                                           class="form-control form-control-lg @error('password_confirmation') is-invalid @enderror"
                                           name="password_confirmation" placeholder="Tasdiqlovchi parol" required>
                                    @error('password_confirmation')
                                    <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                                </span>
                                    @enderror
                                </div>

                                <!-- Submit Button -->
                                <div class="mt-3">
                                    <button type="submit"
                                            class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn">
                                        Register
                                    </button>
                                </div>

                                <!-- Link to Login Page -->
                                <div class="text-center mt-4 font-weight-light">
                                    Already have an account? <a href="{{ route('login') }}"
                                                                class="text-primary">Login</a>
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
