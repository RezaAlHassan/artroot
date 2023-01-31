<!DOCTYPE html>
<html lang="en">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
  <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Gochi+Hand">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Mono">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Shadows+Into+Light">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Pompiere">

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
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Profile
                </a>
                <ul class="dropdown-menu">
                  @if(auth()->user()->usertype==2)<li><a class="dropdown-item" href="/profile">My Gallery</a></li> @endif
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

      <section class="text-center container">
        <div class="row py-lg-5">
          <div class="col-lg-6 col-md-8 mx-auto">
            <div class="d-flex flex-column">
              <div class="p-2"><p class="header">My Gallery</p></div>
              <div class="p-2"><p class="normal-text text-muted subtext">Add, edit or delete your artwork to showcase. This is your gallery.</p></div>
            </div>
            <div class="p-2"> 
              <a class="btn add-art-btn btn-dark" href="{{ route('art.add-form') }}" role="button">Add Artwork</a>
            </div>
          </div>
        </div>
      </section>  
      


      <div class="container-alt-2">
        <div class="image-gallery">
          
          <div class="column-alt-2">
            @foreach($arts as $art)
            @if(($art->id)%4==1)      {{--to determine which images will go to which column--}}
            <div class="image-item">
              {{--<img src="{{ route('art.display', $art->path) }}" alt="" />--}}
              <img src="{{ asset('arts/'.$art->path) }}" alt="" />
              <div class="overlay">
                  <div class="d-flex flex-row">
                    
                    <div class="p-2"> 
                      <a class="btn btn-dark my-2 normal-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                      <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                    </svg></a>
                  </div>
                    
                    <div class="p-2"> 
                      <a href='{{ route('art.delete', $art->id) }}' class="btn btn-danger my-2 normal-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                      <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                    </svg></a>
                    
                  </div>
                </div>        
              </div>
              <div id="art-details" class="d-flex justify-content-between py-2">
                <span class="image-title">{{$art->art_name}} </span>
                <span class="image-title-price">{{$art->art_price}} <span class="image-title-currency"> BDT</span></span>
               </div>
            </div>
            <hr class="solid">
              @endif
              @endforeach
            </div> 

            <div class="column-alt-2">
              @foreach($arts as $art)
              @if(($art->id)%4==2)      {{--to determine which images will go to which column--}}
              <div class="image-item">
                {{--<img src="{{ route('art.display', $art->path) }}" alt="" />--}}
                <img src="{{ asset('arts/'.$art->path) }}" alt="" />
                <div class="overlay">
                    <div class="d-flex flex-row">
                      
                      <div class="p-2"> 
                        <a class="btn btn-dark my-2 normal-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                        <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                      </svg></a>
                    </div>
                      
                      <div class="p-2"> 
                        <a href='{{ route('art.delete', $art->id) }}' class="btn btn-danger my-2 normal-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                        <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                      </svg></a>
                      
                    </div>
                  </div>        
                </div>
                <div id="art-details" class="d-flex justify-content-between py-2">
                  <span class="image-title">{{$art->art_name}} </span>
                  <span class="image-title-price">{{$art->art_price}} <span class="image-title-currency"> BDT</span></span>
                 </div>
              </div>
              <hr class="solid">
                @endif
                @endforeach
              </div> 

              <div class="column-alt-2">
                @foreach($arts as $art)
                @if(($art->id)%4==3)      {{--to determine which images will go to which column--}}
                <div class="image-item">
                  {{--<img src="{{ route('art.display', $art->path) }}" alt="" />--}}
                  <img src="{{ asset('arts/'.$art->path) }}" alt="" />
                  <div class="overlay">
                      <div class="d-flex flex-row">
                        
                        <div class="p-2"> 
                          <a class="btn btn-dark my-2 normal-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                          <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                        </svg></a>
                      </div>
                        
                        <div class="p-2"> 
                          <a href='{{ route('art.delete', $art->id) }}' class="btn btn-danger my-2 normal-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                          <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                        </svg></a>
                        
                      </div>
                    </div>        
                  </div>
                  <div id="art-details" class="d-flex justify-content-between py-2">
                    <span class="image-title">{{$art->art_name}} </span>
                    <span class="image-title-price">{{$art->art_price}} <span class="image-title-currency"> BDT</span></span>
                   </div>
                </div>
                <hr class="solid">
                  @endif
                  @endforeach
                </div> 

                <div class="column-alt-2">
                  @foreach($arts as $art)
                  @if(($art->id)%4==0)      {{--to determine which images will go to which column--}}
                  <div class="image-item">
                    {{--<img src="{{ route('art.display', $art->path) }}" alt="" />--}}
                    <img src="{{ asset('arts/'.$art->path) }}" alt="" />
                    <div class="overlay">
                        <div class="d-flex flex-row">
                          
                          <div class="p-2"> 
                            <a class="btn btn-dark my-2 normal-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-fill" viewBox="0 0 16 16">
                            <path d="M12.854.146a.5.5 0 0 0-.707 0L10.5 1.793 14.207 5.5l1.647-1.646a.5.5 0 0 0 0-.708l-3-3zm.646 6.061L9.793 2.5 3.293 9H3.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.207l6.5-6.5zm-7.468 7.468A.5.5 0 0 1 6 13.5V13h-.5a.5.5 0 0 1-.5-.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.5-.5V10h-.5a.499.499 0 0 1-.175-.032l-.179.178a.5.5 0 0 0-.11.168l-2 5a.5.5 0 0 0 .65.65l5-2a.5.5 0 0 0 .168-.11l.178-.178z"/>
                          </svg></a>
                        </div>
                          
                          <div class="p-2"> 
                            <a href='{{ route('art.delete', $art->id) }}' class="btn btn-danger my-2 normal-text"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash-fill" viewBox="0 0 16 16">
                            <path d="M2.5 1a1 1 0 0 0-1 1v1a1 1 0 0 0 1 1H3v9a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2V4h.5a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H10a1 1 0 0 0-1-1H7a1 1 0 0 0-1 1H2.5zm3 4a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 .5-.5zM8 5a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-1 0v-7A.5.5 0 0 1 8 5zm3 .5v7a.5.5 0 0 1-1 0v-7a.5.5 0 0 1 1 0z"/>
                          </svg></a>
                          
                        </div>
                      </div>        
                    </div>
                    <div id="art-details" class="d-flex justify-content-between py-2">
                      <span class="image-title">{{$art->art_name}} </span>
                      <span class="image-title-price">{{$art->art_price}} <span class="image-title-currency"> BDT</span></span>
                     </div>
                  </div>
                  <hr class="solid">
                    @endif
                    @endforeach
                  </div> 

        </div>
        @if(count($arts)==0)
        <div class="transparent-message center text-center">
          <p>No Artworks Found</p>
          <img src="{{ asset('images/empty.png') }}" height="50">
        </div>
      @endif
      </div>
      

</body>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
  <script > 
  setTimeout(() => {
  const box = document.getElementById('header-message');

  // 👇️ removes element from DOM
  box.style.display = 'none';

}, 2500); // 👈️ time in milliseconds
  </script>

</html>