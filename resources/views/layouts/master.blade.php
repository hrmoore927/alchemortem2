<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::to('fonts/fontawesome-free-5.0.6/web-fonts-with-css/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('fonts/fontawesome-free-5.0.6/web-fonts-with-css/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('js.jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('js.jquery-ui.structure.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('js.jquery-ui.theme.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/alchemortem.css') }}">
    <script src="https://code.jquery.com/jquery-3.3.1.js" integrity="sha2562Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
    
    <script type="text/javascript" src="{{ URL::to('jquery-ui.min.js') }}"></script>
    <script type="text/javascript" src="{{ URL::to('js/alchemortem.js') }}"></script>
</head>
<body>
    <div class="container-fluid header">
        <div class="row">
            <div class="col-lg-12"></div>
        </div>
    </div>
    <div class="container-fluid masthead bg-light">
        <div class="row logoNav">
            <div class="col-md-4 col-sm-12">
                    <a class="logo" href="{{ route('index') }}"><img src="{{ URL::to('images/alchemortemLogoDraft.png') }}"></a>
            </div>
            <div class="col-md-8 col-sm-12 navlinks">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/') }}">Home </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/shop-products') }}">Shop</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/cart') }}">Cart <span class="badge badge-secondary">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/checkout') }}">Checkout</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/faq') }}">FAQ</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ url('/contact') }}">Contact</a>
                            </li>
                            <li class="nav-item dropdown">    
                                @if(Auth::check())
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">My Account</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <a class="dropdown-item" href="{{ route('my-account') }}">My Account</a>
                                        <a class="dropdown-item" href="{{ route('logout') }}">Logout</a>
                                    </div>
                                @else
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Customer Login</a>
                                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                        <form action="{{ route('signin') }}" method="post">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" id="email" name="email" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="password">Password</label>
                                                <input type="password" id="password" name="password" class="form-control">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Sign In</button>
                                            {{ csrf_field() }}
                                        </form>
                                        <a class="dropdown-item signUpLink" href="{{ url('/signup') }}">Sign up here</a>
                                        <a class="dropdown-item signUpLink" href="{{ url('/password/reset') }}">Forgot password</a>
                                    </div>
                                @endif
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
        </div>
    </div>
    <div class="container-fluid main">
        @yield('content')
    </div>
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class="col-lg-12 bg-light footer">
                <p>Copyright &copy; Alchemortem 2018</p>
            </div>
        </div>
    </div>
    @yield('scripts')
</body>
</html>