<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Gochi+Hand">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Mono">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Rubik+Mono+One">


  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ArtRoot : Profile</title>

</head>

<body>
  @if(session('status'))
  <p id="header-message" class="info-message center text-center">{{session('status')}}</p>
  @endif
    <nav class="navbar sticky-top navbar-expand-lg ">
        <div class="container-fluid">
          <a class="navbar-brand " id="logo" href="#">ArtRoot</a>  
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav  navbar-center mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link mx-2" aria-current="page" href="/home">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link mx-4" href="#">Browse</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle"  role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Profile
                </a>
                <ul class="dropdown-menu">
                  @if(auth()->user()->usertype==2)<li><a class="dropdown-item" href="/edit-profile">My Gallery</a></li> @endif
                  <li><a class="dropdown-item" href="#">Account</a></li>
                  <li><hr class="dropdown-divider"></li>
                  <li><a href="{{ route('logout') }}" class="dropdown-item" >Sign Out</a></li>
                </ul>
              </li>
            </ul>
            <div id="search">
            <form  class="d-flex" role="search">
              <input class="form-control me-2" type="search" aria-label="Search">
              <button class="btn btn-outline-dark " type="submit">Search</button>
            </form>
           </div>
          </div>
        </div>
      </nav>
      <div class="featured-header-bg">
      <p class="featured-header text-center my-3">Featured</p>
      </div>

      <div class="slider-container">
        <div class="slider">
          <div class="slides">
            <div id="slides__1" class="slide">
              {{--@if($art->image->height>$art->image->width)--}}
              <div class="row mb-4">
                <div class="col-md-6 mx-auto align-items-center img-col">
                  <div>
                    <img src="arts/batman_arkham_knight_by_joepalombarini_d8t5jtn.jpg" class="img-fluid feature-image" 
                    alt="Responsive image">
                  </div>
                </div>
                <div class="col-md-6 p-4 ">
                  <div class="d-flex flex-column mb-3">
                    <div class="col-md-6 p-4 ">
                    <p class="feature-text ">Batman
                    <p class="feature-price-text ">1500 BDT</p>
                    </p>
                    <p class="feature-sub-text ">By REZA</p>
                    <p class="feature-sub-text ">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used 
                      to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as 
                      a placeholder before final copy is available.</p>
                    <button class="btn btn-dark btn-block mb-4 normal-text feature-button" type="submit">Message</button>
                    </div>
                    
                  </div>
                </div>
            </div>
              <a class="slide__prev" href="#slides__4" title="Next"></a>
              <a class="slide__next" href="#slides__2" title="Next"></a>
            </div>

            <div id="slides__2" class="slide">
                <div class="row mb-4">
                <div class="col-md-6 mx-auto align-items-center img-col">
                  <div class="mx-auto align-items-center" >
                    <img src="arts/TheRedDevils.png" class="img-fluid feature-image" 
                    alt="Responsive image">
                  </div>
                </div>
                <div class="col-md-6 p-4 ">
                  <div class="d-flex flex-column mb-3 align-items-start">
                    <div class="col-md-6 p-4 ">
                    <p class="feature-text ">Batman
                    <p class="feature-price-text ">1500 BDT</p>
                    </p>
                    <p class="feature-sub-text ">By REZA</p>
                    <p class="feature-sub-text ">In publishing and graphic design, Lorem ipsum is a placeholder text commonly used 
                      to demonstrate the visual form of a document or a typeface without relying on meaningful content. Lorem ipsum may be used as 
                      a placeholder before final copy is available.</p>
                    <button class="btn btn-dark feature-button" type="submit">Message</button>
                    </div>
                    
                  </div>
                </div>
            </div>

              <a class="slide__prev" href="#slides__1" title="Prev"></a>
              <a class="slide__next" href="#slides__3" title="Next"></a>
            </div>
            <div id="slides__3" class="slide">
              <span class="slide__text">3</span>
              <a class="slide__prev" href="#slides__2" title="Prev"></a>
              <a class="slide__next" href="#slides__4" title="Next"></a>
            </div>
            <div id="slides__4" class="slide">
              <span class="slide__text">4</span>
              <a class="slide__prev" href="#slides__3" title="Prev"></a>
              <a class="slide__next" href="#slides__1" title="Prev"></a>
            </div>
          </div>
        </div>
      </div>
<br><br><br>

<div class="featured-header-bg">
  <p class="featured-header text-center my-3">Artwork</p>
  </div>

<div class="p-5 mx-auto align-items-start row row-cols-4 row-cols-sm-6 row-cols-md-9 g-3"  >
        @foreach ($arts as $art)
        <div class='card col p-4' style="margin-left:50px;">
        <div class="image-item">
          {{--<img src="{{ route('art.display', $art->path) }}" alt="" />--}}
          <img class="img-profile" src="{{ asset('arts/'.$art->path) }}" alt="" />
          <div class="overlay">
              <div class="d-flex flex-row">
               

            </div>
          </div>    
          </div>
          <br>
          <div id="art-details" class="d-flex justify-content-between py-2">
            <span class="image-title">{{$art->art_name}} </span>
            <span class="image-title-price">{{$art->art_price}} <span class="image-title-currency"> BDT</span></span>
            <a href='#' class="image-title">{{$art->user->name}} </a>
           </div>
          </div>
        
          @endforeach
          
          </section>
        </div>
      
      

        </body>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
          integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
          <script>
        var slideIndex = 1;
        showDivs(slideIndex);

        function plusDivs(n) {
          showDivs(slideIndex += n);
        }

        function showDivs(n) {
          var i;
          var x = document.getElementsByClassName("mySlides");
          if (n > x.length) {slideIndex = 1}
          if (n < 1) {slideIndex = x.length} ;
          for (i = 0; i < x.length; i++) {
            x[i].style.display = "none";
          }
          x[slideIndex-1].style.display = "block";
        }

          </script>

        </html>