@extends('themeLayout.app')
@section('main_section')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">


<div class="card">
    @include('messages.alerts')
    <div class="card-body">
      <h5 class="card-title">Add Course Round <a class="btn btn-info float-end" href="{{ route('courserounds.index') }}">Go Back</a></h5>


      <form class="row form" method="POST" action="{{ route('courserounds.store') }}">
        @csrf
        <div class="col-12 my-2">
          <label for="inputNanme4" class="form-label">select course</label>
        <select class="form-control" name="course_id" id="">
            @foreach ($courses as $course)
            <option value="{{ $course->id }}">{{ $course->name }}</option>
            @endforeach
        </select>
        <div class="col-12 my-2">
          <label for="inputNanme4" class="form-label">select round</label>
        <select class="form-control" name="round_id" id="">
            @foreach ($rounds as $round)
            <option  value="{{ $round->id }}">{{ $round->round_number }}</option>
            @endforeach
        </select>
        </div>
        <div class="col-12 my-2">
          <label for="instructor_id" class="form-label">select instructor</label>
        <select class="form-control" name="instructor_id" id="instructor_id">
            @foreach ($instructors as $instructor)
            <option value="{{ $instructor->id }}">{{ $instructor->user->name }}</option>
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
