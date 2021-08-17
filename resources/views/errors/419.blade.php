@extends('inspinia::layouts.auth')

@section('content')
<div class="middle-box text-center animated fadeInDown">
  <h1>419</h1>
  <h3 class="font-bold">Oops! {{ class_basename($exception->getPrevious() ? : $exception) }}</h3>

  <div class="error-desc">
    <form class="form-inline m-t" role="form">
      <div class="form-group">
        <input type="text" class="form-control" placeholder="Search">
      </div>
      <button type="submit" class="btn btn-primary">Search</button>
    </form>
  </div>
</div>
@endsection
