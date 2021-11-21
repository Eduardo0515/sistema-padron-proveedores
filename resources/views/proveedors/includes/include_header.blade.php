  <!-- Navbar -->
  <nav class="navbar navbar-expand navbar-dark navbar-red">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
          <li class="nav-item d-none d-sm-inline-block">
              <a href="{{ route('proveedor.home') }}" class="nav-link">Inicio</a>
          </li>
          <li class="nav-item d-none d-sm-inline-block">
              <a href="{{ route('proveedor.info') }}" class="nav-link">Mi información</a>
          </li>
      </ul>

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto">
          <li class="nav-item">
              <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                  <i class="fas fa-expand-arrows-alt"></i>
              </a>
          </li>
          <li class="nav-item">
              <a class="nav-link" href="{{ route('logout') }}"
                  onclick="event.preventDefault(); document.getElementById('logout-form').submit();" role="button">
                  <i class="fas fa-sign-out-alt"></i>
              </a>
          </li>
          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              {{ csrf_field() }}
          </form>
      </ul>
  </nav>
  <!-- /.navbar -->
