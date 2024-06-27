<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

</head>

<body>

    <!-- nav bar start  -->
    <nav id="navbar" class="navbar navbar-expand-lg mt-5 d-flex justify-content-between">
        <div class="container-lg">
            <a class="navbar-brand" href="#" style="color:darkviolet;">
                <h4 class="fw-bold">Dreams</h4>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse ms-5" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active text-dark fs-5" aria-current="page" href="{{ route('user#homePage') }}">Home</a>
                    <a class="nav-link  fs-5" href="{{ route('user#aboutUsPage') }}">About Us</a>
                    <a class="nav-link  fs-5" href="{{ route('user#galleryPage') }}">Gallery</a>
                    <a class="nav-link  fs-5" href="{{ route('user#servicePage') }}">Services </a>
                    <a class="nav-link  fs-5" href="{{ route('user#contactUsPage') }}">Contact Us</a>
                </div>

            </div>

            <div class="dropdown">
                <button class="navBtn btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                 {{ Auth::user()->name }}
                </button>
                <ul class="dropdown-menu " style="background-color: lightyellow;">
                  <li><a class="dropdown-item price"  href="#"><i class="fa-solid fa-id-card me-2"></i>Profile</a></li>
                  <li><a class="dropdown-item price"  href="#"><i class="fa-solid fa-key me-2"></i>Change Password</a></li>
                  <li><a class="dropdown-item price"  href="#"><i class="fa-solid fa-envelope me-2"></i>Message</a></li>
                  <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <li><button class="dropdown-item price"  href=""><i class="fa-solid fa-arrow-right-from-bracket me-2"></i>Logout</button></li>
                  </form>
                </ul>
              </div>
        </div>
    </nav>
    <!-- nav bar end  -->

    @yield('content')

    <x-footer></x-footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>

