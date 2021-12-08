  <aside class="main-sidebar elevation-4 sidebar-light-indigo">
      <!-- sidebar: style can be found in sidebar.less -->

      <a href="{{ route('proveedor.home') }}" class="brand-link navbar-red logo-switch">
          <img src="{{ asset('img/logo_header_mini.png') }}" class="brand-image-xl logo-xs">
          <img src="{{ asset('img/logo_header.png') }}" class="brand-image-xs logo-xl" style="left: 12px">
      </a>
      <div class="sidebar">
          <!-- Sidebar user panel -->

          <div class="user-panel mt-3 pb-3 mb-3 d-flex">
              <div class="image">
                  <img src="data:image/png;base64,{{ Auth::user()->img_avatar }}"
                      onError="this.onerror=null;this.src='{{ asset('img/avatar-default.png') }}'"
                      class="img-circle elevation-2" alt="User Image">
              </div>
              <div class="info">
                  <a href="#" class="d-block">{{ Auth::user()->rfc }}</a>
              </div>
          </div>
          <nav class="mt-2">
              <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                  data-accordion="false">

                  <li class="nav-item">
                      <a href="{{ route('proveedor.info') }}" class="nav-link"><i class="nav-icon fas fa-user"></i>
                          <p>Mi información</p>
                      </a>
                  </li>
                  <li class="nav-item">
                      <a href="{{ route('solicitud.index') }}" class="nav-link"><i class="nav-icon fab fa-wpforms"></i>
                          <p>Solicitudes</p>
                      </a>
                  </li>
                  
              </ul>
          </nav>
      </div>
      <!-- /.sidebar -->
  </aside>
