@if($errors->any())
    <div class="alert alert-danger" x-data="{show : true}" x-show="show" x-init="setTimeout(() => show = false, 2000)">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    {{-- @error('fname')
    <p class="alert alert-danger" x-data="{show : true}" x-show="show" x-init="setTimeout(() => show = false, 2000)">first name error</p>
    @enderror --}}
@endif