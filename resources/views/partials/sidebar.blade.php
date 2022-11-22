{{-- @switch($menu)
    @case('home')
        @php
            $home = 'active';
            $dataalumni = '';
            $dataadmin = '';
        @endphp
        @break
    @case('dataalumni')        
        @php
            $home = '';
            $dataalumni = 'active';
            $dataadmin = '';
        @endphp
        @break
    @case('dataadmin')        
        @php
            $home = '';
            $dataalumni = '';
            $dataadmin = 'active';
        @endphp
        @break
    @default
        
@endswitch --}}
<div class="main-sidebar">
    <aside id="sidebar-wrapper">
      <div class="sidebar-brand">
        <a href="/home">Monitoring</a>
      </div>
      <div class="sidebar-brand sidebar-brand-sm">
        <a href="/home">WMU</a>
      </div>
      <ul class="sidebar-menu">
          <li class="menu-header">Menu Navigation</li>
          {{-- <li class="nav-link {{ $home }}"><a class="nav-link" href="/home"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
          <li class="nav-link {{ $dataalumni }}"><a class="nav-link" href="/alumni"><i class="fas fa-folder-open"></i> <span>Data Ujian</span></a></li>
          <li class="nav-link {{ $dataalumni }}"><a class="nav-link" href="/alumni"><i class="fas fa-folder-open"></i> <span>Data Siswa</span></a></li>
          <li class="nav-link {{ $dataadmin }}"><a class="nav-link" href="/users"><i class="fas fa-user-cog"></i> <span>Data Admin</span></a></li> --}}

          <li class="nav-link"><a class="nav-link" href="/home"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
          <li class="nav-link "><a class="nav-link" href="/ujian"><i class="fas fa-folder-open"></i> <span>Data Ujian</span></a></li>
          <li class="nav-link "><a class="nav-link" href="/siswa"><i class="fas fa-users"></i></i> <span>Data Siswa</span></a></li>
          <li class="nav-link "><a class="nav-link" href="/admin"><i class="fas fa-user-cog"></i> <span>Data Admin</span></a></li>

          
          {{-- <li class="nav-item">
            <a href="/home"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            <a href="/alumni"><i class="fas fa-folder-open"></i><span>Data Alumni</span></a>
            <a href="/admin"><i class="fas fa-user-cog"></i><span>Data Admin</span></a>
          </li> --}}
        </ul>
    </aside>
  </div>