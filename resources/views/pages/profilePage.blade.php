@include('partials._header', ['title' => $title])
<div>
    <x-navigation/>
</div>

<div class="mt-5 pt-5  _max-width">
        @foreach ($datas as $data)
            <div class="d-flex">
                <section class="container">
                    <div>
                        <img src="{{ asset('storage/profile-pics/'. $data->image_path) }}" alt="" class="rounded-circle users-status">
                        <h2 class="mt-2">{{$data->first_name}} {{$data->last_name}}</h2>
                    </div>
                </section>
                <a href="{{ route('edit-profile-page') }}" class="btn btn-primary _editBtn btn-sm me-3">Edit profile</a>
                <form action="{{ route('delete-profile') }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-primary _delBtn btn-sm me-3">Delete Profile</button>
                </form>
            </div>
            <hr>
            <section>
                <ul>
                    <li class="list-unstyled">
                        <p><strong>About me:</strong></p>
                        <p class="indent">{{$data->bio}}</p>
                    </li>
                    <li class="list-unstyled">
                        <p><strong>Age: </strong>{{$data->age}} Years Old.</p>
                    </li>
                </ul>
            </section>
        @endforeach
</div>

@include('partials._footer')