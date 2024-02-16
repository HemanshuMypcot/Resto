<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Resto</title>
    <link rel="shortcut icon" href="{{ asset('img/restaurant.png')}}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="dist/autotyping.min.js"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Protest+Riot&display=swap" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
</head>
<style>
    .bg-my {
        /*  */
        background-color: #66abcf;
        animation: change 30s infinite;
    }

    .bg-my-text {
        /*  */
        color: #66abcf;
        animation: change-t 30s infinite;
        text-decoration: none;
        font-size: 20px;
    }

    @keyframes change {
        0% {
            background-color: #d1efed;
        }

        25% {
            background-color: #c38eb4;
        }

        50% {
            background-color: #c4e6e3;
        }

        75% {
            background-color: #a56f96;
        }

        100% {
            background-color: #66abcf;
        }
    }

    @keyframes change-t {
        0% {
            color: #87f0e9;
        }

        25% {
            color: #c38eb4;
        }

        50% {
            color: #c4e6e3;
        }

        75% {
            color: #a56f96;
        }

        100% {
            color: #66abcf;
        }
    }
    .text {
    text-transform: uppercase;
    font-family: verdana;
    font-weight: 700;
    color: #424242;
    text-shadow: 1px 1px 1px #919191,
        1px 2px 1px #919191,
        1px 3px 1px #919191,
        1px 4px 1px #919191,
        1px 5px 1px #919191,
        1px 6px 1px #919191,
        1px 7px 1px #919191,
        1px 8px 1px #919191,
        1px 9px 1px #919191,
        1px 10px 1px #919191,
    1px 18px 6px rgba(16,16,16,0.4),
    1px 22px 10px rgba(16,16,16,0.2),
    1px 25px 35px rgba(16,16,16,0.2),
    1px 30px 60px rgba(16,16,16,0.4);
}
</style>

<body>
    @if (session('showNav'))
        {{-- {{print_r("navbar");}}    --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-my">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">RESTO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/list">List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/add">Add</a>
                        </li> 
                    </ul>
                    <a class="btn btn-outline-secondary btn-sm" href="/logout">Logout</a>
                </div>
            </div>
        </nav>
        <h3 class="text m-4 " style="font-family: Helvetica">Welcome, <span class="">{{session('name')}}</span></h3>
    @else
        {{-- {{print_r("no navbar");}} --}}
        <nav class="navbar navbar-expand-lg navbar-light bg-my">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">RESTO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="/">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/list">List</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/add">Add</a>
                        </li>
                        
                        <li class="nav-item">
                            <a class="nav-link" href="/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register">Register</a>
                        </li>
                    </ul>

                </div>
            </div>
        </nav>
    @endif
<!-- Modal -->

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Search by Restaurant Name</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
        <form action="{{ url('search') }}" method="post">
            @csrf
            <div class="mb-3">
                <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Search" name="name" id="searcg">
                @error('name')
                    <div class="text-danger">Search Field is Required</div>
                @enderror
                <button type="submit" class="btn bg-my mt-4" id="search">Search</button>
            </div>
        </form>
        </div>
      </div>
    </div>
  </div>
    <div class="container mt-3">
        @yield('content')
    </div>
    @yield('home')
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
    </script>
</body>

</html>
