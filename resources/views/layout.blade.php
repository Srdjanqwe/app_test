<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <script src="{{ mix('js/app.js' )}}" defer></script>
    <title>Document</title>
</head>
<body>
    <div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 bg-white border-bottom shadow-sm mb-3">
        <h5 class="my-0 mr-md-auto font-weight-normal">Laravel app</h5>
        <nav class="my-2 my-md-0 mr-md-3" >
            <a class="p-2 text-dark" href="{{ route('posts.index') }}">Home</a>

            @can('home.contact')<a class="p-2 text-dark" href="{{ route('contact') }}">Users List</a>@endcan
            @can('home.dash')<a class="p-2 text-dark" href="{{ route('dash') }}">Dashboard</a>@endcan
            @can('home.create')<a class="p-2 text-dark" href="{{ route('create') }}">Add Blog</a>@endcan

            @guest
                @if (Route::has('register'))
                    <a class="p-2 text-dark" href="{{ route('register')}}">Register</a>
                @endif
                    <a class="p-2 text-dark" href="{{ route('login')}}">Login</a>
            @else

            <a class="p-2 text-dark" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> {{ Auth::user()->name }} <span class="caret"></span></a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @if (session('impersonated_by'))
                            <li><a classic="dropdown-item" href="{{ route('impersonate_leave') }}">Back to my user</a></li>
                        @endif
                    <a class="p-2 text-dark" href="{{ route('logout')}}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">Logout ({{ Auth::user()->name }})</a>

                    <form id="logout-form" action={{ route('logout') }} method="POST"
                        style="display: none;">
                    @csrf

                    </form>
                    </div>

            @endguest

        </nav>
    </div>

    @if(session()->has('status'))
        <p style="color: green">
            {{ session()->get('status') }}
        </p>
    @endif

    @yield('content')
</body>
</html>
