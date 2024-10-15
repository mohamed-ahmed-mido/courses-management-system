@extends('themeLayout.app')
@section('main_section')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">


<div class="card">
    @if ($errors->any())
    <div class="alert alert-danger">
       <ul>
       @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
       @endforeach
    </ul>
    </div>

    @endif

    @if (Session::has('success'))
    <div class="alert alert-success">
        {{ Session::get('success') }}
    </div>

    @endif
    <div class="card-body">
      <h5 class="card-title">Add Course  <a class="btn btn-info float-end" href="{{ route('rounds.index') }}">Go Back</a></h5>


      <form class="row form" method="POST" action="{{ route('rounds.store') }}">
        @csrf
        <div class="col-12 my-2">
          <label for="round_number" class="form-label">round number</label>
          <input type="text" name="round_number" class="form-control" id="round_number">
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
