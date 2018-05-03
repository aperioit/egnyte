<!DOCTYPE html>
<html lang="{{ config('app.locale') }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Exo+2:400,500" rel="stylesheet">

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.0/jquery-ui.min.css">

    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <style>
        body {
            font-family: 'Exo 2', sans-serif;
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>

    <!-- Scripts -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    @routes
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
                <a class="navbar-brand" href="{{ url('/') }}">
                    <i class="fas fa-fire"></i> Egnyte
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    <li><a href="{{ url('/newhires') }}"><i class="fas fa-home fa-lg"></i></a></li>

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="{{ url('/orders') }}"><i class="fas fa-chart-pie"></i></a>
                    </li>
                    <li>
                        <a href="{{ url('/admin') }}"><i class="fas fa-tachometer-alt"></i></a>
                    </li>
                    <li>
                        <a href="{{ url('/positions') }}"><i class="fas fa-gem"></i></a>
                    </li>
                    <!-- <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-btn fa-cogs"></i>
                        </a>

                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{ url('/contact') }}"><i class="fa fa-btn fa-envelope-o"></i>Contacts</a></li>
                            <li><a href="{{ url('/position') }}"><i class="fa fa-btn fa-diamond"></i>Positions</a></li>
                            <li><a href="{{ url('/department') }}"><i class="fa fa-btn fa-cube"></i>Department</a></li>
                        </ul>
                    </li> -->

                    <!-- Authentication Links -->
                    <!-- @if (Auth::guest())
                        <li><a href="{{ url('/login') }}">Login</a></li>
                        <li><a href="{{ url('/register') }}">Register</a></li>
                    @endif

                    @if (Auth::check())
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                {{-- @hasrole('admin') --}}
                                    <li><a href="{{ url('/admin') }}"><i class="fa fa-btn fa-dashboard"></i>Dashboard</a></li>
                                {{-- @endhasrole --}}
                                <li><a href="{{ url('/settings') }}"><i class="fa fa-btn fa-user"></i>Settings</a></li>
                                <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                            </ul>
                        </li>
                    @endif -->
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @include('flash::message')

        @yield('content')
    </div>

    <!-- JavaScripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.min.js" integrity="sha256-VazP97ZCwtekAsvgPBSUwPFKdrwD3unUfSGVYrahUqU="crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="https://unpkg.com/vue"></script>
    <script>
        $('div.alert').delay(3000).fadeOut(350);
    </script>
    @yield('footer_scripts')
    <!-- <script src="{{ asset('js/app.js') }}"></script> -->
</body>
</html>
