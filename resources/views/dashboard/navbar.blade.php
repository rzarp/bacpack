 <form class="form-inline mr-auto">
  <ul class="navbar-nav mr-3">
    <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
  </ul>
  <div class="search-element">
    <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="250">
    <button class="btn" type="submit"><i class="fas fa-search"></i></button>
    <div class="search-backdrop"></div>
  </div>
  </form>
  @if (Auth::check())
  <ul class="navbar-nav navbar-right">
    <a href="{{route('data.detail')}}" class="nav-link nav-link-lg"><i class="far fa-bell"></i></a>
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
    
      <img alt="image" src="{{asset(Auth::user()->gambar)}}" class="rounded-circle mr-1" aria-expanded="false" v-pre>
      <div class="d-sm-none d-lg-inline-block">{{ Auth::user()->name }}</div></a>
      <div class="dropdown-menu dropdown-menu-right">
        <div class="dropdown-title">Logged in 5 min ago</div>
        <a href="/" class="dropdown-item has-icon">
          <i class="fas fa-home"></i> home
        </a>
        <a href="{{route('setting.user')}}" class="dropdown-item has-icon">
          <i class="far fa-user"></i> Setting
        </a>
        <div class="dropdown-divider"></div>
        <a href="{{ route('logout') }}" class="dropdown-item has-icon text-danger"  onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
          {{ __('Logout') }} 
          
          <i class="fas fa-sign-out-alt"></i></a>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form> 
      </div>
    </li>  
  </ul>
  @else
    <ul class="navbar-nav navbar-right">
      <a href="{{ route('login') }}" class="nav-link nav-link-lg">Login</a> |
      <a href="{{ route('register') }}" class="nav-link nav-link-lg">Register</a> 
    </ul>
  @endif



      
     
      

      