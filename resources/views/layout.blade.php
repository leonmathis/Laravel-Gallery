<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    <title>Gallery</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    @include('component.nav')

    @yield('content')

    <!-- user dropup button -->
    <div class="btn-group dropend">
        <button type="button" class="btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown">
        <i class="bi bi-person-circle"></i>
        </button>
        <ul class="dropdown-menu dropdown-menu-dark">
            @isset(auth()->user()->id)
            <li><a class="dropdown-item" href="#" onclick="document.querySelector('#logoutForm').submit()">Logout</a></li>
            <li><hr class="dropdown-divider"></li>
            @endisset
            @isset(auth()->user()->id)
            <li><a class="dropdown-item" href="/user/edit">Edit</a></li>
            @endisset
            @empty(auth()->user()->id)
            <li><a class="dropdown-item" href="/login">Login</a></li>
            <li><a class="dropdown-item" href="/register">Register</a></li>
            @endempty
        </ul>
    </div>

    <!-- Logout Fortify -->
    <form method="POST" action="/logout" id="logoutForm">
    @csrf
    </form>

<script src="../js/app.js"></script>
</body>
</html>
