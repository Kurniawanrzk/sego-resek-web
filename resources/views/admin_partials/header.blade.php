<header class="">
    <nav class="navbar navbar-expand-lg navbar-light bg-light shadow">
        <div class="container">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link {{ (request()->is('admin/dashboard')) ? 'active' : '' }}" aria-current="page" href="{{Route("admin_dashboard")}}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ (request()->is('admin/menu')) ? 'active' : '' }}" aria-current="page" href="{{Route("get_all_menu")}}">Menu</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ (request()->is('admin/komen')) ? 'active' : '' }}" aria-current="page" href="{{Route("get_all_komen")}}">Komen</a>
              </li>
              <li class="nav-item">
                <a class="nav-link {{ (request()->is('admin/kasir')) ? 'active' : '' }}" aria-current="page" href="{{Route("kasir_page")}}">Kasir</a>
              </li>
            </ul>
            <span class="navbar-text">
              <form action="{{Route("admin_logout")}}" method="POST">
                @csrf
                @method("POST")
                <button type="submit" class="btn btn-danger">Logout</button>
              </form>
            </span>
          </div>
        </div>
      </nav>
</header>
