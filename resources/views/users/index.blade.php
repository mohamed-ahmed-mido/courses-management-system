@extends('themeLayout.app')

@section('main_section')


  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
            @include('messages.alerts')
          <div class="card-body">
            <h5 class="card-title">List Students @if(Auth::user()->type=='admin')<a class="btn btn-info float-end" href="{{ route('users.create') }}"><i class="bi bi-person-plus fw-bolder text-light"></i> create new</a>@endif</h5>


            <!-- Table with stripped rows -->
            <table class="table datatable table-striped">
              <thead>
                <tr>
                    <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>type</th>
                  @if (Auth::user()->type=='admin')
                  <th  colspan="2">Action</th>
                  @endif
                </tr>
              </thead>
              <tbody>
             @foreach ($users as $user)
                 <tr>
                    <td>{{ $loop->iteration }} </td>
                    <td>{{ $user->name }} </td>
                    <td>{{ $user->email }} </td>
                    <td>{{ $user->type}}</td>
                    @if (Auth::user()->type=='admin')

                    <td><a class="btn btn-warning" href="{{ route('users.edit', $user->id) }}">Edit</a> </td>
                    <td><a class="btn btn-danger" href="{{ route('users.destroy', $user->id) }}">Delete</a> </td>
                    @endif
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


