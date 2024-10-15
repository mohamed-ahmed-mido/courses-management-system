@extends('themeLayout.app')
@section('main_section')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">


<div class="card">
    @include('messages.alerts')
    <div class="card-body">
      <h5 class="card-title">Edit project: {{ $project->name }}  <a class="btn btn-info float-end" href="{{ route('projects.show',$project->id) }}">Go Back</a></h5>


      <form class="row form" enctype="multipart/form-data" method="POST" action="{{ route('projects.update',$project->id) }}">
        @csrf
        <div class="col-12 my-2">
          <label for="inputNanme4" class="form-label"> Name</label>
          <input type="text" value="{{ $project->name }}" name="name" class="form-control" id="inputNanme4">
        </div>

        <div class="col-12 my-2">
          <label for="demo_link" class="form-label">Demo link</label>
          <input type="url" value="{{ $project->demo_link }}" name="demo_link" class="form-control" id="demo_link">
        </div>
        <div class="col-12 my-2">
          <label for="attachment" class="form-label">attachment</label>
          <input type="file" name="attachment" class="form-control" id="attachment">
        </div>


        <div class=" my-3 col-md-8 d-grid m-auto ">
          <button type="submit" class="btn btn-warning ">Update</button>

        </div>
      </form>

    </div>
  </div>
</div>
</div>
</div>
@endsection
