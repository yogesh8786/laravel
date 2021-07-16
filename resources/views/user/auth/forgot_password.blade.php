@extends('layouts.user_auth')
@section('title','reset password')
@section('content')
<div class="col-12 col-md-5 col-lg-4">
    <div class="card card-shadow border-0">
        <div class="card-body">
            <div class="row g-6">
                <div class="col-12">
                    <div class="text-center">
                        <h3 class="fw-bold mb-2">Password Reset</h3>
                        <p>Enter your email to reset password</p>
                    </div>
                </div>
                <form role="form" method="post" action="{{ route('forgetPassword') }}" class="w-100">
                    @csrf
                <div class="input-group mb-4">
                    <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required/>
                    @error('email')
                        <span class="validation invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>

                <div class="col-12">
                    <button class="btn btn-block btn-lg btn-primary w-100" type="submit">Send Reset Link</button>
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
@endsection
