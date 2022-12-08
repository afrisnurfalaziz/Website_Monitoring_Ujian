@switch($menu)
@case('Home - Web Monitoring')
@php
$home = 'active';
$ujian = '';
$siswa = '';
$admin = '';
@endphp
@break
@case('Monitoring Ujian - Web Monitoring')
@php
$home = 'active';
$ujian = '';
$siswa = '';
$admin = '';
@endphp
@break
@case('Data Ujian - Web Monitoring')
@php
$home = '';
$ujian = 'active';
$siswa = '';
$admin = '';
@endphp
@break
@case('Peserta Ujian - Web Monitoring')
@php
$home = '';
$ujian = 'active';
$siswa = '';
$admin = '';
@endphp
@break
@case('Data Siswa - Web Monitoring')
@php
$home = '';
$ujian = '';
$siswa = 'active';
$admin = '';
@endphp
@break
@case('Data Admin - Web Monitoring')
@php
$home = '';
$ujian = '';
$siswa = '';
$admin = 'active';
@endphp
@break
@default

@endswitch
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
            <li class="nav-link {{ $home }}"><a class="nav-link" href="/home"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <li class="nav-link {{ $ujian }}"><a class="nav-link" href="/ujian"><i class="fas fa-folder-open"></i> <span>Data Ujian</span></a></li>
            <li class="nav-link {{ $siswa }}"><a class="nav-link" href="/siswa"><i class="fas fa-users"></i> <span>Data Siswa</span></a></li>
            <li class="nav-link {{ $admin }}"><a class="nav-link" href="/admin"><i class="fas fa-user-cog"></i> <span>Data Admin</span></a></li>

            <!-- <li class="nav-link {{ $admin }}">
                <button onclick="alert()" class="btn btn-outline-danger btn-block mx-2"><i class="fa fa-fw fa-power-off text-red mr-2"></i>Logout</button>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </li> -->
        </ul>
    </aside>
</div>