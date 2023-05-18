
    @if($message = session('message'))
        <div class="alert alert-danger" x-data="{show : true}" x-show="show" x-init="setTimeout(() => show = false, 2000)">
            {{ $message }}
        </div>
    @endif
