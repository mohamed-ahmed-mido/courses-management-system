@extends('themeLayout.app')
@section('main_section')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">


<div class="card">
   @include('messages.alerts')
    <div class="card-body">
      <h5 class="card-title">Add Course  <a class="btn btn-info float-end" href="{{ route('projects.index') }}"><i class="bi bi-arrow-left-circle-fill"></i> Go Back</a></h5>

      <form class="row form" enctype="multipart/form-data" method="POST" action="{{ route('projects.store') }}">
        @csrf
        <div class="col-12 my-2">
          <label for="inputNanme4" class="form-label">project Name</label>
          <input type="text" name="name" class="form-control" id="inputNanme4">
        </div>
        <div class="col-12 my-2">
          <label for="description" class="form-label">description</label>
          <input type="text" name="description" class="form-control" id="description">
        </div>
        <div class="col-12 my-2">
          <label for="demo_link" class="form-label">Demo link</label>
          <input type="url" name="demo_link" class="form-control" id="demo_link">
        </div>
        <div class="col-12 my-2">
          <label for="attachment" class="form-label">attachment</label>
          <input type="file" name="attachment" class="form-control" id="attachment">
        </div>
        <div class="col-12 my-2">
          <label for="course_round_id" class="form-label">course & round</label>
          <select class="form-control" name="course_round_id" id="course_round_id">
            @foreach ($course_rounds as $item)
                <option value="{{ $item->id }}">{{ $item->course->name }} {{ ":" }} {{ $item->round->round_number }}</option>
            @endforeach
          </select>
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
