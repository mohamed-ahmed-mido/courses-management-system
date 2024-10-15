@extends('themeLayout.app')

@section('main_section')

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
            @include('messages.alerts')
          <div class="card-body">
            @if (Auth::user()->type != 'student')

            <h5 class="card-title">List of your Projects <a class="btn btn-info float-end" href="{{ route('projects.create') }}">create new</a></h5>
            @endif


            <!-- Table with stripped rows -->
            <table class="table datatable table-striped">
              <thead>
                <tr>
                    <th>#</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>





            @forelse ($projects as $project)
                 <tr>
                    <td>{{ $loop->iteration }} </td>
                    <td>{{ $project->name }} </td>
                    <td>{{ $project->description }} </td>

                    <td><a class="btn btn-primary" href="{{ route('projects.show',$project->id) }}"><i class="bi bi-eye-fill"></i> show Project</a></td>
                 </tr>
                 @empty

                 @endforelse
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

@endsection


