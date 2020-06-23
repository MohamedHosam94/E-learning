<nav class="navbar navbar-expand-lg fixed-top  ">
  <div class="container">
    <div class="navbar-translate">
      <a class="navbar-brand" href="{{ route('frontend.landing') }}" rel="tooltip" title="" data-placement="bottom">
        E-Learning
      </a>
      <button class="navbar-toggler navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation"
        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-bar bar1"></span>
        <span class="navbar-toggler-bar bar2"></span>
        <span class="navbar-toggler-bar bar3"></span>
      </button>
    </div>
    <div class="collapse navbar-collapse justify-content-end" id="navigation">
      <ul class="navbar-nav">

        <li class="nav-item">
          <div class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Skills
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

              @foreach ($skills as $skill)
              <a class="dropdown-item" href="  {{ route('front.skill' , $skill) }} ">
                {{ $skill->name }}</a>
              @endforeach
            </div>
          </div>
        </li>

        <li class="nav-item">
          <div class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              Categories
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
              @foreach ($categories as $category)
              <a class="dropdown-item" href="{{ route('front.category' , $category) }}">
                {{ $category->name }}</a>
              @endforeach
            </div>
          </div>
        </li>

        @guest
        <li class="nav-item">
          <a href="{{ url('/login') }}" class="nav-link"><i class="nc-icon nc-book-bookmark"></i> Login</a>
        </li>

        <li class="nav-item">
          <a href="{{ url('/register') }}" class="nav-link"><i class="nc-icon nc-book-bookmark"></i> Register</a>
        </li>
        @else

        <li class="nav-item">
          <div class="dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown"
              aria-haspopup="true" aria-expanded="false">
              {{ Auth::user()->name }}
            </a>

            <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

              @if ( auth()->user()->group == 'admin' )
               <a href="{{ route('admin.home') }}" class="dropdown-item">Dashboard</a>
              @endif


              <a href="{{ route('front.profile' , auth()->user()->id)}}" class="dropdown-item">Profile</a>
              <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                      document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
              </a>

              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
              </form>
            </div>
          </div>
        </li>

        @endguest
        <li>
          <form action="{{ route('home')}}" class="form-inline ml-auto" style="margin-top: 15px">
            <div class="form-group has-white">
              <input type="text" name="search" class="form-control" placeholder="Search">
            </div>
          </form>
        </li>
      </ul>
    </div>
  </div>
</nav>