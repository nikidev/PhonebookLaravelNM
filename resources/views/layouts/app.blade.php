<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Phonebook</title>

    <!-- Fonts -->


    <link href="{{ asset('/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/google-fonts.css') }}" rel="stylesheet">


    <!-- Styles -->
    <link href="{{ asset('/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/font-awesome4.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/jquery.dataTables.min.css') }}" rel="stylesheet">
    <link href="{{ asset('/css/buttons.dataTables.min.css') }}" rel="stylesheet">
    


     <link href="{{ asset('/css/app-style.css') }}" rel="stylesheet">
     <link href="{{ asset('/css/mdb.css') }}" rel="stylesheet">
     <link href="{{ asset('/css/mdb.min.css') }}" rel="stylesheet">
     <link href="{{ asset('css/lightbox.css') }}"rel="stylesheet" >
     <link href="{{ asset('css/lightbox.min.css') }}"rel="stylesheet" >
     <link href="{{ asset('css/bootstrap-switch.css') }}"rel="stylesheet" >


    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/home') }}">
                    <i id="logo" class="fa fa-phone-square"></i> Phonebook
                </a>
            </div>

            

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/home') }}">Home</a></li>

                    @if(!Auth::guest() && Auth::user()->isAdmin)
                        <li><a href="{{ url('/users') }}">Users</a></li>
                    @endif

                    @if(!Auth::guest())
                        <li><a href="{{ url('/groups') }}">Groups</a></li>
                    @endif

                    @if(!Auth::guest() && Auth::user()->isAdmin)
                        <li><a href="{{ url('/services') }}">Services</a></li>
                    @endif
                </ul>

                

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                               Hi, {{ Auth::user()->name }} ! <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li><a href="{{ url('profile/edit/'.Auth::user()->id) }}"><i class="fa fa-user"></i>My Profile</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->


    <script type="text/javascript" src="{{ asset('js/jquery.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/bootstrap.min.js') }}"></script>


    {{--<script type="text/javascript" src="http://mdbootstrap.com/mdbcdn/mdb.min.js"></script>--}}

    <script type="text/javascript" src="{{ asset('js/jquery.dataTables.min.js') }}"></script>



    <script type="text/javascript" src="{{ asset('js/dataTables.buttons.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/buttons.flash.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/jszip.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/pdfmake.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/vfs_fonts.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/buttons.html5.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/buttons.print.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/buttons.colVis.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/DataTables.js') }}"></script>
    
    {{--<script type="text/javascript" src="{{ asset('js/searchbar.js') }}"></script>--}}

    <script type="text/javascript" src="{{ asset('js/deleteModal.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/popup.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/input-photo.js') }}"></script>
    
    <script type="text/javascript" src="{{ asset('js/lightbox.min.js') }}"></script>

    <script type="text/javascript" src="{{ asset('js/bootstrap-switch.js') }}"></script>
    <script type="text/javascript" src="{{ asset('js/switcher.js') }}"></script>



    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
</body>
</html>
