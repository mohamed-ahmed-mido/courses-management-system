@extends('themeLayout.app')

@section('main_section')

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
            @include('messages.alerts')
          <div class="card-body">
            <h5 class="card-title">List instructors <a class="btn btn-info float-end" href="{{ route('instructors.create') }}"><i class="bi bi-person-plus fw-bolder"></i> create new</a></h5>


            <!-- Table with stripped rows -->
            <table class="table datatable table-striped">
              <thead>
                <tr>
                    <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Created By</th>
                </tr>
              </thead>
              <tbody>
             @foreach ($instructors as $instructor)
                 <tr>
                    <td>{{ $loop->iteration}} </td>
                    <td>{{ $instructor->user->name }} </td>
                    <td>{{ $instructor->user->email }} </td>
                    <td>{{ $instructor->parent }} </td>
                    <td><a class="btn btn-danger" href="{{ route('instructors.destroy', $instructor->id) }}">Delete</a> </td>
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


