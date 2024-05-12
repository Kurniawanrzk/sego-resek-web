<header class="" style="background-color:#fcf5e1">
    <nav class="navbar navbar-expand-lg navbar-light shadow" >
        <div class="container">
          <a class="navbar-brand" href="{{Route("home")}}"><img src="assets/img/logo-nav.png" width="100" alt=""></a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a href="{{Route("home")}}" class="nav-link {{ (request()->is('/')) ? 'active' : '' }}" aria-current="page" >Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ (request()->is('about')) ? 'active' : '' }}" href="about" aria-current="page">About</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ (request()->is('menu')) ? 'active' : '' }}" href="{{Route("menu")}}" aria-current="page">Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ (request()->is('komentar')) ? 'active' : '' }}" href="{{Route("komentar")}}" aria-current="page">Komentar</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
</header>
