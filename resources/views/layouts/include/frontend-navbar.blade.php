<div class="sticky-top">
    

<nav class="navbar navbar-expand-sm navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">BlogApp</a>
        <button class="navbar-toggler d-lg-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="collapsibleNavId"
            aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
            <ul class="navbar-nav me-auto mt-2 mt-lg-0">
                <li class="nav-item">
                    <a class="nav-link @if(empty(Request::segment(2))) active @endif" href="{{ url('/')}}" aria-current="page">Home</a>
                </li>   
                @php
                    $categories = App\Models\Category::where('navbar_status','0')->where('status','0')->get();
                @endphp
                @foreach($categories as $cateitem)
                <li class="nav-item">
                    <a class="nav-link @if(Request::url() == url('blogs/'. $cateitem->slug)) active @endif" href="{{ url('blogs/'. $cateitem->slug) }}">{{ $cateitem->name }}</a>
                </li>
                @endforeach
            </ul>
                <div>
                @if(Auth::check() && Auth::user()->role_as == 1)
                    <a href="{{ url('admin/dashboard') }}" class="m-4 text-decoration-none text-dark">Go to Dashboard</a>
                @endif
                </div>
          
            @if (Route::has('login'))
                <div class="nav-item">
                    @auth
                    <a class="text-decoration-none btn" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    
                    @else
                        <a href="{{ route('login') }}" class="text-decoration-none btn">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="text-decoration-none btn">Register</a>
                        @endif
                    @endauth
                </div>
             @endif
        </div>
  </div>
</nav>
</div>
<div class="intro">
    <img class="homeimg img-fluid" src="{{ asset('assets/images/image1.jpg') }}" alt=""/>
    <div class="head text-center">
        <h1>Welcome Readers</h1>
        <h5>Find your favorite Nishe</h5>
        <p>Here you wiil be find the various nishes blogs, like health, technology, sports, science, finance and many more at one place.</p>
    </div>
</div>
