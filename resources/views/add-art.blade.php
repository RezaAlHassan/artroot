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
  <title>ArtRoot : Add Art</title>

</head>

<body>
  @if(session('status'))
  <p id="header-message" class="success-message center text-center">{{session('status')}}</p>
  @endif
  <nav class="navbar navbar-expand-lg ">
        <div class="container-fluid">
          <a class="navbar-brand " id="logo" href="#">ArtRoot</a>  
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  navbar-center mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link mx-2" aria-current="page" href="#">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-4" href="#">Browse</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Profile
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="/profile">My Gallery</a></li>
                  <li><a class="dropdown-item" href="#">Account</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a class="dropdown-item" href="#">Sign Out</a></li>
                </ul>
              </li>
            </ul>
            <div id="search">
            <form  class="d-flex" role="search">
              <input class="form-control me-2" type="search" aria-label="Search">
              <button class="btn btn-outline-dark" type="submit">Search</button>
            </form>
           </div>
          </div>
        </div>
      </nav>
      <section class="py-5 text-center container">
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
            <div class="d-flex flex-column">
              <div class="p-2"><h1 class="header">Add Artwork</h1></div>
              <div class="p-2"><p class="normal-text text-muted subtext">Make sure to fill in all details!</p></div>
              

              
            </div>
          </div>
        </div>
        <div class="container col-sm-3 center">
          <form  role="form" method="POST" action="{{ route('art.add') }}" enctype="multipart/form-data">
            @csrf
            <!-- Email input -->
           
            <div class="form-outline mb-4">
              <label class="form-label normal-text" for="art_name">Art Name</label>
              <input type="name" name="art_name" id="art_name" class="form-control" />
              @if ($errors->has('art_name'))
              <span class="error-messager">{{ $errors->first('art_name') }}</span>
              @endif
            </div>
      
            <!-- Password input -->
            <div class="form-outline mb-4">
              <label class="form-label normal-text">Category</label>
              <select class="form-select form-control normal-text" aria-label="Default select example" name="art_category">
                  <option class="normal-text" selected>All Categories</option>
                  <option class="normal-text" value="digital">Digital</option>
                  <option class="normal-text" value="hand_drawn">Hand Drawn</option>
                  <option class="normal-text" value="product">Product</option>
                  <option class="normal-text" value="hybrid">Hybrid</option>
                </select>
              </div>
            
            <div class="form-outline mb-4">
            <label for="formFileLg" class="form-label normal-text">Upload Image</label>
            <input name="art" class="form-control normal-text" id="formFileLg" type="file">
            @if ($errors->has('art'))
            <span class="error-message">{{ $errors->first('art') }}</span>
            @endif
          </div>
          
            <!-- Submit button -->
            <div class="d-flex justify-content-center ">
            <button type="submit" class="btn btn-dark mb-4 normal-text btn-lg my-3">Save</button>
            </div>
            <!-- Register buttons -->
          </form>
        </div>
        <span><a href="/profile" class="gallery-link px-4 normal-text">Back to your gallery</a></span>
      </section>  

                     

      

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script > 
    setTimeout(() => {
    const box = document.getElementById('header-message');
  
    box.style.display = 'none';
  
    }, 2500);
    </script>

</html>
