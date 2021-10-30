@extends('layouts.user')
@section('content')
<aside class="sidebar bg-light">
    <div class="tab-content h-100" role="tablist">
    <div class="tab-pane fade h-100 show active" id="tab-content-chats" role="tabpanel">
        <div class="d-flex flex-column h-100 position-relative">
            <div class="hide-scrollbar">

                <div class="container py-8">
                    <!-- Title -->
                    <div class="mb-8">
                        <h2 class="fw-bold m-0">Chats</h2>
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
                                <input type="text" class="form-control form-control-lg ps-0 m-search" placeholder="Search messages or users" aria-label="Search for messages or users...">
                            </div>
                        </form>
                    </div>

                    <!-- Chats -->
                    <div class="card-list">
                        <!-- Card -->
                        {{-- <a href="chat-group" class="card border-0 text-reset">
                            <div class="card-body">
                                <div class="row gx-5">
                                    <div class="col-auto">
                                        <div class="avatar avatar-online">
                                            <img src="{{ asset('assets/img/avatars/7.jpg') }}" alt="#" class="avatar-img">
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="d-flex align-items-center mb-3">
                                            <h5 class="me-auto mb-0">William Wright</h5>
                                            <span class="text-muted extra-small ms-2">12:45 PM</span>
                                        </div>

                                        <div class="d-flex align-items-center">
                                            <div class="line-clamp me-auto">
                                                Hello! Yeah, I'm going to meet my friend of mine at the departments stores
                                                now.
                                            </div>

                                            <div class="badge badge-circle bg-primary ms-5">
                                                <span>3</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .card-body -->

                            <div class="card-footer">
                                <div class="row align-items-center gx-4">
                                    <div class="col-auto">
                                        <div class="avatar avatar-xs">
                                            <img class="avatar-img" src="{{ asset('assets/img/avatars/bootstrap.svg') }}"
                                                alt="Bootstrap Community">
                                        </div>
                                    </div>

                                    <div class="col">
                                        <h6 class="mb-0">Bootstrap Community</h6>
                                    </div>

                                    <div class="col-auto">
                                        <div class="avatar-group">
                                            <div class="avatar avatar-xs">
                                                <img src="{{ asset('assets/img/avatars/12.jpg') }}" alt="#"
                                                    class="avatar-img">
                                            </div>

                                            <div class="avatar avatar-xs">
                                                <img src="{{ asset('assets/img/avatars/11.jpg') }}" alt="#"
                                                    class="avatar-img">
                                            </div>

                                            <div class="avatar avatar-xs">
                                                <img src="{{ asset('assets/img/avatars/9.jpg') }}" alt="#"
                                                    class="avatar-img">
                                            </div>

                                            <div class="avatar avatar-xs">
                                                <span class="avatar-text">+5</span>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- .row -->
                            </div><!-- .card-footer -->
                        </a> --}}
                        <!-- Card -->

                        <!-- Card -->
                        @forelse ($users as $user )
                        <a href="{{ route('chating', ['id' => $user->id]) }}" class="card border-0 text-reset" data-username="{{ $user->name }} {{ $user->email }} ">
                            <div class="card-body">
                                <div class="row gx-5">
                                    <div class="col-auto">
                                        <div class="avatar avatar-online">
                                            <img src="{{ $user->profile_photo_url }}" alt="#" class="avatar-img">
                                        </div>
                                    </div>

                                    <div class="col">
                                        <div class="d-flex align-items-center mb-3">
                                            <h5 class="me-auto mb-0">{{ $user->name }}</h5>
                                            <span class="text-primary extra-small ms-2">
                                                @if($user->lastMessageTime())
                                                {{ $user->lastMessageTime()->created_at->format('h:i A') }}
                                                @else
                                                    no chat
                                                @endif
                                            </span>
                                        </div>

                                        <div class="d-flex align-items-center">
                                            <div class="line-clamp me-auto">
                                                {{ $user->email }}
                                            </div>
                                            @if($user->unseenMessage() > 0)
                                            <div class="badge badge-circle bg-primary ms-5">
                                                <span>{{ $user->unseenMessage() }}</span>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div><!-- .card-body -->
                        </a>
                        @empty
                        No User Found
                        @endforelse

                        <!-- Card -->
                    </div>
                    <a class="card text-center no_user_ajax mt-10" style="background-color: #f5f8fb;  display:none; padding-top:150px">No User Found</a>

                    <!-- Chats -->
                </div>

            </div>
        </div>
    </div>
</div>
</aside>

<main class="main">
    <div class="container h-100">

        <div class="d-flex flex-column h-100 justify-content-center text-center">
            <div class="mb-6">
                <span class="icon icon-xl text-muted">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-message-square"><path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"></path></svg>
                </span>
            </div>

            <p class="text-muted">Pick a person from left menu, <br> and start your conversation.</p>
        </div>

    </div>
</main>
@endsection
