@include('partials._header')

<body class="my-5">
    <h1 class="text-center mt-5">Register</h1>

    <div class="container">
        <div class="center-div">
          <p>Already have an account? Log in <a href="{{route('login')}}">here!</a></p>
            <form method="POST" action="{{route('register')}}" enctype="multipart/form-data">
              @csrf
                <label for="inputEmail3" class="col-sm-2 col-form-label">First Name</label>
                <div class=>
                  <div class="">
                    <input type="text" name="fname" class="form-control" value="{{old('fname')}}" id="inputEmail3">
                  </div>
                </div>
                <label for="inputEmail3" class="col-sm-2 col-form-label">Last Name</label>
                <div class=>
                  <div class="">
                    <input type="text" name="lname" value="{{old('lname')}}" class="form-control" id="inputEmail3">
                  </div>
                </div>
                <label for="inputEmail3" class="col-sm-2 col-form-label">Age</label>
                <div class=>
                  <div class="">
                    <input type="number" name="age" value="{{old('age')}}" class="form-control" id="inputEmail3">
                  </div>
                </div>
                <label for="inputEmail3" class="col-sm-2 col-form-label">Profile Picture</label>
                <div class=>
                  <div class="">
                    <input type="file" name="image"  class="form-control" id="inputEmail3">
                  </div>
                </div>
                <label for="inputEmail3" class="col-sm-2 col-form-label">Bio</label>
                <div class=>
                    <div class="">
                      <textarea name="bio" value="{{old('bio')}}" id="" cols="100" rows="10">Placeholder</textarea>
                    </div>
                  </div>
                  <label for="inputEmail3" class="col-sm-2 col-form-label">Username</label>
                <div class=>
                  <div class="">
                    <input type="text" name="username" value="{{old('username')}}" class="form-control" id="inputEmail3">
                  </div>
                </div>
                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                <div class=>
                  <div class="">
                    <input type="email" name="email" value="{{old('email')}}" class="form-control" id="inputEmail3">
                  </div>
                </div>
                <label for="inputPassword3" class="col-sm-2 col-form-label">Password</label>
                <div class="mb-3">
                  <div class="">
                    <input type="password" name="password" class="form-control" id="inputPassword3">
                  </div>
                </div>
                
                <button type="submit" class="btn btn-primary">Register</button>
            </form>
    
        </div>
    </div>
    
</body>

@include('partials._footer')