@extends('layouts.app')
  
@section('container')

<div class="row justify-content-center">
  <div class="col-md-5">
    <main class="form-registration">
      <h1 class="h3 mb-3 fw-normal text-center">Registration</h1>
      <form action="/register" method="post">
  
        @csrf
        <div class="form-floating">
          <input type="text" name="name" class="form-control rounded-top @error('name') is-invalid
          @enderror" id="name" placeholder="Name" required value="{{ old('name') }}"> 
          <label for="name">Name</label>
          @error('name')
            <div class="invalid-feedback">
               {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-floating">
          <input type="text" name="username" class="form-control mt-2 @error('username') is-invalid
          @enderror" id="username" placeholder="Username" required value="{{ old('username') }}">
          <label for="username">Username</label>
          @error('username')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-floating">
          <input type="password" name="password" class="form-control rounded-bottom mt-2 @error('password') is-invalid
          @enderror" id="password" placeholder="Password" required>
          <label for="Password">Password</label>
          @error('password')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <div class="form-floating">
          <input type="password-conf" name="password-conf" class="form-control rounded-bottom mt-2 @error('password-conf')
          @enderror" id="password-conf" placeholder="Password Confirmation" required>
          <label for="Password Confirmation">Password Confirmation</label>
          @error('password-conf')
            <div class="invalid-feedback">
              {{ $message }}
            </div>
          @enderror
        </div>

        <button class="btn btn-primary w-100 py-2 mt-4" type="submit">Register</button>
      </form>
      
      <small class="d-block text-center mt-3">Already Registered <a href="/login">Login</a></small>
    </main>

  </div>
</div>
@endsection



