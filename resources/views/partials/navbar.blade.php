<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand fw-bold" href="{{ route('home') }}">
            BedSpot<span class="text-warning">UAE</span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mainNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="mainNav">
            <ul class="navbar-nav ms-auto align-items-lg-center">
    <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Home</a></li>
    <li class="nav-item"><a class="nav-link" href="#">Browse</a></li>

    @guest
        <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Log in</a></li>
        <li class="nav-item ms-lg-2">
            <a class="btn btn-warning btn-sm px-3" href="{{ route('register') }}">Sign up</a>
        </li>
    @endguest

    @auth
    <li class="nav-item">
    <a class="nav-link" href="{{ route(auth()->user()->dashboardRoute()) }}">Dashboard</a>
</li>
        <li class="nav-item">
            <span class="nav-link text-white-50">{{ auth()->user()->name }}</span>
        </li>
        <li class="nav-item ms-lg-2">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-outline-light btn-sm px-3">Log out</button>
            </form>
        </li>
    @endauth
</ul>
        </div>
    </div>
</nav>