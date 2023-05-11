@foreach ($toUser as $messages)

    @if ($messages->u_id !== auth()->id())
        <div class="d-flex justify-content-start flex-column">
            <span class="fw-lighter ps-1 text-dark user-name-font">{{$messages->first_name}} {{$messages->last_name}}</span>
            <p class="bg-primary px-3 py-1 rounded text-light other-user"> {{$messages->message}}</p>
        </div> 

    @else
        <div class="d-flex justify-content-end">
            <div class="logged-user">
                <span class="fw-lighter ps-1 text-dark user-name-font">{{$messages->first_name}} {{$messages->last_name}}</span>
                <p class="bg-primary px-3 py-1 rounded text-light">{{$messages->message}}</p>
            </div>
        </div>
    @endif

@endforeach