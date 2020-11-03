
  <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent"></div>
        <div>
          <ul class="nav navbar-nav">
            <li class="pl-3"><a href="/jela">Recepti</a></li>
            <li class="pl-3"><a href="/sastojci">Sastojci</a></li>
            <li class="pl-3"><a href="/about">About</a></li>
            <li class="pl-3"><a href="#">Dodaj novo jelo</a></li>
          </ul>
        </div>
    </div>
</nav>