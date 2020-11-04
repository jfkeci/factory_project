<div style="margin-bottom: 70px">
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand pl-5" href="{{ url('/') }}">
    {{ config('app.name', 'JelaSvijeta') }}
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
       <ul class="navbar-nav mr-auto">
          <li class="nav-item">
             <a class="nav-link" href="/jela">Jela</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="/sastojci">Sastojci</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="/about">About</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="/jela/create">Dodaj novo jelo</a>
          </li>
       </ul>
       <ul class="nav navbar-nav navbar-right">
          <!-- Authentication Links -->
          @if (Auth::guest())
          <li><a class="pr-3" href="{{ route('login') }}">Login</a></li>
          <li><a class="pr-5" href="{{ route('register') }}">Register</a></li>
          @else
            <li class="nav-item  pr-2">
               <a class="nav-link" href="/dashboard">{{ Auth::user()->name }}</a>
            </li>
            <li class="nav-item pt-2 pr-5">
               <a lass="nav-link " href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                  document.getElementById('logout-form').submit();">
               Logout
               </a>
               <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  {{ csrf_field() }}
               </form>
            </li>
          @endif
         </ul>
    </div>
  </nav>
</div>
