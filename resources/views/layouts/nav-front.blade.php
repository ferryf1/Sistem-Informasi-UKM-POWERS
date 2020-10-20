@section('nav-front')

<link rel="stylesheet" href="{{asset('front/css/nav-style.css')}}">
<nav class="navbar navbar-expand-lg navbar-dark bg-nav-new">
    <div class="container">
        <a class="navbar-brand" href="{{route('home')}}"><img class="img-fluid" src="{{asset('gambar/LogoPowers.png')}}"
                alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
            aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <div class="navbar-nav ml-auto">
                <a class="nav-item nav-link nav-link-a{{ request()->is('home') ? ' active border border-white rounded' : '' }}"
                    href="{{route('home')}}">Home</a>
                <a class="nav-item nav-link nav-link-a{{ request()->is('news-list') ? ' active border border-white rounded' : '' }}"
                    href="{{route('news-list')}}">Announcements</a>
                <!-- <a class="nav-item nav-link nav-link-a{{ request()->is('agenda-list') ? ' active border border-white rounded' : '' }}"
                    href="{{route('agenda-list')}}">Our Agenda</a> -->
                <a class="nav-item nav-link nav-link-a {{ request()->is('gallery-front') ? ' active border border-white rounded' : '' }}"
                    href="{{ route('gallery-front') }}">Gallery</a>
                <a class="nav-item nav-link nav-link-a {{ request()->is('discussion') ? ' active border border-white rounded' : '' }}"
                    href="{{ route('discussion.index') }}">Discussions</a>
                <a class="nav-item nav-link nav-link-a{{ request()->is('material-list') ? ' active border border-white rounded' : '' }}"
                    href="{{ route('material-list') }}">Material</a>
                <!-- <a class="nav-item nav-link nav-link-a{{ request()->is('about-us') ? ' active border border-white rounded' : '' }}"
                    href="{{ route('about-us') }}">About Us</a> -->
                <!-- <a class="nav-item nav-link nav-link-a{{ request()->is('register-global') ? ' active border border-white rounded' : '' }}"
                    href="{{ route('register-global') }}">Register</a> -->
                <li class="nav-item dropdown ">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        About Us <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="nav-item dropdown-item nav-link" href="{{route('agenda-list')}}">Our Agenda</a>
                        <a class="nav-item dropdown-item nav-link" href="{{route('portfolio-list')}}">Portfolio</a>
                        <a class="nav-item dropdown-item nav-link" href="{{ route('about-us') }}">What is POWERS</a>


                    </div>
                </li>

                @guest
                <li class="nav-item dropdown ">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        Register <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="nav-item dropdown-item nav-link" href="{{ route('register-global') }}">Join POWERS</a>

                        <a class="nav-item dropdown-item nav-link" href="{{ route('register') }}">Join Our Website
                            Community</a>

                    </div>
                </li>


                <li class="nav-item">
                    <a class="nav-item nav-link  text-warning" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>

                @else
                <a class="nav-item nav-link nav-link-a{{ request()->is('register-global') ? ' active border border-white rounded' : '' }}"
                    href="{{ route('register-global') }}">Register</a>
                <li class="nav-item dropdown ">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                        data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item nav-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </div>
        </div>
    </div>
</nav>

@endsection