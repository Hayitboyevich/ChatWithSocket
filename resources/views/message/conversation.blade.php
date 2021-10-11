@extends('layouts.app')

@section('content')
    <div class="row chat-row">
        <div class="col-md-3">
            <div class="users">
                <h5>Users</h5>

                <ul class="list-group list-chat-item">
                    @if($users->count())
                        @foreach($users as $user)
                            <li class="chat-user-list
                                @if($user->id == $friendInfo->id) active @endif">
                                <a href="{{ route('message.conversation', $user->id) }}">
                                    <div class="chat-image">
                                        {!! makeImageFromName($user->name) !!}
                                        <i class="fa fa-circle user-status-icon user-icon-{{ $user->id }}" title="away"></i>
                                    </div>

                                    <div class="chat-name font-weight-bold">
                                        {{ $user->name }}
                                    </div>
                                </a>
                            </li>
                        @endforeach
                    @endif
                </ul>
            </div>
        </div>

        <div class="col-md-9">
            <div class="chat-header">
                <div class="chat-image">
                    {!! makeImageFromName($user->name) !!}
                </div>

                <div class="chat-name font-weight-bold">
                    {{ $user->name }}
                    <i class="fa fa-circle user-status-head" title="away"
                       id="userStatusHead{{$friendInfo->id}}"></i>
                </div>
            </div>

            <div class="chat-body" id="chatBody">
                <div class="message-listing" id="messageWrapper">
                    <div class="row message align-items-center mb-2">
                        <div class="col-md-12 user-info">
                            <div class="chat-image">
                                {!! makeImageFromName($user->name) !!}
                            </div>
                            <div class="chat-name font-weight-bold">
                                {{ $user->name }}
                                <span class="small time text-gray-500">
                                    10:30 PM
                                </span>
                            </div>
                        </div>
                        <div class="col-md-12 message-content">
                            <div class="message-text">
                                message here
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="chat-box">
                <div class="chat-input bg-white" id="chatInput" contenteditable="">

                </div>

                <div class="chat-input-toolbar">
                    <button title="Add File" class="btn btn-light btn-sm btn-file-upload">
                        <i class="fa fa-paperclip"></i>
                    </button> |

                    <button title="Bold" class="btn btn-light btn-sm tool-items"
                            onclick="document.execCommand('bold', false, '');">
                        <i class="fa fa-bold tool-icon"></i>
                    </button>

                    <button title="Italic" class="btn btn-light btn-sm tool-items"
                            onclick="document.execCommand('italic', false, '');">
                        <i class="fa fa-italic tool-icon"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    {{--    <script>--}}
    {{--        $(function (){--}}
    {{--            let user_id = "{{ auth()->user()->id }}";--}}
    {{--            let ip_address = '127.0.0.1';--}}
    {{--            let socket_port = '8005';--}}
    {{--            let socket = io(ip_address + ':' + socket_port);--}}

    {{--            socket.on('connect', function() {--}}
    {{--                socket.emit('user_connected', user_id);--}}
    {{--            });--}}

    {{--            socket.on('updateUserStatus', (data) => {--}}
    {{--                let $userStatusIcon = $('.user-status-icon');--}}
    {{--                $userStatusIcon.removeClass('text-success');--}}
    {{--                $userStatusIcon.attr('title', 'Away');--}}

    {{--                $.each(data, function (key, val) {--}}
    {{--                    if (val !== null && val !== 0) {--}}
    {{--                        let $userIcon = $(".user-icon-"+key);--}}
    {{--                        $userIcon.addClass('text-success');--}}
    {{--                        $userIcon.attr('title','Online');--}}
    {{--                    }--}}
    {{--                });--}}
    {{--            });--}}
    {{--        });--}}
    {{--    </script>--}}
@endpush

