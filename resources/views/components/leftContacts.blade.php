<div class="mb-3">
    <form class="d-flex mt-3 _search d-flex flex-column" role="search">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-success" type="submit">Search</button>
    </form>
</div>
<a class="text-decoration-none mainUserLink" href="{{'/'}}">
    <div class="d-flex align-items-center py-2 border-bottom ">
        <img src="{{ asset('storage/profile-pics/pp1.jpg') }}" class="users-status border rounded-circle">
        <span class="active-circle border rounded-circle"></span>
        <p class="ms-2 text-body"><strong>All</strong></p>
    </div>
</a>
@foreach ($users as $user)
    <a class="text-decoration-none contactUser" href="{{route('single-chat', ['id'=> $user->p_id])}}">
        <div class="d-flex align-items-center py-2 border-bottom ">
            <img src="{{ asset('storage/profile-pics/' . $user->image_path) }}" class="users-status border rounded-circle">
            <span class="active-circle border rounded-circle"></span>
            <p class="ms-2 name-font">{{$user->first_name}} {{$user->last_name}}</p>
        </div>
    </a>
@endforeach