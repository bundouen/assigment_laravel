<nav class="navbar navbar-expand-lg navbar-light bg-light shadow-sm mb-0 bg-body rounded">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ url('/') }}">E-Shop</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                {{-- <li class="nav-item">
                    <a class="nav-link" href="{{ 'feature_category' }}">Category</a>
                </li> --}}
                <li class="nav-item">
                    <a class="nav-link" href="{{ 'cart' }}"><i class="fa fa-shopping-cart" style="font-size: 16px;"></i></a>
                    <span class='badge badge-warning' id='lblCartCount'>{{ isset($countcart)? $countcart:0 }}</span>
                </li>

                @if (Route::has('login'))

                @auth
                <li class="nav-item">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @else
                <li class="nav-item">
                    <a href="{{ route('login') }}" class="nav-link">Log in</a>
                </li>

                @if (Route::has('register'))
                <li class="nav-item">
                    <a href="{{ route('register') }}" class="nav-link">Register</a>
                </li>
                @endif
                @endauth

                @endif
            </ul>
        </div>
    </div>
</nav>