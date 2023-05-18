@include('partials._header')

<body class="my-5">
    <h1 class="text-center mt-5">Log in</h1>
    {{-- {{$email}} --}}
    <div class="container">
        <div class="center-div">
          <x-message/>
          <x-errorHandler/>

          <p>Don't have an account? Register <a href="{{route('register')}}">here!</a></p>
            <form action="{{route('login')}}" method="POST">
              @csrf
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class=>
                  <div class="">
                    <input type="email" name="email" class="form-control" id="inputEmail3">
                  </div>
                </div>
                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                <div class="mb-3">
                  <div class="">
                    <input type="password" name="password" class="form-control" id="inputPassword3">
                  </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Log in</button>
            </form>
    
        </div>
    </div>
    
</body>

@include('partials._footer')