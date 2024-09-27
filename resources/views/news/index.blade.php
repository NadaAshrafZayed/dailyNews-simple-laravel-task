<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    
    
    <!-- Custom CSS for Nested Dropdowns -->
    <style>
        .dropdown-submenu {
            position: relative;
        }
        .dropdown-submenu .dropdown-menu {
            top: 0;
            left: 100%; 
            margin-left: -200%;
        }
        .dropdown-submenu:hover .dropdown-menu {
            display: block;
        }
    </style>
    <title>  News </title>
  </head>


  <body>
    <!-- Navbar -->
    <nav class="navbar navbar-light bg-success my-2">
      <div class="container-fluid d-flex justify-content-center">
          <a class="navbar-brand text-light" href="{{route('news.index')}}">Your Daily News</a>
      </div>
    </nav>


    <!-- Dropdown -->
    <div class="d-flex justify-content-end dropdown-container">
        <div class="dropdown m-2">
            <button style="font-size: 20px;" class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                Sort
            </button>

            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownMenuButton">
                <a class="dropdown-item" href="{{route('news.index')}}">None</a>  
                <li class="dropdown-submenu">
                    <a class="dropdown-item" href="#">By Date &raquo;</a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <!-- href="route('destination', Route's parameter's value )" -->
                        <li><a class="dropdown-item" href="{{route('news.sort', 'DA')}}">Ascending</a></li>
                        <li><a class="dropdown-item" href="{{route('news.sort', 'DD')}}">Descending</a></li>
                    </ul>
                </li>
                <li class="dropdown-submenu">
                    <a class="dropdown-item" href="#">By Rating &raquo;</a>
                    <ul class="dropdown-menu dropdown-menu-end">
                        <li><a class="dropdown-item" href="{{route('news.sort', 'RA')}}">Ascending</a></li>
                        <li><a class="dropdown-item" href="{{route('news.sort', 'RD')}}">Descending</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <!-- News Cards -->
    <div class="bg-bright d-flex flex-wrap justify-content-center my-4">
        @foreach( $allNews as $news )
            <div class="card m-3" style="width: 40%;">
                <img style="width: 100%; height: 300px" class="card-img-top" src="{{ asset('images/newspaper2.jpg') }}" alt="Newspaper">
                <div class="card-header bg-dark">
                    <h1 class="text-center text-light"> {{$news->title}} </h1>
                </div>
                <div class="card-body">
                    <h5 class="">Content</h5>
                    <p class="card-title"> {{$news->content}} {{$news->content}} {{$news->content}}..... </p>
                    <br>
                    <p class="card-text">
                        <i class="fas fa-star" style="color: #FFB200;"></i> <span class="fw-bold" style="color: #FFB200;">{{$news->rating}}</span>
                    </p>
                    <p class="card-text"><span class="fw-bold">Released: </span> <span class="fst-italic"> {{$news->datetime}} </span> </p>
                    <p class="card-text"><span class="fw-bold">Source: </span> <span class="fs-4"> {{$news->source}} </span> </p>
                </div>
            </div>
        @endforeach
    </div>


    <!-- Optional JavaScript; choose one of the two! -->
    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>