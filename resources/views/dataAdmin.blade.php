@extends('layouts.main')

@section('content')

@include('core');

<section class="">
    @if ($message = Session::get('Delete'))
    <script>
        Swal.fire(
            'Deleted!',
            '{{ $message }}',
            'success'
        )
    </script>
    @endif
    @if ($message = Session::get('save_message'))
    <script>
        Swal.fire(
            'Tersimpan!',
            '{{ $message }}',
            'success'
        )
    </script>
    @endif
    @if ($message = Session::get('success_message'))
    <script>
        Swal.fire(
            'Tersimpan!',
            '{{ $message }}',
            'success'
        )
    </script>
    @endif
    @if ($message = Session::get('error_message'))
    <script>
        Swal.fire(
            'Gagal!',
            '{{ $message }}'
        )
    </script>
    @endif

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="class-body">
                    <div class="container mt-5 mb-5">
                        <h1>Data Admin</h1>

                        <button type="button" class="btn btn-primary my-4" data-toggle="modal" data-target="#addDataAdmin"> <i class="fas fa-user-plus"></i></button>

                        <table class="table table-hover table-bordered table-stripped" id="alumni">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama</th>
                                    <th>E-mail</th>
                                    <th>Telepon</th>
                                    <th>Role</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>

                            @php
                            $count = 1;
                            @endphp

                            @foreach ($admins as $data)

                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->phone }}</td>
                                <td>
                                    @if ($data->role == 1)
                                    Super Admin
                                    @elseif ($data->role == 0)
                                    Admin
                                    @endif
                                </td>

                                <td>
                                    <a href=# class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editDataAdmin{{ $data->id }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{route('admin.destroy', $data)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>

                            <!-- Modal Edit Admin -->
                            <div class="modal fade" id="editDataAdmin{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="editDataAdminLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editDataAdminLabel">Edit Data Admin</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            </button>
                                        </div>
                                        <form action="{{ url('admin/'. $data->id ) }}" method="POST">
                                            @method('PUT')
                                            @csrf

                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="exampleInputNamaAdmin">Nama Admin</label>
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputNamaAdmin" placeholder="Nama Admin" name="name" value="{{$data->name ?? old('name')}}" required>
                                                    @error('name') <span class="text-danger">{{$message}}</span> @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail">E-mail</label>
                                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Email" name="email" value="{{$data->email ?? old('email')}}" required>
                                                    @error('email') <span class="text-danger">{{$message}}</span> @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputTelepon">Telepon</label>
                                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="exampleInputTelepon" placeholder="Masukkan Nomer Telepon" name="phone" value="{{$data->phone ?? old('phone')}}" required>
                                                    @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="role">Role</label>
                                                    <select class="form-control" name="role" id="role" required>
                                                        @if ($data->role == 1)
                                                        <option value="1" selected>Super Admin</option>
                                                        <option value="2">Admin</option>
                                                        @elseif ($data->role == 0)
                                                        <option value="1">Super Admin</option>
                                                        <option value="2" selected>Admin</option>
                                                        @endif
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="submit" class="btn btn-primary">Simpan</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>

<!-- Modal create Siswa -->
<div class="modal fade" id="addDataAdmin" tabindex="-1" role="dialog" aria-labelledby="addDataAdminLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataAdminLabel">Tambah Data Admin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="{{ url('admin') }}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label for="exampleInputNamaAdmin">Nama Admin</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputNamaAdmin" placeholder="Nama Admin" name="name" value="{{old('name')}}" required>
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">E-mail</label>
                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Email" name="email" value="{{old('email')}}" required>
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputTelepon">Telepon</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="exampleInputTelepon" placeholder="Masukkan Tanggal Ujian" name="phone" value="{{old('phone')}}" required>
                        @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="role">Role</label>
                        <select class="form-control" name="role" id="role" required>
                            <option value="1">Super Admin</option>
                            <option value="0" selected>Admin</option>
                        </select>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                        <div class="col-md-6">
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('#alumni').DataTable({
        "order": [
            [0, 'asc']
        ],
        "columnDefs": [{
                "targets": [5],
                "orderable": false
            },
            {
                "targets": [0, 5],
                "className": "text-center"
            },
            {
                "width": "130px",
                "targets": 5
            },
        ],
        dom: 'Bfrtip',
        buttons: [{
                extend: 'pdf',
                text: '<i class="fa fa-file-pdf text-danger"></i> PDF',
                title: 'Daftar Admin',
                exportOptions: {
                    columns: ':visible'
                },
                messageTop: '',
                orientation: 'portrait',
                pageSize: 'A4'
            },
            {
                extend: 'excel',
                text: '<i class="fa fa-file-excel text-success" > </i> EXCEL',
                title: 'Daftar Admin',
                exportOptions: {
                    columns: ':visible'
                },
                messageTop: ''
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print text-info" > </i> PRINT',
                title: 'Daftar Admin',
                exportOptions: {
                    columns: ':visible'
                },
                messageTop: '',
            },
            {
                extend: 'colvis',
                text: '<i class="fa fa-table" > </i> Columns',
                postfixButtons: ['colvisRestore']
            },
        ],

        "dom": "<'row'<'col-sm-12 col-md-2'l><'col-sm-12 col-md-6'B><'col-sm-12 col-md-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>"

    });

    function notificationBeforeDelete(event, el) {
        event.preventDefault();
        Swal.fire({
            title: 'Apakah Anda yakin ?',
            text: "Jika dihapus, data ini tidak akan bisa dikembalian!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, hapus sekarang!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        })
    }
</script>
@endsection