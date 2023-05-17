
@foreach ($message as $messages)

    @if ($messages->u_id !== auth()->id())
        <div class="d-flex justify-content-start flex-column">
            <span class="fw-lighter ps-1 text-dark user-name-font">{{$messages->first_name}} {{$messages->last_name}}</span>
            <p class="bg-primary px-3 py-1 rounded text-light other-user"> {{$messages->message}}</p>
        </div> 

    @else
        <div class="d-flex justify-content-end">
            <div class="logged-user">
                <div class="d-flex flex-column justify-content-end">
                    <span class="fw-lighter ps-1 text-dark text-end user-name-font">{{$messages->first_name}} {{$messages->last_name}}</span>
                    <div class="d-flex">
                        <form action="{{route('delete-message')}}" method="post">
                            @csrf
                            @method('DELETE')
                            <input type="hidden" name="messageId" value="{{$messages->m_id}}">
                            <button type="submit" name="delMessage" class="btn btn-unstyled p-0"><i class="fa-solid fa-trash-can fa-2xs"></i></button>
                        </form>
                        <p class="bg-primary ms-1 px-3 py-1 rounded text-light">{{$messages->message}}</p>
                    </div>
                </div>
            </div>
        </div>
    @endif
                    
@endforeach

