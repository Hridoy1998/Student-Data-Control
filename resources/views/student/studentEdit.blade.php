@extends('Layout.app')
@section('Content')
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
            <h2 class="fw-bold mb-5">Student Info Update</h2>
            <form action="{{route('student.edit',['id'=>$student->id])}}" method="POST">
                @if(Session::has('success'))
                    <div class="alert alert-success">{{Session::get('success')}}</div>
                @endif
                @if(Session::has('fail'))
                    <div class="alert alert-danger">{{Session::get('fail')}}</div>
                @endif
                {{@csrf_field()}}
                <div class="form-outline mb-4">
                    <input type="text" class="form-control" name="StudentName" id="" placeholder="Enter your full name" value="{{$student->StudentName}}">
                    <label class="form-label" for="form3Example3">Full Name</label><br>
                    @error('StudentName')
                    <span class="alert alert-danger">{{$message}}</span>
                    @enderror
                  </div>
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="radio" name="gender" id="male" value="Male"@if($student->gender=="Male") checked @endif >
                    <label class="form-label" for="form3Example1">Male</label>
                    <input type="radio" name="gender" id="male" value="Female"@if($student->gender=="Female") checked @endif>
                    <label class="form-label" for="form3Example1">Female</label>
                    <input type="radio" name="gender" id="male" value="Other"@if($student->gender=="Other") checked @endif>
                    <label class="form-label" for="form3Example1">Other</label>
                  </div>
                  <label class="form-label" for="form3Example1">Gender</label><br>
                    @error('gender')
                    <span class="alert alert-danger">{{$message}}</span>
                    @enderror
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="date" class="form-control" name="dob" id=""value="{{$student->dob}}">
                    <label class="form-label" for="form3Example2">Enter Date of Birth</label><br>
                    @error('dob')
                    <span class="alert alert-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
              </div>
              <!-- 2 column grid layout with text inputs for the first and last names -->
              <div class="row">
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <input type="text"class="form-control" name="StudentId" id="" placeholder="Enter Student ID"value="{{$student->StudentId}}">
                    <label class="form-label" for="form3Example1">Student ID</label><br>
                    @error('StudentId')
                    <span class="alert alert-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
                <div class="col-md-6 mb-4">
                  <div class="form-outline">
                    <select name="StudentDeperment" id=""class="form-control" value="Deperment">
                        <option value="">Select Deperment</option>
                        <option value="CSE"@if($student->StudentDeperment=="CSE") selected @endif>CSE</option>
                        <option value="EEE"@if($student->StudentDeperment=="EEE") selected @endif>EEE</option>
                        <option value="BBA"@if($student->StudentDeperment=="BBA") selected @endif>BBA</option>
                    </select>
                    <label class="form-label" for="form3Example2">Student Deperment</label><br>
                    @error('StudentDeperment')
                    <span class="alert alert-danger">{{$message}}</span>
                    @enderror
                  </div>
                </div>
              </div>

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email"class="form-control" name="StudentEmail" id="" placeholder="Enter student email"value="{{$student->StudentEmail}}">
                <label class="form-label" for="form3Example3">Email address</label><br>
                @error('StudentEmail')
                    <span class="alert alert-danger">{{$message}}</span>
                    @enderror
              </div>

              <!-- Submit button -->
              <input type="submit" class="btn btn-primary btn-block mb-4" value="UPDATE">
            </form>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- Section: Design Block -->
@endsection
