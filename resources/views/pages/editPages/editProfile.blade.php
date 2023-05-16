@include('partials._header')
<div>
    <x-navigation/>
</div>

<div class="mt-5 pt-5  _max-width">
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
            </div>
            <hr>
            <section>
                <ul>
                    <li class="list-unstyled">
                        <p><strong>About me:</strong></p>
                        <textarea name="bio" id="" cols="30" rows="10" value="{{$data->last_name}}" placeholder="{{$data->last_name}}"></textarea>
                    </li>
                    <li class="list-unstyled">
                        <input type="text" name="age" value="{{$data->age}}">
                    </li>
                </ul>
            </section>
        @endforeach
</div>

@include('partials._footer')