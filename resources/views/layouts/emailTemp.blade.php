<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ URL::to('fonts/fontawesome-free-5.0.6/web-fonts-with-css/css/fontawesome-all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('fonts/fontawesome-free-5.0.6/web-fonts-with-css/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('js.jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('js.jquery-ui.structure.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('js.jquery-ui.theme.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('css/email.css') }}">
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
        <div class="row">
            <div class="col-md-12">
                    <a class="logo" href="{{ route('index') }}"><img src="{{ URL::to('images/alchemortemLogoDraft.png') }}"></a>
            </div>
        </div>
    </div>
    <div class="container-fluid main">
        @yield('content')
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 bg-light footer">
                <p>Copyright &copy; Alchemortem 2018</p>
            </div>
        </div>
    </div>
    @yield('scripts')
</body>
</html>