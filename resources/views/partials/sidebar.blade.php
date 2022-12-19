@switch($menu)
@case('Home - Proctor AI')
@php
$home = 'active';
$ujian = '';
$siswa = '';
$admin = '';
@endphp
@break
@case('Monitoring Ujian - Proctor AI')
@php
$home = 'active';
$ujian = '';
$siswa = '';
$admin = '';
@endphp
@break
@case('Data Ujian - Proctor AI')
@php
$home = '';
$ujian = 'active';
$siswa = '';
$admin = '';
@endphp
@break
@case('Peserta Ujian - Proctor AI')
@php
$home = '';
$ujian = 'active';
$siswa = '';
$admin = '';
@endphp
@break
@case('Data Siswa - Proctor AI')
@php
$home = '';
$ujian = '';
$siswa = 'active';
$admin = '';
@endphp
@break
@case('Data Admin - Proctor AI')
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
            <a href="/home">
                <img src="{{ url('assets/images/logo-light.png') }}" width="40" alt="">
                Proctor AI
            </a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="/home">
                <img src="{{ url('assets/images/logo-light.png') }}" width="40" alt="">
            </a>
        </div>
        <ul class="sidebar-menu mt-4">
            <li class="nav-link {{ $home }}"><a class="nav-link" href="/home"><i class="fas fa-fire"></i> <span>Dashboard</span></a></li>
            <li class="nav-link {{ $ujian }}"><a class="nav-link" href="/ujian"><i class="fas fa-folder-open"></i> <span>Data Ujian</span></a></li>
            <li class="nav-link {{ $siswa }}"><a class="nav-link" href="/siswa"><i class="fas fa-users"></i> <span>Data Siswa</span></a></li>
            <li class="nav-link {{ $admin }}"><a class="nav-link" href="/admin"><i class="fas fa-user-cog"></i> <span>Data Admin</span></a></li>
        </ul>
    </aside>
</div>