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
