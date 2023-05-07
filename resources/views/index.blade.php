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
                        <p class="ms-2 text-body"><strong>All</strong></p>
                        <span class="active-circle border rounded-circle"></span>
                    </div>
                </a>
                <a class="text-decoration-none" href="{{'/'}}">
                    <div class="d-flex align-items-center py-2 border-bottom ">
                        <img src="{{ asset('storage/profile-pics/pp1.jpg') }}" class="users-status border rounded-circle">
                        <p class="ms-2 name-font">Johan Wris</p>
                        <span class="active-circle border rounded-circle"></span>
                    </div>
                </a>
                <div class="d-flex py-2 align-items-center border-bottom">
                    <img src="{{ asset('storage/profile-pics/pp1.jpg') }}" class="users-status border rounded-circle">
                    <p class="ms-2 name-font">Johan Wris</p>
                    <span class="deactive-circle border rounded-circle"></span>
                </div>
                <div class="d-flex py-2 align-items-center border-bottom">
                    <img src="{{ asset('storage/profile-pics/pp1.jpg') }}" class="users-status border rounded-circle">
                    <p class="ms-2 name-font">Johan Wris</p>
                    <span class="active-circle border rounded-circle"></span>
                </div>
                <div class="d-flex py-2 align-items-center border-bottom">
                    <img src="{{ asset('storage/profile-pics/pp1.jpg') }}" class="users-status border rounded-circle">
                    <p class="ms-2 name-font">Johan Wris</p>
                    <span class="active-circle border rounded-circle"></span>
                </div>
                <div class="d-flex py-2 align-items-center border-bottom">
                    <img src="{{ asset('storage/profile-pics/pp1.jpg') }}" class="users-status border rounded-circle">
                    <p class="ms-2 name-font">Johan Wris</p>
                    <span class="deactive-circle border rounded-circle"></span>
                </div>
            </div>    
            <div class="container border rounded bg-light p-3">
                <div class="chat-container d-flex flex-column-reverse">
                    @foreach ($message as $messages)

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