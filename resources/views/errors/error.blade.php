@extends('themeLayout.app')
<div class="container">
@section('main_section')
    <section class="section error-404 min-vh-100 d-flex flex-column align-items-center justify-content-center">
      <h1>404</h1>
      <h2>You Are Not Authorized.</h2>
      <a class="btn" href="{{ route('home') }}">Back to home</a>
      <img src="assets/img/not-found.svg" class="img-fluid py-5" alt="Page Not Found">
      <div class="credits">

      </div>
    </section>
@endsection
  </div>
