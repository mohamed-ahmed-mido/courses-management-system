@extends('themeLayout.app')

@section('main_section')

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
            @include('messages.alerts')
          <div class="card-body">
            <h5 class="card-title">List Courses & Rounds @if(Auth::user()->type=='admin')<a class="btn btn-info float-end" href="{{ route('courserounds.create') }}">create new</a>@endif</h5>


            <!-- Table with stripped rows -->
            <table class="table datatable table-striped">
              <thead>
                <tr>
                    <th>#</th>
                  <th>Course Name</th>
                  <th>Round Name</th>
                  <th>Instructor Name</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
             @foreach ($course_rounds as $course_round)
                 <tr>
                    <td>{{ $loop->iteration}} </td>
                    <td>{{ $course_round->course->name }} </td>
                    <td>{{ $course_round->round->round_number }} </td>
                    @foreach ($instructors as $instructor)
                    @if ($course_round->instructor->id==$instructor->id)
                    <td>{{ $instructor->user->name }} </td>
                    @endif
                    @endforeach
                    <th><a class="btn btn-primary" href="{{ route('courserounds.viewstudents',$course_round->id) }}"><i class="bi bi-eye-fill"></i> view students</a></th>


                 </tr>
             @endforeach
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

@endsection


