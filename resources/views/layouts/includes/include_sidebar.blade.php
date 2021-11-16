  <aside class="main-sidebar elevation-4 sidebar-light-indigo">
    <!-- sidebar: style can be found in sidebar.less -->
    
    <a href="{{ url('/inicio') }}" class="brand-link navbar-red logo-switch">
      <img src="{{ asset('img/logo_header_mini.png') }}" class="brand-image-xl logo-xs">
      <img src="{{ asset('img/logo_header.png') }}" class="brand-image-xs logo-xl" style="left: 12px">
    </a>
    <div class="sidebar">
      <!-- Sidebar user panel -->

      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="data:image/png;base64,{{ Auth::user()->img_avatar }}" onError="this.onerror=null;this.src='{{ asset('img/avatar-default.png') }}'" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">{{ Auth::user()->nombre }}<br>{{ Auth::user()->apellidos }}</a>
        </div>
      </div>
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        
        @foreach ($menus as $key => $item)
          @if ($item['parentid'] != 0)
            @break
          @endif
          @include('layouts.includes.menu-item-menu', ['item' => $item])
        @endforeach
        </ul>
      </nav>
    </div>
    <!-- /.sidebar -->
  </aside>