@extends('layouts.admin')
@section('content')
<div  id="tab-content-support" role="tabpanel">
    <div class="d-flex flex-column h-100">
        <div class="hide-scrollbar">
            <div class="container py-8">

                <!-- Title -->
                <div class="mb-8">
                    <h2 class="fw-bold m-0">Support</h2>
                </div>

                <!-- Search -->
                <div class="mb-6">
                    <form action="#">
                        <div class="input-group">
                            <div class="input-group-text">
                                <div class="icon icon-lg">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                </div>
                            </div>

                            <input type="text" class="form-control form-control-lg ps-0" placeholder="Search messages or users" aria-label="Search for messages or users...">
                        </div>
                    </form>
                </div>

                <!-- Docs -->
                <div class="card border-0">
                    <div class="card-body">

                        <div class="row align-items-center gx-5">
                            <div class="col-auto text-primary">
                                <svg version="1.1" width="46px" height="46px" fill="currentColor" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" viewBox="0 0 46 46" enable-background="new 0 0 46 46" xml:space="preserve">
                                    <polygon opacity="0.7" points="45,11 36,11 35.5,1 "/>
                                    <polygon points="35.5,1 25.4,14.1 39,21 "/>
                                    <polygon opacity="0.4" points="17,9.8 39,21 17,26 "/>
                                    <polygon opacity="0.7" points="2,12 17,26 17,9.8 "/>
                                    <polygon opacity="0.7" points="17,26 39,21 28,36 "/>
                                    <polygon points="28,36 4.5,44 17,26 "/>
                                    <polygon points="17,26 1,26 10.8,20.1 "/>
                                </svg>

                            </div>

                            <div class="col">
                                <h4 class="mb-1">Documentation</h4>
                                <p>Setup and build tools</p>
                            </div>

                            <div class="col-auto">
                                <a href="docs/index.html" class="btn btn-sm btn-icon btn-primary rounded-circle">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Docs -->

                <!-- Demos -->
                <div class="card-list mt-8">
                    <div class="d-flex align-items-center mb-4 px-6">
                        <small class="text-muted me-auto">Demos</small>
                    </div>

                    <div class="card border-0">
                        <img src="{{ asset('assets/img/demos/light.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="row align-items-center gx-0">
                                <div class="col">
                                    <h4 class="mb-1">Light</h4>
                                    <p>Classic light theme</p>
                                </div>
                                <div class="col-auto">
                                    <a href="./light/" class="btn btn-sm btn-icon btn-primary rounded-circle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0">
                        <img src="{{ asset('assets/img/demos/dark.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <div class="row align-items-center gx-0">
                                <div class="col">
                                    <h4 class="mb-1">Dark</h4>
                                    <p>Classic dark theme</p>
                                </div>
                                <div class="col-auto">
                                    <a href="./dark/" class="btn btn-sm btn-icon btn-primary rounded-circle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Demos -->

                <!-- Account Pages -->
                <div class="card-list mt-8">
                    <div class="d-flex align-items-center mb-4 px-6">
                        <small class="text-muted me-auto">Pages</small>
                    </div>

                    <div class="card border-0">
                        <div class="card-body">
                            <div class="row align-items-center gx-0">
                                <div class="col">
                                    <h4 class="mb-1">Sign In</h4>
                                    <p>Sign in Page</p>
                                </div>
                                <div class="col-auto">
                                    <a href="signin.html" class="btn btn-sm btn-icon btn-primary rounded-circle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0">
                        <div class="card-body">
                            <div class="row align-items-center gx-0">
                                <div class="col">
                                    <h4 class="mb-1">Sign Up</h4>
                                    <p>Sign Up Page</p>
                                </div>
                                <div class="col-auto">
                                    <a href="signup.html" class="btn btn-sm btn-icon btn-primary rounded-circle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0">
                        <div class="card-body">
                            <div class="row align-items-center gx-0">
                                <div class="col">
                                    <h4 class="mb-1">Password Reset</h4>
                                    <p>Password Reset Page</p>
                                </div>
                                <div class="col-auto">
                                    <a href="password-reset.html" class="btn btn-sm btn-icon btn-primary rounded-circle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card border-0">
                        <div class="card-body">
                            <div class="row align-items-center gx-0">
                                <div class="col">
                                    <h4 class="mb-1">Lock screen</h4>
                                    <p>Lock screen Page</p>
                                </div>
                                <div class="col-auto">
                                    <a href="lockscreen.html" class="btn btn-sm btn-icon btn-primary rounded-circle">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Account Pages -->
            </div>
        </div>
    </div>
</div>
@endsection
