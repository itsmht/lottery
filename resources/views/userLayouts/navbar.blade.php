<header class="header_section">
    <div class="container-fluid">
      <nav class="navbar navbar-expand-lg custom_nav-container ">
        <a href="{{route('home')}}">
          <img src="../../assets1/images/logo.jpg" style="height:80px; width:160px;" alt="" />
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <div class="d-flex ml-auto flex-column flex-lg-row align-items-center">
            <ul class="navbar-nav  ">
              <li class="nav-item active">
                <a class="nav-link" href="{{route('home')}}">Home </a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="{{route('about')}}"> About </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('packages')}}"> Packages </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('contact')}}"> Contact </a>
              </li>
              @if(session()->has('logged'))
              <li class="nav-item">
                <a class="nav-link" href="{{route('userProfile')}}"> Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{route('logout')}}"> Logout</a>
              </li>
              @else
              <li class="nav-item">
                <a class="nav-link" href="{{route('login')}}"> Login</a>
              </li>
              @endif
              
            </ul>
            <div class="user_option">
              
            </div>
          </div>
        </div>
      </nav>
    </div>
  </header>