@extends('themeLayout.app')

@section('main_section')


  <section class="section">
    <div class="row">
      <div class="col-lg-12">

          <div class="card">
            @include('messages.alerts')
          <div class="card-body">
              <h5 class="card-title">show Project: {{ $project->name }} <a class="btn btn-info float-end" href="{{ route('projects.index') }}">Go Back</a></h5>
            @if (Auth::user()->type == 'student')

            <h5 class="card-title mb-2"><a class="btn btn-primary float-end btn-lg " href="{{ route('replies.create',$project->id) }}">Reply</a></h5>
            @endif



            <h5> Name: {{ $project->name  }}</h5><hr>
            <h5> description: {{ $project->description  }}</h5><hr>
            <h5> Course & Round: {{ $course_round->course->name  }} {{': '. $course_round->round->round_number  }}</h5><hr>
            <h5>Demo Link:   <a href="{{ $project->demo_link  }}">{{ $project->demo_link  }}</a> </h5><hr>
             <h5>Attachment: <a class="btn btn-success" href="{{ route('projects.download',$project->id) }}">Download </a></h5>

             <div class="row mb-1 mt-3 justify-content-center">
                <div class="col-md-3 d-grid">
                    <a class="btn btn-warning" href="{{ route('projects.edit',$project->id) }}">Edit</a>
                </div>
                <div class="col-md-3 d-grid"><a  class="btn btn-danger" href="{{ route('projects.destroy',$project->id) }}">Delete</a></div>
              </div>
            <!-- Table with stripped rows -->


          </div>
        </div>

      </div>
    </div>


  </section>

  <section>
    <div class="container">

        <h2 class=" my-4 text-primary">Project Replies:</h2>
        <div class="row justify-content-center">
        @foreach ($replies as $reply)
        <div class="col-md-6">
            <div class="card text-center">

                <div class="card-body border border-3 border-secondary rounded-2">
                    <h3 class="text-center my-3">{{ $reply->user->email }}</h3>
                   <hr> <h5> # : {{ $loop->iteration  }}</h5>
                   <hr> <h5>Title:  {{ $reply->name }}</h5>
                   <hr> <h5> Demo Link: <a href="{{ $reply->demo_link }}">{{ $reply->demo_link }}</a></h5>
                  <hr>  <h5>Attachment: <a class="btn btn-success" href="{{ route('replies.download',$reply->id) }}">Download </a></h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    </div>
  </section>

@endsection


