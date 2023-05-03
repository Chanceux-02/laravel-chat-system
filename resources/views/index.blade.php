@include('partials._header')

<body>
    <h1 class="text-center">Chat System</h1>
    
    <div class="container border">
        @foreach ($message as $messages)
            <div class="d-flex justify-content-start flex-column">
                <span class="fw-lighter text-dark ps-1">name sender1</span>
                <p class="bg-primary mt-0"> {{$messages->message}} </p>
            </div>
        @endforeach
        <div class="d-flex justify-content-end">
            <div>
                <span class="fw-lighter text-dark ps-1">name sender 2</span>
                <p class="bg-primary ">messages</p>
            </div>
        </div>

        <form action="{{ route('send-message')}}" method="post" class="d-flex">
            @csrf
            <input type="hidden" name="p_id" value="2">
            <input type="hidden" name="c_id" value="">
            <input type="hidden" name="cm_id" value="">
            <input type="text" name="message" placeholder="Message">
            <button type="submit">Send</button>
        </form>


    </div>
    
</body>

@include('partials._footer')