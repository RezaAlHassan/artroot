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
  <title>ArtRoot-login</title>

</head>
<body>
  <p class="px-3" id="logo">ArtRoot</p>

  <div id="form-border-2" class="container-sm col-sm-3 center">
    <form id="form-border" role="form" method="POST" action="{{ route('login.custom') }}">
      @csrf
      <div>
        <p class="header" >Log In</p>
        @if(session('success'))
        <p class="error-message">{{session('success')}}</p>
        @endif
      </div>
      <!-- Email input -->
     
      <div class="form-outline mb-4">
        <label class="form-label normal-text" for="email">Email address</label>
        <input type="email" name="email" id="email" class="form-control" />
      </div>

      <!-- Password input -->
      <div class="form-outline mb-4">
        <label class="form-label normal-text" for="form2Example2">Password</label>
        <input type="password" name="password" id="password" class="form-control" />
      </div>

      <!-- Submit button -->
      <button type="submit" class="btn btn-dark btn-block mb-4 normal-text">Sign in</button>
      <!-- Register buttons -->
      <div class="member-link text-center ">
        <p class="normal-text">Not a member? <a href="/register">Sign up</a></p>
      </div>
    </form>
  </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>
