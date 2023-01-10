<!DOCTYPE html>
<html lang="en">
<head>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
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
            <h2 class="fw-bold mb-5">LOG IN</h2>
            <form action="{{route('login.submit')}}" method="POST">
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
                            <input type="email"class="form-control" name="email" id="" placeholder="Enter email"value="{{old('email')}}">
                            <label class="form-label" for="form3Example1">Email</label><br>
                            @error('email')
                                <span>{{$message}}</span>
                            @enderror
                          </div>
                        </div>
                        <div class="col-md-6 mb-4">
                          <div class="form-outline">
                            <input type="password"class="form-control" name="password" id="" placeholder="Enter password"value="{{old('password')}}">
                            <label class="form-label" for="form3Example1">Password</label><br>
                            @error('password')
                            <span>{{$message}}</span>
                            @enderror
                          </div>
                        </div>
                        </div>
                        <div>
                        <div>
                          <div>
                            <input type="submit" class="btn btn-primary btn-block mb-4" value="Login">
                          </div>
                          <div>
                            <a href="{{ route('registration') }}"class="btn btn-primary btn-block mb-4">Registration</a>
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
