<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">Bernd</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">Be</a>
          </div>
          <ul class="sidebar-menu">

              <li class="">
                <a class="nav-link" href="{{ route('fakultas.index') }}"><i class="far fa-square"></i> <span>Fakultas</span></a>
              </li>
              <li class="">
                <a class="nav-link" href="{{ route('jurusan.index') }}"><i class="far fa-square"></i> <span>Jurusan</span></a>
              <li class="">
                <a class="nav-link" href="{{ route('ruangan.index') }}"><i class="far fa-square"></i> <span>Ruangan</span></a>
              </li>
              <li class="">
                <a class="nav-link" href="{{ route('barang.index') }}"><i class="far fa-square"></i> <span>Barang</span></a>
              </li>
          </ul>
        </aside>
      </div>