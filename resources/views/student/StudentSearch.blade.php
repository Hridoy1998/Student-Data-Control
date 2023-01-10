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
                <input type="text" class="form-outline mb-4 form-control" name="search" id="search" placeholder="search here with Name or ID">
                <div class="search_result">

                </div>
          </div>
        </div>
      </div>
    </div>
  </section>
 <!-- Section: Design Block -->
<script>
    $.ajaxSetup({header: { 'csrftoken': '{{ csrf_token() }}'}});
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        $('#search').on('keyup',function(){
            var value = $(this).val();
            $.ajax({
                tyoe:"GET",
                url:"/student/search",
                data:{'search':value},
                success:function(data){
                    console.log(data);
                    $('.search_result').html(data);
                }
            });
        });
    });
</script>
@endsection
