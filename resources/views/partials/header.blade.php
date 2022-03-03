
<header>
    <nav class="navbar navbar-light bg-white">
      <div class="container-fluid">
        <a class="navbar-brand" href="{{route("guest.index")}}">{{ config('app.name', 'Laravel') }}</a>

        @if (Auth::check())
          <form class="d-flex">
            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
       
          
        @endif


        @if (Route::has('login'))
            <div class="d-flex top-right links align-items-center">
                @auth
                    <a class="mr-2" href="{{ route('admin.home') }}">
                      <i class="bi bi-house-door-fill"></i>
                    </a>
                    <a class="mr-2" href="#">
                      <i class="bi bi-chat-left"></i>
                    </a>
                    <a class="mr-2" href="#">
                      <i class="bi bi-file-plus"></i>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="btn">
                          <i class="bi bi-door-closed" title="Logout"></i>
                        </button>
                    </form>
                @else
                
                    <a href="{{ route('login') }}">Login</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}">Register</a>
                    @endif
                @endauth
            </div>
        @endif
      </div>
    </nav>
</header>