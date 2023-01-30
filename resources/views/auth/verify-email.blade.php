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
  <title>ArtRoot : Verify Email</title>

</head>
<body>
  <p class="px-3" id="logo">ArtRoot</p>
  <div id="form-border-2" class="container-sm col-sm-2 center">
      <div>
        <p class="header" >Verify Email</p>
      </div>
      <!-- Email input -->
      <div class="form-outline mb-4 normal-text">
        <p>Check your email inbox. If the link is not found in your inbox, check your spam/junk folder.</p>
        @if (session('resent'))
        <div class="success-message" role="alert">
            A fresh verification link has been sent to your email address.
        </div>
    @endif
      </div>
     
      <div class="member-link ">
        <p id="login-link" class="normal-text"> <a href="login">Login</a></p>
        <form id="reset-link-form " action="{{ route('verification.resend') }}" method="POST" >
          @csrf
        <button id="sub-text" type="submit" >Resend Link</button>
        </form>
      </div>
  </div>
</body>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>