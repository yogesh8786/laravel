@extends('layouts.admin_auth')
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
                        <form method="post" action="{{ route('admin.signup') }}">

                            <div class="input-group mb-4">
                                <input type="text" name="name" class="form-control" id="signup-name" placeholder="Name">
                            </div>

                            <div class="input-group mb-4">
                                <input type="email" name="email" class="form-control" id="signup-email" placeholder="Email">
                            </div>

                            <div class="input-group mb-4">
                                <input type="password" name="password" class="form-control" id="signup-password" placeholder="Password">
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
                <p>Already have an account? <a href="{{ route('admin.signin') }}">Sign in</a></p>
            </div>

        </div>
    </div>
</div>

@endsection
