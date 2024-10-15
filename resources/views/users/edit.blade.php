@extends('themeLayout.app')
@section('main_section')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">


<div class="card">
   @include('messages.alerts')
    <div class="card-body">
      <h5 class="card-title">Edit User : {{ $user->name }} <a class="btn btn-info float-end" href="{{ route('users.index') }}">Go Back</a></h5>


      <form class="row form" method="POST" action="{{ route('users.change_course_round',$user->id) }}">
        @csrf

        <div class="col-12 my-2">
            <label for="course_round_id" class=" col-form-label">select course with round</label>

            <select class="form-control" name="course_round_id" id="course_round_id">
                @foreach ($course_rounds as $item)
                <option {{  $item->id == $user->course_round_id ? 'selected' : '' }} value="{{ $item->id }}">{{$item->round->round_number }} {{ ' ' }}{{  $item->course->name  }} </option>
                @endforeach
            </select>
        </div>


        <div class=" my-3 col-md-5 d-grid m-auto ">
          <button type="submit" class="btn btn-warning ">Update</button>

        </div>
      </form>

    </div>
  </div>
</div>
</div>
</div>
@endsection
