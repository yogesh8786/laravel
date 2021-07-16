@extends('layouts.user_auth')
@section('title','signin')
@section('content')
<div class="col-12 col-md-5 col-lg-4">
    <div class="card card-shadow border-0">
        <div class="card-body">
            <div class="row g-6">
                <div class="col-12">
                    <div class="text-center">
                        <h3 class="fw-bold mb-2">Sign In</h3>
                        <p>Login to your account</p>
                    </div>
                </div>
                <form method="post" action="{{ route('signin') }}">
                    @csrf
                    <div class="input-group mb-4">
                        <input type="email" class="form-control" name="email" placeholder="Email" value="{{ old('email') }}" required/>
                        @error('email')
                            <span class="validation invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-4">
                        <input type="password" class="form-control" placeholder="Enter Password" name="password" required />
                    </div>
                    <div class="col-12">
                        <button class="btn btn-block btn-lg btn-primary w-100" type="submit">Signin</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Text -->
    <div class="text-center mt-8">
        <p>Don't have an account yet? <a href="{{ route('signup') }}">Sign up</a></p>
        <p><a href="{{ route('forgetPassword') }}">Forgot Password?</a></p>
    </div>
</div>
@endsection
