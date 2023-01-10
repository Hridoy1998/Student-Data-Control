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
            <h2 class="fw-bold mb-5">Student List</h2>
            <table class="table">
                <thead class="thead-dark">
                  <tr>
                    <th scope="col">Student Name</th>
                    <th scope="col">Deperment</th>
                    <th scope="col">Student ID</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($student as $student )
                  <tr>
                    <th scope="row">{{$student->StudentName}}</th>
                    <td>{{$student->StudentDeperment}}</td>
                    <td>{{$student->StudentId}}</td>
                    <td><a href="{{route('view',['id'=>$student->id])}}" class="btn btn-primary btn-block mb-4">VIEW</a></td>
                    <td><a href="{{route('edit',['id'=>$student->id])}}" class="btn btn-primary btn-block mb-4">EDIT</a></td>
                    <td><a href="{{route('delete',['id'=>$student->id])}}" class="btn btn-primary btn-block mb-4">DELETE</a></td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
          </div>
        </div>
      </div>
    </div>
  </section>
 <!-- Section: Design Block -->
@endsection
