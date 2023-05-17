@include('partials._header')
<div>
    <x-navigation/>
</div>

<div class="mt-5 pt-5  _max-width">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('edit-profile') }}" method="post" enctype="multipart/form-data">
        @csrf
        @foreach ($datas as $data)
            <div class="d-flex">
                <section class="container">
                    <div>
                        <img src="{{ asset('storage/profile-pics/'. $data->image_path) }}" alt="" class="rounded-circle users-status">
                        <input type="file" name="profilePic" class="ms-3">
                        <div class="d-flex mt-3">
                            <input type="text" name="first_name" value="{{$data->first_name}}">
                            <input type="text" class="ms-3" name="last_name" value="{{$data->last_name}}">
                        </div>
                    </div>
                </section>
                <button type="submit" name="submit" class="btn btn-primary _editBtn">Submit</button>
            </div>
            <hr>
            <section>
                <ul>
                    <li class="list-unstyled">
                        <p><strong>About me:</strong></p>
                        <textarea name="bio" id="" cols="30" rows="10" value="{{$data->bio}}">{{$data->bio}}</textarea>
                    </li>
                    <li class="list-unstyled">
                        <input type="number" name="age" value="{{$data->age}}">
                    </li>
                </ul>
            </section>
        @endforeach
    </form>
</div>

@include('partials._footer')