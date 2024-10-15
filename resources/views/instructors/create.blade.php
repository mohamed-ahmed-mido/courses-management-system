@extends('themeLayout.app')
@section('main_section')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">


<div class="card">

    @include('messages.alerts')
    <div class="card-body">
      <h5 class="card-title">Add Instructor  <a class="btn btn-info float-end" href="{{ route('instructors.index') }}">Go Back</a></h5>


      <form class="row form" method="POST" action="{{ route('instructors.store') }}">
        @csrf
        <div class="col-12 my-2">
          <label for="inputNanme4" class="form-label">Name</label>
          <input type="text" name="name" class="form-control" id="inputNanme4">
        </div>
        <div class="col-12 my-2">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" name="email" class="form-control" id="inputEmail4">
          </div>
          <div class="col-12 my-2">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" name="password" class="form-control" id="inputPassword4">
          </div>

          <div class="col-12 my-2">
            <label for="inputPassword4" class="form-label">Confirm Password</label>
            <input type="password" name="password_confirmation" class="form-control" id="inputPassword4">
          </div>




        <div class=" my-3 col-md-8 d-grid m-auto ">
          <button type="submit" class="btn btn-primary ">Submit</button>

        </div>
      </form>

    </div>
  </div>
</div>
</div>
</div>
@endsection
