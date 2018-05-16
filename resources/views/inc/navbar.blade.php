<nav class="navbar first-navbar navbar-expand-md">
        <div class="container">
            <button class="navbar-toggler custom-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">
                    <li><a class="nav-link"><span class="oi oi-phone"> 721-325-141</span></a></li>
                    <li><a class="nav-link"><span class="oi oi-map-marker"> Warsaw, st. Jerozolimska 173</span></a></li>

                    <div class="block-of-icons">
                        <li><a href="#" class="nav-link"><i class="fa fa-facebook-square"></i></a></li>
                        <li><a href="#" class="nav-link"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#" class="nav-link"><i class="fa fa-instagram"></i></a></li>
                    </div>

                </ul>
                {{-- Right Side of Navbar --}}
                <ul class="navbar-nav first-right-side">
                     <!-- Authentication Links -->
                     @guest
                        <li><a class="nav-link" href="{{ route('login') }}">{{ __('Sign In') }}</a></li>
                        <li><a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a></li>
                    @else
                    <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
    
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
    
                                <a class="dropdown-item" href="dashboard">
                                    {{ __('Dashboard') }}
                                </a>
    
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>
    
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
    </div>
 </nav>

<nav class="navbar second-navbar navbar-expand-md sticky-top">
        <div class="container">
            <img src="{{url('/icons/logo2.png')}}" width="15%"/>
            <button class="navbar-toggler custom-toggler2" type="button" data-toggle="collapse" data-target="#navbarSupportedContent2" aria-controls="navbarSupportedContent2" aria-expanded="false" aria-label="Toggle navigation">      
                <span class="navbar-toggler-icon"></span>
            </button>
    
            <div class="collapse navbar-collapse" id="navbarSupportedContent2">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                  <li class="{{Request::is('/') ? 'active': '' }}">
                    <a class="nav-link" href="/">Home</a>
                  </li>

                  <li class="{{Request::is('cars') ? 'active': '' }}">
                    <a class="nav-link" href="/cars">Products</a>
                  </li>
        
                  <li class="{{Request::is('about') ? 'active': '' }}">
                    <a class="nav-link" href="/about">About</a>
                  </li>
        
                  <li class="{{Request::is('contact') ? 'active': '' }}">
                    <a class="nav-link" href="/contact">Contact</a>
                  </li>

                  <li class="{{Request::is('shopping-cart') ? 'active': '' }}">
                    <a class="nav-link" href="/shopping-cart"><i class="fas fa-shopping-cart"></i> Shopping Cart
                        <span class="badge badge-warning badge-pill">{{ Session::has('cart') ? Session::get('cart')->totalQty : '' }}</span>
                    </a>
                  </li>

                </ul>
            </div>
        </div>
</nav> 