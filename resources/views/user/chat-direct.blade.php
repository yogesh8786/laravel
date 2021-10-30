@extends('layouts.user')
@section('content')
<aside class="sidebar bg-light">
    <div class="tab-content h-100" role="tablist">
                <div class="tab-content h-100" role="tablist">
                    <!-- Chats -->
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
                                        <div class="input-group">
                                            <div class="input-group-text">
                                                <div class="icon icon-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>
                                                </div>
                                            </div>

                                            <input type="text" class="form-control form-control-lg ps-0 m-search" placeholder="Search messages or users" aria-label="Search for messages or users...">
                                        </div>
                                    </div>

                                    <!-- Chats -->
                                    <div class="card-list">
                                        @forelse ($users as $user)
                                        <a href="{{ route('chating', ['id' => $user->id]) }}" class="card border-0 text-reset" data-username="{{ $user->name }} {{ $user->email }}">
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
                                    <a class="card text-center no_user_ajax" style="background-color: #f5f8fb;  display:none; padding-top:150px">No User Found</a>
                                    <!-- Chats -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </aside>

            <main class="main is-visible" data-dropzone-area="">
                <div class="container h-100">

                    <div class="d-flex flex-column h-100 position-relative">
                        <!-- Chat: Header -->
                        <div class="chat-header border-bottom py-4 py-lg-7">
                            <div class="row align-items-center">

                                <!-- Mobile: close -->
                                <div class="col-2 d-xl-none">
                                    <a class="icon icon-lg text-muted" href="#" data-toggle-chat="">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-left"><polyline points="15 18 9 12 15 6"></polyline></svg>
                                    </a>
                                </div>
                                <!-- Mobile: close -->

                                <!-- Content -->
                                <div class="col-8 col-xl-12">
                                    <div class="row align-items-center text-center text-xl-start">
                                        <!-- Title -->
                                        <div class="col-12 col-xl-6">
                                            <div class="row align-items-center gx-5">
                                                <div class="col-auto">
                                                    <div class="avatar avatar-online d-none d-xl-inline-block">
                                                        <img class="avatar-img" src="{{ $chatuser->profile_photo_url }}" alt="">
                                                    </div>
                                                </div>

                                                <div class="col overflow-hidden">
                                                    <h5 class="text-truncate">{{ $chatuser->name }}</h5>
                                                    <p class="text-truncate">{{ $chatuser->bio ?? 'bio here'}}
                                                        {{-- <span class='typing-dots'><span>.</span><span>.</span><span>.</span></span> --}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Title -->

                                        <!-- Toolbar -->
                                        <div class="col-xl-6 d-none d-xl-block">
                                            <div class="row align-items-center justify-content-end gx-6">
                                                <div class="col-auto">
                                                    <div class="avatar-group">
                                                        <a href="#" class="avatar avatar-sm" data-bs-toggle="modal" data-bs-target="#modal-user-profile">
                                                            <img class="avatar-img" src="{{ $chatuser->profile_photo_url }}" alt="#">
                                                        </a>

                                                        <a href="#" class="avatar avatar-sm" data-bs-toggle="modal" data-bs-target="#modal-profile">
                                                            <img class="avatar-img" src="{{ Auth::user()->profile_photo_url }}" alt="#">
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- Toolbar -->
                                    </div>
                                </div>
                                <!-- Content -->

                                <!-- Mobile: more -->
                                <div class="col-2 d-xl-none text-end">
                                    <a href="#" class="icon icon-lg text-muted" data-bs-toggle="offcanvas" data-bs-target="#offcanvas-more" aria-controls="offcanvas-more">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                    </a>
                                </div>
                                <!-- Mobile: more -->

                            </div>
                        </div>
                        <!-- Chat: Header -->

                        <!-- Chat: Content -->
                        <div class="chat-body hide-scrollbar flex-1 h-100">
                            <div class="chat-body-inner" id="wallet">
                                <div class="py-6 py-lg-10" id="chat">

                                    @if(isset($messages) && count($messages))

                                    @foreach ($groupedBydate as $date=>$messages)
                                        <!-- Divider -->
                                    <div class="message-divider">
                                        <small class="text-primary">{{ $date }}</small>
                                    </div>
                                        @foreach ($messages as $message)

                                        @if($message->sender_id == Auth::id())
                                        <div class="message message-out">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-profile" class="avatar avatar-responsive">
                                                <img class="avatar-img" src="{{ Auth::user()->profile_photo_url }}" alt="">
                                            </a>

                                            <div class="message-inner">
                                                <div class="message-body">
                                                    <div class="message-content">
                                                        <div class="message-text">
                                                            <p>{{ $message->message }}</p>
                                                        </div>

                                                        <!-- Dropdown -->
                                                        <div class="message-action">
                                                            <div class="dropdown">
                                                                <a class="icon text-muted" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-vertical"><circle cx="12" cy="12" r="1"></circle><circle cx="12" cy="5" r="1"></circle><circle cx="12" cy="19" r="1"></circle></svg>
                                                                </a>

                                                                <ul class="dropdown-menu">
                                                                    <li>
                                                                        <hr class="dropdown-divider">
                                                                    </li>
                                                                    <li>
                                                                        <a class="dropdown-item d-flex align-items-center text-danger" href="{{ route('deletemessage', $message->id) }}">
                                                                            <span class="me-auto">Delete for everyone</span>
                                                                            <div class="icon">
                                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash-2"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path><line x1="10" y1="11" x2="10" y2="17"></line><line x1="14" y1="11" x2="14" y2="17"></line></svg>
                                                                            </div>
                                                                        </a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="message-footer">
                                                    <span class="extra-small text-primary">{{ date_format($message->created_at, 'h:i A')  }}</span>
                                                </div>
                                            </div>
                                        </div>

                                        @else
                                        <div class="message">
                                            <a href="#" data-bs-toggle="modal" data-bs-target="#modal-user-profile" class="avatar avatar-responsive">
                                                <img class="avatar-img" src="{{ $chatuser->profile_photo_url }}" alt="">
                                            </a>

                                            <div class="message-inner">
                                                <div class="message-body">
                                                    <div class="message-content">
                                                        <div class="message-text">
                                                            <p>{{ $message->message }}</p>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="message-footer">
                                                    <span class="extra-small text-primary">{{ date_format($message->created_at, 'h:i A')  }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        @endif
                                        @endforeach
                                    @endforeach
                                    @else
                                        <div class="text-center text-3xl p-13">
                                            No Chat Yet
                                        </div>
                                    @endif
                                    <!-- Message -->
                                </div>
                            </div>
                        </div>
                        <!-- Chat: Content -->

                        <!-- Chat: Footer -->
                        <div class="chat-footer pb-3 pb-lg-7 position-absolute bottom-0 start-0">
                            <!-- Chat: Files -->
                            <div class="dz-preview bg-dark" id="dz-preview-row" data-horizontal-scroll="">
                            </div>
                            <!-- Chat: Files -->

                            <!-- Chat: Form -->
                            <form class="chat-form rounded-pill bg-dark" data-emoji-form="">
                                {{-- @csrf --}}
                                <div class="row align-items-center gx-0">
                                    <div class="col-auto">
                                        <a href="#" class="btn btn-icon btn-link text-body rounded-circle" id="dz-btn">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-paperclip"><path d="M21.44 11.05l-9.19 9.19a6 6 0 0 1-8.49-8.49l9.19-9.19a4 4 0 0 1 5.66 5.66l-9.2 9.19a2 2 0 0 1-2.83-2.83l8.49-8.48"></path></svg>
                                        </a>
                                    </div>

                                    <div class="col">
                                        <div class="input-group">
                                            <textarea name="message" class="form-control px-0" id="sendmsgtext" placeholder="Type your message..." rows="1" data-emoji-input="" data-autosize="true"></textarea>
                                            <input type="hidden" name="id" value="{{ request()->id }}">
                                            <a href="#" class="input-group-text text-body pe-0" data-emoji-btn="">
                                                <span class="icon icon-lg">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-smile"><circle cx="12" cy="12" r="10"></circle><path d="M8 14s1.5 2 4 2 4-2 4-2"></path><line x1="9" y1="9" x2="9.01" y2="9"></line><line x1="15" y1="9" x2="15.01" y2="9"></line></svg>
                                                </span>
                                            </a>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <button type="button" class="btn btn-icon btn-primary rounded-circle ms-5" id="sendmsg" disabled>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-send"><line x1="22" y1="2" x2="11" y2="13"></line><polygon points="22 2 15 22 11 13 2 9 22 2"></polygon></svg>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <!-- Chat: Form -->
                        </div>
                        <!-- Chat: Footer -->
                    </div>

                </div>
            </main>

@endsection

@section('extra_scripts')
    <script>

        var socket = io('localhost:1000');
        main = $('#wallet');
        pagiDiv = $('#chat');
        console.log($(pagiDiv).height())
        console.log($(main).height())
        var page = 1;
        var type = 1;
        var ajax = 1;
        var totalPage = 30;
        var elem = document.getElementById('chat');

        $('#sendmsgtext').keyup( ()=> {
           var length = $('#sendmsgtext').val().length;
            if(length == 0)
            {
                $('#sendmsg').attr('disabled', true);
                return false;
            }
                $('#sendmsg').attr('disabled', false);
        });

        $('#sendmsg').click(function(){

            var id = $("input[name='id']").val();
            var msg = $("textarea[name='message']").val();

            socket.emit("sendMessage", msg);
            $("#chat").animate({ scrollTop: (elem.scrollTop = elem.scrollHeight)*100}, "slow");

            $.ajax({
                type:'post',
                url:"{{ route('sendMessage') }}",
                data: {
                    'id':id,
                    'message':msg,
                    '_token': "{{ csrf_token() }}"
                },
                success:function(data){
                    $("textarea[name='message']").val('');
                    $('#sendmsg').attr('disabled', true);
                    $("#chat").html(data+'<br><br>');
                    $("#chat").animate({ scrollTop: (elem.scrollTop = elem.scrollHeight)*100}, "slow");
                }

            });
        });

        $(function(){
            let socket = io('localhost:1000');

            let msg = $('#sendmsgtext').text();

            socket.emit("JobChatRoom", "{{ request()->id }}");

            socket.on('JobChatRoom', function (msg) {
                console.log(msg);
            });

            $("#chat").animate({ scrollTop: (elem.scrollTop = elem.scrollHeight)*100}, "slow");

            $(pagiDiv).scroll(function () {
                if ($(pagiDiv).scrollTop() + $(pagiDiv).height() <= $(main).height() + 10) {
                    if(page < totalPage){
                        page++;
                    }

                }
            });

        });

        $('.chatRelation').click(function(){
            var _this = $(this);
            var chat_relation_id = $(this).attr('data-chat_relation_id');
            $('#chat_relation_id').val(chat_relation_id);
            var data = { sender_id: "{{ Auth::user()->id }}", chat_relation_id: $('#chat_relation_id').val(), receiver_id: $('#receiver_id').val() };

            //getChat(chat_relation_id)
        });

        socket.on('getMessage', function (msg) {
            getChat($('#chat_relation_id').val())
        });


    </script>
@endsection

