@include('partials._header')

<body>
    <div class="container mt-5 pt-3">
        <div>
            <x-navigation/>
        </div>
        <div class="wrapper d-flex">
            {{-- contacts --}}
            <div class="border rounded contact">
                <div>
                    <img src="{{Storage('public/profile-pics/pp1.jpg')}}">
                    <p>Johan Wris</p>

                </div>
            </div>    
            <div class="container border rounded border-success bg-dark p-3">
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