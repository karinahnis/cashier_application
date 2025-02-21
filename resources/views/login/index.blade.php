@extends('layouts.app')

@section('container')
<div class="row justify-content-center">
  <div class="col-md-5">

    @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    @if(session()->has('loginError'))
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        {{ session('loginError') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    @endif

    <main class="form-signin mg-3">
      <h1 class="h3 mb-3 fw-normal text-center">Please Log in</h1>
      <form action="/login" method="post">
        @csrf
        <div class="form-floating ">
          <input type="username" name="username" class="form-control @error('username') is-invalid
          @enderror" placeholder="Username" autofocus required value="{{ old('username') }}">
          <label for="Username">username</label>
          @error('username')
          <div class="invalid-feedback">
            {{ $message }}
          </div>
          @enderror
        </div>

        <div class="form-floating mt-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>
          <label for="Password">Password</label>
        </div>

        <button class="btn btn-primary w-100 py-2" type="submit">Log in </button>
      </form>
      
      <small class="d-block text-center mt-3">Not Registered? <a href="/register">Register Now</a>
      </small>
    </main>

  </div>
</div>

@endsection