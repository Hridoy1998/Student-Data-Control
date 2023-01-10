<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration</title>
</head>
<body>
    <!-- Section: Design Block -->
<section class="text-center">
    <!-- Background image -->
    <div class="p-5 bg-image" style="
          background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
          height: 300px;
          "></div>
    <!-- Background image -->

    <div class="card mx-4 mx-md-5 shadow-5-strong" style="
          margin-top: -100px;
          background: hsla(0, 0%, 100%, 0.8);
          backdrop-filter: blur(30px);
          ">
      <div class="card-body py-5 px-md-5">

        <div class="row d-flex justify-content-center">
          <div class="col-lg-8">
            <h2 class="fw-bold mb-5">Registration</h2>
            <form action="{{route('registration.submit')}}" method="POST" enctype="multipart/form-data">
                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                {{@csrf_field()}}
                <div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                          <div class="form-outline">
                            <input type="text"class="form-control" name="AdminName" id="" placeholder="Enter full name"value="{{old('AdminName')}}">
                            <label class="form-label" for="form3Example1">Name</label><br>
                            @error('AdminName')
                                <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-6 mb-4">
                          <div class="form-outline">
                            <input type="password"class="form-control" name="Password" id="" placeholder="Enter password"value="{{old('Password')}}">
                            <label class="form-label" for="form3Example1">Password</label><br>
                            @error('Password')
                            <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                          </div>
                        </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-4">
                              <div class="form-outline">
                                <input type="radio" name="gender" id="male" value="Male"@if(Request::old('gender')=="Male") checked @endif >
                                <label class="form-label" for="form3Example1">Male</label>
                                <input type="radio" name="gender" id="male" value="Female"@if(Request::old('gender')=="Female") checked @endif>
                                <label class="form-label" for="form3Example1">Female</label>
                                <input type="radio" name="gender" id="male" value="Other"@if(Request::old('gender')=="Other") checked @endif>
                                <label class="form-label" for="form3Example1">Other</label>
                              </div>
                              <label class="form-label" for="form3Example1">Gender</label><br>
                                @error('gender')
                                    <span class="alert alert-danger">{{$message}}</span>
                                @enderror
                            </div>
                            <div class="col-md-6 mb-4">
                              <div class="form-outline">
                                <input type="date" class="form-control" name="dob" id=""value="{{old('dob')}}">
                                <label class="form-label" for="form3Example2">Enter Date of Birth</label><br>
                                @error('dob')
                                    <span class="alert alert-danger">{{$message}}</span>
                                @enderror
                              </div>
                            </div>
                          </div>
                    <div class="row">
                        <div class="col-md-6 mb-4">
                          <div class="form-outline">
                            <input type="email"class="form-control" name="AdminEmail" id="" placeholder="Enter email"value="{{old('AdminEmail')}}">
                            <label class="form-label" for="form3Example1">Email</label><br>
                            @error('AdminEmail')
                                <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-6 mb-4">
                          <div class="form-outline">
                            <input type="text"class="form-control" name="UserName" id="" placeholder="Enter Username"value="{{old('UserName')}}">
                            <label class="form-label" for="form3Example1">Username</label><br>
                            @error('UserName')
                            <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                          </div>
                        </div>
                        </div>
                        <div class="form-outline mb-4">
                            <input type="file" name="pp" class="form-control" id="" accept="image/*" value="{{old('pp')}}">
                            <label class="form-label" for="form3Example3">Upload Profile Pic</label><br>
                            @error('pp')
                                <span class="alert alert-danger">{{$message}}</span>
                            @enderror
                          </div>
                        <div>
                        <div>
                          <div>
                            <input type="submit" class="btn btn-primary btn-block mb-4" value="Login">
                          </div>
                        </div>
                    </div>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->
</body>
</html>
