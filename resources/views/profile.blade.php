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
  <title>ArtRoot : rofile</title>

</head>

<body>
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
                  <li><a class="dropdown-item" href="#">My Gallery</a></li>
                  <li><a class="dropdown-item" href="#">Account</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a href="{{ route('logout') }}" class="dropdown-item" >Sign Out</a></li>
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
              <div class="p-2"><h1 class="header">My Gallery</h1></div>
              <div class="p-2"><p class="normal-text text-muted subtext">Add, edit or delete your artwork to showcase. This is your gallery.</p></div>
            </div>
            <div class="p-2"> 
              <a class="btn add-art-btn btn-dark normal-text" href="{{ route('art.add-form') }}" role="button">Add Artwork</a>
            </div>
          </div>
        </div>
      </section>  
      


      <div class="container-alt-2">
        <div class="image-gallery">
          
          <div class="column-alt-2">
            @foreach($arts as $art)
            @if(($art->id)%2!==0)      {{--to determine which images will go to which row ids with multiples of two will go to first column--}}
            <div class="image-item">
              {{--<img src="{{ route('art.display', $art->path) }}" alt="" />--}}
              <img src="{{ asset('arts/'.$art->path) }}" alt="" />
              <div class="overlay">
                <div class="d-flex flex-column">
                  <div class="p-2"><span class="image-title">{{$art->art_name}} </span></div>
                  <div class="p-2"><span class="image-title-sub">{{$art->art_category}}</span></div>
                  <div class="d-flex flex-row">
                    <div class="p-2"><a class="btn btn-dark my-2 normal-text">Edit</a></div>
                    <div class="p-2"><a class="btn btn-danger my-2 normal-text">Delete</a></div>
                  </div>
                </div>        
              </div>
            </div>
            @endif
            @endforeach
          </div>
              
          <div class="column-alt-2">
            @foreach($arts as $art)
            @if(($art->id)%2===0) {{--to determine which images will go to which row ids with multiples of two will go to first column--}}
            <div class="image-item">
              {{--<img src="{{ route('art.display', $art->path) }}" alt="" />--}}
              <img src="{{ asset('arts/'.$art->path) }}" alt="" />
              <div class="overlay">
                <div class="d-flex flex-column">
                  <div class="p-2"><span class="image-title">{{$art->art_name}} </span></div>
                  <div class="p-2"><span class="image-title-sub">{{$art->art_category}}</span></div>
                  <div class="d-flex flex-row">
                    <div class="p-2"><a class="btn btn-dark my-2 normal-text">Edit</a></div>
                    <div class="p-2"><a class="btn btn-danger my-2 normal-text">Delete</a></div>
                  </div>
                </div>        
              </div>
            </div>
            @endif
            @endforeach
          </div>

        </div>
      </div>
      

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>