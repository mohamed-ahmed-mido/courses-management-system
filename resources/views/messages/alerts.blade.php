@if ($errors->any())
<div class="alert alert-danger alert-dismissible fade show">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
   <ul>
   @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
   @endforeach
</ul>
</div>
@endif

@if (Session::has('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    {{ Session::get('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif

@if (Session::has('sorry'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ Session::get('sorry') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
