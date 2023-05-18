@include('partials._header', ['title' => $title])

<body>
    <div class="container mt-5 pt-3">
        <div>
            <x-navigation/>
        </div>
        <div class="wrapper d-flex">
            {{-- contacts --}}
            <div class="border rounded contact">
                @include('components.leftContacts')
            </div>    

            <div class="container border rounded bg-light p-3">
                <div class="chat-container d-flex flex-column-reverse" id="singleChatContainer">
                    {{-- fetching data chats --}}
                </div>
                <form action="{{ route('send-message')}}" method="post" class="d-flex justify-content-between my-2 ">
                    @csrf
                    <input type="hidden" name="p_id" value="2">
                    <input type="hidden" name="c_id" value="">
                    <input type="hidden" name="cm_id" value="">
                    <input type="hidden" name="receiver_id" value="{{request('id')}}">
                    <input type="text" name="message" placeholder="Message" class="form-control">
                    <button type="submit" class="btn btn-primary" id="singleChatSubmitBtn">Send</button>
                </form>
            </div>
        </div>
    </div>
</body>

@include('partials._footer')