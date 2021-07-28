<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="{{ asset('js/main.js') }}" defer></script>
    <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" -->
    <!-- integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous"> -->
    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
             integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</head>

<body>

    <header>
        <nav id="mobile">
            <div class="nav__logo">
                <i class='bx bxs-shopping-bag'></i>
                <span><a href="/">XYZ</a></span>
            </div>

            <div class="nav__search">
                <input type="text" placeholder="search">
                <i class='bx bx-search'></i>
            </div>

            <div class="toggleBtn">
                <i class='bx bx-menu'></i>
            </div>

            <div class="nav__mobile_list">
                <section>
                    <div class="nav__item">
                        <span><a href="/category">Categories</a></span>
                    </div>
                    {{-- <div class="nav__item">
                        <span>whislist</span>
                    </div> --}}
                    <div class="nav__item">
                        <span><a href="/cart">Cart</a></span>
                    </div>
                    <div class="nav__item">
                        <span><a href="/myorder">Order's</a></span>
                    </div>
                </section>

            </div>

        </nav>


        <nav id="desk">
            <div class="nav__logo">
                <i class='bx bxs-shopping-bag'></i>
                <span><a href="/">XYZ</a></span>
            </div>

            <div class="nav__search">
                <input type="text" placeholder="search">
                <i class='bx bx-search'></i>
            </div>

            <div class="nav__list">
                <div class="nav__item">
                    <span><a href="/category">Categories</a></span>
                </div>
                <!-- <div class="nav__item">
                    <span>whislist</span>
                </div> -->
                <div class="nav__item">
                    <span><a href="/cart">Cart</a></span>
                </div>
                <div class="nav__item">
                    <span><a href="/myorder">Order's</a></span>
                </div>
            </div>

            <div class="nav__ac">

                @if (auth()->user())
                    <div class="login">
                        <i>{{ auth()->user()->name }}</i>
                        |
                        <a href="/logout">Logout</a>
                    </div>
                @else
                    <div class="login">
                        <a href="/login">Login</a>
                        /
                        <a href="/register">Singup</a>
                    </div>
                @endif

            </div>
        </nav>
    </header>


    <div class="wrapper">
        @yield('content')
    </div>


</body>

</html>
