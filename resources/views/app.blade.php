<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Smart Car Share</title>
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="http://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyB8hD4PwJ8xhvWPhx_FPETyc8L45eJyKJA"></script>
    <script src="{{ asset('/js/jquery.geocomplete.min.js') }}"></script>
</head>
<body class="body_bg" style="padding-bottom:10%">
    <div class="heading_bar">
        <h1 class="header_title" style="padding-left: 3%">
            Smart Car Share
        </h1>
    </div>
<nav class="navbar navbar-default custom_nav_bar">
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-right navbar-nav">
            <li class="nav_buttons"><a href="{{ url('bookings') }}" style="color:black;">Bookings</a></li>
            <li class="nav_buttons"><a href="{{ url('members') }}"  style="color:black;">Members</a></li>
            <li class="nav_buttons"><a href="{{ url('vehicles') }}"  style="color:black;">Vehicles</a></li>
            <li class="nav_buttons"><a href="{{ url('locations') }}"  style="color:black;">Locations</a></li>
            <li class="nav_buttons"><a href="{{ url('archives/bookings') }}"  style="color:black;">Archived Bookings</a></li>
            <li class="nav_buttons"><a href="{{ url('archives/members') }}"  style="color:black;">Archived Members</a></li>
            <li class="nav_buttons"><a href="{{ url('help') }}"  style="color:black;">Help</a></li>

            <!-- Authentication Links -->
            <li>
                <a class="nav_buttons" href="{{ route('logout') }}"
                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                    Logout
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                </form>
            </li>
            @if( Auth::user()->role == 'admin')
                <li><a href="{{ route('register') }}">Register</a></li>
            @endif
        </ul>
    </div>
</nav>

@yield('content')

<div class="panel-footer navbar-fixed-bottom">
    @if( Auth::user()->role == 'staff')
        <div style="float: right;">
            <a href="{{ url('accounts') }}/{{ Auth::user()->id }}" type="button" class="btn btn-default">
                <i class="fa fa-plus"></i> Manage Account
            </a>
        </div>
    @endif

    <p class="copyright panel-info" style="float: left;">&copy; 2017 - Genius Company</p>
</div>

<!-- Scripts -->

</body>
</html>