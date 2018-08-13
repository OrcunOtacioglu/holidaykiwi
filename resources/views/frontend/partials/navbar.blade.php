<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand kiwi-brand" href="#">
        holiday<span>kiwi</span>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">

        </ul>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="icon ti-user"></i> Account
                </a>
                <div class="dropdown-menu account-menu" aria-labelledby="navbarDropdown">
                    @auth
                        <a class="dropdown-item" href="{{ route('login') }}">My Account</a>
                    @else
                        <a class="dropdown-item" href="{{ route('login') }}">
                            <i class="icon ti-unlock"></i> Login
                        </a>
                        <a class="dropdown-item" href="{{ route('register') }}">
                            <i class="icon ti-plus"></i> Register
                        </a>
                    @endauth
                </div>
            </li>
        </ul>
    </div>
</nav>