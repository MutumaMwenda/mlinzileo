<!--Navbar-->
<nav class="navbar navbar-expand-lg navbar-dark primary-color">

  <!-- Navbar brand -->
  <a class="navbar-brand" href="#">Mlinzi Leo</a>

  <!-- Collapse button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#basicExampleNav"
    aria-controls="basicExampleNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <!-- Collapsible content -->
  <div class="collapse navbar-collapse" id="basicExampleNav">

    <!-- Links -->
    <ul class="navbar-nav mr-auto">
       @guest
        <li class="nav-item">
        
      </li>

       @else
      <li class="nav-item active">
        <a class="nav-link" href="{{ url('/')}}">Home
          <span class="sr-only">(current)</span>
        </a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link" href="{{ url('/create')}}">Students</a>
      </li> -->
       <li class="nav-item">
        <a class="nav-link" href="{{ url('/station_index')}}">Stations</a>
      </li>
       <li class="nav-item">
        <a class="nav-link" href="{{ url('/personnel_index')}}">Personnel</a>
      </li>
       @endguest
      <!--  <li class="nav-item">
        <a class="nav-link" href="{{ url('/incidence_index')}}">Incidences</a>
      </li> -->

 <!-- <li class="nav-item">
        <a class="nav-link" href="{{ url('/create')}}">Add</a>
      </li> -->
      <!-- Dropdown 
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown"
          aria-haspopup="true" aria-expanded="false">Dropdown</a>
        <div class="dropdown-menu dropdown-primary" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Action</a>
          <a class="dropdown-item" href="#">Another action</a>
          <a class="dropdown-item" href="#">Something else here</a>
        </div>
      </li> -->

    </ul>
    <!-- Links -->

    <form class="form-inline">
      <div class="md-form my-0">
        @if (Auth::check()) 
          <input class="form-control mr-sm-2" type="text" placeholder="Search..." aria-label="Search">
      
      @endif
      
      </div>
    </form>
       <ul class="nav navbar-nav navbar-right " style="padding-right: 20px;">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item"><a  class="nav-link" href="{{ route('login') }}">Login</a></li>
                   <!--  <li><a href="{{ route('register') }}">Register</a></li> -->
                @else
                    <li class="dropdown nav-item">
                        <a href="#" class="nav-link" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"
                           aria-haspopup="true">


                            {{ Auth::user()->name }} <span class="caret"><i class="fa fa-caret-down caret"></i></span>
                        </a>

                        <ul class="dropdown-menu" style="background: blue; height: 50px; width: 60px;">
                            <li class="nav-item" >
                                <a class="nav-link" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    Logout
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>
  </div>
  <!-- Collapsible content -->

</nav>
<!--/.Navbar-->