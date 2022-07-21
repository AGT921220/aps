<li class="dropdown user user-menu">
    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
      <img src="{{ asset(auth()->user()->user_profile) }}" class="user-image" alt="User Image">
      <span class="hidden-xs">{{ Auth::user()->name }} </span>
    </a>
    <ul class="dropdown-menu">
      <!-- User image -->
      <li class="user-header">
        <img src="{{ asset(auth()->user()->user_profile) }}" class="img-circle" alt="User Image">

        <p>{{ Auth::user()->name }}</p>
      </li>

      <!-- Menu Footer-->
      <li class="user-footer">
        <div class="pull-left">
        </div>
        <div class="pull-right">
          <a class="btn btn-default btn-flat" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        Cerrar Sesión
       </a>

       <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
           @csrf
       </form>

        </div>
      </li>
    </ul>
  </li>
