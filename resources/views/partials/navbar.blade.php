<nav class="navbar navbar-expand-lg main-navbar">
  <form class="form-inline mr-auto">
    <ul class="navbar-nav mr-3">
      <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
    </ul>
  </form>

  <ul class="navbar-nav navbar-right">
    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
        <img alt="image" src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&background=random" alt="profile_image" class="rounded-circle mr-1">
        <div class="d-sm-none d-lg-inline-block">Hi, {{ Auth::user()->name }}</div>
      </a>
      <div class="dropdown-menu dropdown-menu-right pr-3">
        <button onclick="alert()" class="btn btn-outline-danger btn-block mx-2"><i class="fa fa-fw fa-power-off text-red mr-2"></i>Logout</button>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
        </form>
      </div>
    </li>
  </ul>

</nav>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  function alert() {
    Swal.fire({
      title: 'Logout',
      text: "Apakah anda yakin untuk keluar dari website?",
      icon: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Yes'
    }).then((result) => {
      if (result.isConfirmed) {
        document.getElementById('logout-form').submit();
      }
    })
  }
</script>