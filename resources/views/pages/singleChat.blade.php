@include('partials._header')

<body>
    <div class="container mt-5 pt-3">
        <div>
            <x-navigation/>
        </div>
        <div class="wrapper d-flex">
            {{-- contacts --}}
            <div class="border rounded contact">
                <a class="text-decoration-none" href="{{'/'}}">
                    <div class="d-flex align-items-center py-2 border-bottom ">
                        <img src="{{ asset('storage/profile-pics/pp1.jpg') }}" class="users-status border rounded-circle">
                        <span class="active-circle border rounded-circle"></span>
                        <p class="ms-2 text-body"><strong>All</strong></p>
                    </div>
                </a>
                @foreach ($users as $user)
                    <a class="text-decoration-none" href="{{route('single-chat', ['id'=> $user->p_id])}}">
                        <div class="d-flex align-items-center py-2 border-bottom ">
                            <img src="{{ asset('storage/profile-pics/' . $user->image_path) }}" class="users-status border rounded-circle">
                            <span class="active-circle border rounded-circle"></span>
                            <p class="ms-2 name-font">{{$user->first_name}} {{$user->last_name}}</p>
                        </div>
                    </a>
                @endforeach
            </div>    
            <div class="container border rounded bg-light p-3">
                <div class="chat-container d-flex flex-column-reverse">
                    @foreach ($toUser as $messages)

                        @if ($messages->u_id !== auth()->id())
                            <div class="d-flex justify-content-start flex-column">
                                <span class="fw-lighter ps-1 text-light user-name-font">{{$messages->first_name}} {{$messages->last_name}}</span>
                                <p class="bg-primary px-3 py-1 rounded text-light other-user"> {{$messages->message}}</p>
                            </div> 

                        @else
                            <div class="d-flex justify-content-end">
                                <div class="logged-user">
                                    <span class="fw-lighter ps-1 text-light user-name-font">{{$messages->first_name}} {{$messages->last_name}}</span>
                                    <p class="bg-primary px-3 py-1 rounded text-light">{{$messages->message}}</p>
                                </div>
                            </div>
                        @endif
                    
                    @endforeach
                </div>
                <form action="{{ route('send-message')}}" method="post" class="d-flex justify-content-between my-2 ">
                    @csrf
                    <input type="hidden" name="p_id" value="2">
                    <input type="hidden" name="c_id" value="">
                    <input type="hidden" name="cm_id" value="">
                    <input type="text" name="message" placeholder="Message" class="form-control">
                    <button type="submit" class="btn btn-primary">Send</button>
                </form>
            </div>
        </div>
    </div>
</body>

@include('partials._footer')