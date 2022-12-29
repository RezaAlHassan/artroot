<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Gochi+Hand">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Mono">
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ArtRoot: Register</title>

</head>
<body>
  <p class="px-3" id="logo">ArtRoot</p>
  <div id="form-border-2" class="container-sm col-sm-3 center">
    <form id="form-border" role="form" method="POST" action="{{ route('register.custom') }}">
      @csrf
      <div>
        <p class="header" >Sign up</p>
      </div>
      <!-- Email input -->
      <div class="form-outline mb-4">
        <label class="form-label normal-text" for="name">Name</label>
        <input type="name" name="name" id="name" class="form-control" />
        @if ($errors->has('name'))
        <span class="error-messager">{{ $errors->first('name') }}</span>
        @endif
      </div>
  
     
      <div class="form-outline mb-4">
        <label class="form-label normal-text" for="email">Email address</label>
        <input type="email" name="email" id="email" class="form-control" />
        @if ($errors->has('email'))
        <br>
        <p class="error-message ">{{ $errors->first('email') }}</p>
        @endif
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
        <label class="form-label normal-text" for="form2Example2">Password</label>
        <input type="password" name="password" id="password" class="form-control" />
        @if ($errors->has('password'))
        <br>
        <p class="error-message ">{{ $errors->first('password') }}</p>
        @endif
      </div>

      <div class="list-group list-group-checkable d-grid gap-2 border-0 w-auto">
        <input class="list-group-item-check pe-none" type="radio" name="usertype" id="listGroupCheckableRadios1" value="1" checked>
        <label class="list-group-item rounded-3 py-3 " for="listGroupCheckableRadios1">
          Enthusiast 
          <span class="d-block small opacity-50">Browse Artwork </span>
        </label>
      
        <input class="list-group-item-check pe-none" type="radio" name="usertype" id="listGroupCheckableRadios2" value="2">
        <label class="list-group-item rounded-3 py-3" for="listGroupCheckableRadios2">
          Artist 
          <span class="d-block small opacity-50">Showcase Artwork</span>
        </label>
      
      </div>

      <!-- Submit button -->
      <button type="submit" class="btn btn-dark btn-block mb-4 normal-text">Sign up</button>
      <!-- Register buttons -->
      <div class="member-link text-center ">
        <p class="normal-text">Already a member? <a href="login">Login</a></p>
      </div>
    </form>
  </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>

{{--@extends('app')
@section('content')
<main class="login-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-4">
                <div class="card">
                    <h3 class="card-header text-center">Login</h3>
                    <div class="card-body">
                        <form method="POST" action="{{ route('login.custom') }}">
                            @csrf
                            <div class="form-group mb-3">
                                <input type="text" placeholder="Email" id="email" class="form-control" name="email" required
                                    autofocus>
                                @if ($errors->has('email'))
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <input type="password" placeholder="Password" id="password" class="form-control" name="password" required>
                                @if ($errors->has('password'))
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                                @endif
                            </div>
                            <div class="form-group mb-3">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="remember"> Remember Me
                                    </label>
                                </div>
                            </div>
                            <div class="d-grid mx-auto">
                                <button type="submit" class="btn btn-dark btn-block">Signin</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection --}}