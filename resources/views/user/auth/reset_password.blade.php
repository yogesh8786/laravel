@extends('layouts.user_auth')
@section('content')
    <div class="col-12 col-md-5 col-lg-4">
        <div class="card card-shadow border-0">
            <div class="card-body">
                <div class="row g-6">
                    <div class="col-12">
                        <div class="text-center">
                            <h3 class="fw-bold mb-2">Reset  Your Password </h3>
                        </div>
                    </div>
                    <form  method="post" action="{{ route('password.reset', $token) }}" >
                        @csrf
                    <div class="input-group mb-4">
                        <input type="password" name="password" class="form-control" id="signup-password"
                            placeholder="Please Enter Password">
                        @error('password')
                            <span class="validation invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-group mb-4 ">
                        <input class="form-control" placeholder="Confirm Password" type="password"
                            name="password_confirmation" required>
                        @error('password_confirmation')
                            <span class="validation invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-info btn-block px-4">Submit</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
