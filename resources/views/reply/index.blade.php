@extends('themeLayout.app')

@section('main_section')

  <section class="section">


    <div class="row justify-content-center">
        <h2 class="mb-4 text-black">All Your Replies:</h2>
        @include('messages.alerts')
        @forelse($replies as $reply)
        <div class="col-md-6">
            <div class="card text-center">
                <div class="card-body border border-3 border-secondary rounded-2">
                    <h4 class="text-center my-3">On project: {{ $reply->project->name }} <a class="btn btn-info float-end" href="{{ route('projects.show',$reply->project->id) }}">view project</a></h4>
                   <hr> <h5> # : {{ $loop->iteration  }}</h5>
                   <hr> <h5>Title:  {{ $reply->name }}</h5>
                   <hr> <h5> Demo Link: <a href="{{ $reply->demo_link }}">{{ $reply->demo_link }}</a></h5>
                  <hr>  <h5>Attachment: <a class="btn btn-success" href="{{ route('replies.download',$reply->id) }}">Download </a></h5>
                  <div class="row mb-1 mt-3">
                    <div class="col-md-6 d-grid">
                        <a class="btn btn-warning" href="{{ route('replies.edit',$reply->id) }}">Edit</a>
                    </div>
                    <div class="col-md-6 d-grid"><a  class="btn btn-danger" href="{{ route('replies.destroy',$reply->id) }}">Delete</a></div>
                  </div>
                </div>
            </div>
        </div>
        @empty
        <h3 class="text-danger text-center">you dont have replies</h3>
        @endforelse
    </div>


  </section>

@endsection


