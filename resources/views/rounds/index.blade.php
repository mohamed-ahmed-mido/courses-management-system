@extends('themeLayout.app')

@section('main_section')

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">List Courses @if(Auth::user()->type=='admin')<a class="btn btn-info float-end" href="{{ route('rounds.create') }}">create new</a>@endif</h5>


            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                    <th>#</th>
                  <th>round number</th>

                </tr>
              </thead>
              <tbody>
             @foreach ($rounds as $round)
                 <tr>
                    <td>{{ $loop->iteration }} </td>
                    <td>{{ $round->round_number }} </td>


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


