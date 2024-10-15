@extends('themeLayout.app')

@section('main_section')

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
            @include('messages.alerts')
          <div class="card-body">
            <h5 class="card-title">List Students : {{  $course_rounds->course->name  }} {{ ' :' }} {{$course_rounds->round->round_number }} <a class="btn btn-primary float-end" href="{{ route('courserounds.addstudents',$course_rounds->id) }}">create new</a></h5>


            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                    <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th colspan="2">change course&round</th>
                </tr>
              </thead>
              <tbody>
             @foreach ($course_rounds->user as $student)
                 <tr>
                    <td>{{ $loop->iteration }} </td>
                    <td>{{ $student->name }} </td>
                    <td>{{ $student->email }} </td>
                    <td><td><a class="btn btn-warning" href="{{ route('users.edit', $student->id) }}">Edit</a> </td></td>
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


