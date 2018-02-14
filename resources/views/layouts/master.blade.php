<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::to('fonts/fontawesome-free-5.0.6/web-fonts-with-css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('fonts/fontawesome-free-5.0.6/web-fonts-with-css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/alchemortem.css') }}">
</head>
<body>
    <div class="container-fluid header">
        <div class="row">
            <div class="col-lg-12"></div>
        </div>
    </div>
    <div class="container-fluid masthead bg-light">
        <div class="row">
            <div class="col-lg-12">
                <nav class="navbar navbar-expand-md navbar-light">
                    <a class="logo" href="#"><img src="{{ URL::to('images/alchemortemLogoDraft.png')  }}"></a>
                    <div class="container-fluid navlinks">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav navbar-right">
                            <li class="nav-item">
                                <a class="nav-link" href="#">Home </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Shop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Cart</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">Checkout</a>
                            </li><li class="nav-item">
                                <a class="nav-link" href="#">FAQ</a>
                            </li><li class="nav-item">
                                <a class="nav-link" href="#">My Account</a>
                            </li>
                        </ul>
                    </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="container-fluid main">
        @yield('content')
    </div>
    <div class="container-fluid footer">
        <div class="row">
            <div class="col-lg-12 bg-light">
                
            </div>
        </div>
    </div>
    
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="{{ URL::to('js/alchemortem.js') }}"></script>
</body>
</html>