@extends('layouts.user_auth')
@section('title','signup')
@section('content')
<div class="container">
    <div class="row align-items-center justify-content-center min-vh-100 gx-0">

        <div class="col-12 col-md-5 col-lg-4">
            <div class="card card-shadow border-0">
                <div class="card-body">
                    <div class="row g-6">
                        <div class="col-12">
                            <div class="text-center">
                                <h3 class="fw-bold mb-2">Sign Up</h3>
                                <p>Follow the easy steps</p>
                            </div>
                        </div>
                        <form method="post" action="{{ route('signup') }}">
                            @csrf
                            <div class="input-group mb-4">
                                <input type="text" name="name" class="form-control" id="signup-name" value="{{ old('name') }}" placeholder="Please Enter Name">
                                @error('name')
                                <span class="validation invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="input-group mb-4">
                                <input type="email" name="email" class="form-control" id="signup-email" value="{{ old('email') }}" placeholder="Please Enter Email">
                                @error('email')
                                <span class="validation invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="input-group mb-4">
                                <input type="password" name="password" class="form-control" id="signup-password" placeholder="Please Enter Password">
                                @error('password')
                                <span class="validation invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="input-group mb-4">
                                <input type="password" name="password_confirmation" class="form-control" id="signup-confirm-password"  placeholder="Please Enter Same Password Again">
                                @error('confirm_password')
                                <span class="validation invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="col-12">
                            <button class="btn btn-block btn-lg btn-primary w-100" type="submit">Create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Text -->
            <div class="text-center mt-8">
                <p>Already have an account? <a href="{{ route('signin') }}">Sign in</a></p>
            </div>

        </div>
    </div>
</div>

@endsection
