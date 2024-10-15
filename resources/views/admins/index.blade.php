@extends('themeLayout.app')

@section('main_section')

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
            @include('messages.alerts')
          <div class="card-body">
            <h5 class="card-title">List admins <a class="btn btn-info float-end" href="{{ route('admins.create') }}"><i class="bi bi-person-plus fw-bolder"></i> create new</a></h5>


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
             @foreach ($admins as $admin)
                 <tr>
                    <td>{{ $loop->iteration}} </td>
                    <td>{{ $admin->user->name }} </td>
                    <td>{{ $admin->user->email }} </td>
                    <td>{{ $admin->parent }} </td>
                    <td><a class="btn btn-danger" href="{{ route('admins.destroy', $admin->id) }}">Delete</a> </td>
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


