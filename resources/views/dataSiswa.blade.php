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
    @if ($message = Session::get('denied_message'))
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

                        <h1>Data Siswa</h1>

                        <button type="button" class="btn btn-primary my-4" data-toggle="modal" data-target="#addDataSiswa"> <i class="fas fa-user-plus"></i></button>

                        <table class="table table-hover table-bordered table-stripped" id="alumni">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Siswa</th>
                                    <th>Jenis Kelamin</th>
                                    <th>E-mail</th>
                                    <th>Telepon</th>
                                    <th>Alamat</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>

                            @php
                            $count = 1;
                            @endphp

                            @foreach ($siswas as $data)

                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->gender }}</td>
                                <td>{{ $data->email }}</td>
                                <td>{{ $data->phone }}</td>
                                <td>{{ $data->address }}</td>
                                <td>
                                    <a href=# class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editDataSiswa{{ $data->id }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{route('siswa.destroy', $data)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>

                            <!-- Modal Edit Siswa -->
                            <div class="modal fade" id="editDataSiswa{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="editDataSiswaLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editDataSiswaLabel">Edit Data Siswa</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            </button>
                                        </div>
                                        <form action="{{ url('siswa/'. $data->id ) }}" method="POST">
                                            @method('PUT')
                                            @csrf

                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="exampleInputNamaSiswa">Nama Siswa</label>
                                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputSiswa" placeholder="Nama Siswa" name="name" value="{{$data->name ?? old('name')}}" required>
                                                    @error('name') <span class="text-danger">{{$message}}</span> @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputJenisKelamin">Jenis Kelamin</label>
                                                    <select class="custom-select @error('gender') is-invalid @enderror" id="exampleInputJenisKelamin" name="gender" value="{{old('gender')}}" required>
                                                        @if ($data->gender == 'Laki-Laki')
                                                        <option value="Laki-Laki" selected>Laki-Laki</option>
                                                        <option value="Perempuan">Perempuan</option>
                                                        @elseif ($data->gender == 'Perempuan')
                                                        <option value="Laki-Laki">Laki-Laki</option>
                                                        <option value="Perempuan" selected>Perempuan</option>
                                                        @endif
                                                    </select>
                                                    @error('gender') <span class="text-danger">{{$message}}</span> @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputEmail">E-mail</label>
                                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Email" name="email" value="{{$data->email ?? old('email')}}" required>
                                                    @error('email') <span class="text-danger">{{$message}}</span> @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputTelepon">Telepon</label>
                                                    <input type="text" class="form-control @error('phone') is-invalid @enderror" id="exampleInputTelepon" placeholder="Masukkan Tanggal Ujian" name="phone" value="{{$data->phone ?? old('phone')}}" required>
                                                    @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputAlamat">Alamat</label>
                                                    <input type="text" class="form-control @error('address') is-invalid @enderror" id="exampleInputAlamat" placeholder="Masukkan Alamat" name="address" value="{{$data->address ?? old('address')}}" required>
                                                    @error('address') <span class="text-danger">{{$message}}</span> @enderror
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
<div class="modal fade" id="addDataSiswa" tabindex="-1" role="dialog" aria-labelledby="addDataSiswaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataSiswaLabel">Tambah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="{{ url('siswa') }}" method="POST">
                @csrf

                <div class="modal-body">
                    <div class="form-group">
                        <label for="exampleInputNamaSiswa">Nama Siswa</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="exampleInputSiswa" placeholder="Nama Siswa" name="name" value="{{old('name')}}" required>
                        @error('name') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputJenisKelamin">Jenis Kelamin</label>
                        <select class="custom-select @error('gender') is-invalid @enderror" id="exampleInputJenisKelamin" name="gender" value="{{old('gender')}}" required>
                            <option selected hidden value="">Pilih jenis kelamin</option>
                            <option value="Laki-Laki">Laki-Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        @error('gender') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail">E-mail</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Email" name="email" value="{{old('email')}}" required>
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputTelepon">Telepon</label>
                        <input type="text" class="form-control @error('phone') is-invalid @enderror" id="exampleInputTelepon" placeholder="Masukkan Nomer Telepon" name="phone" value="{{old('phone')}}" required>
                        @error('phone') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="exampleInputAlamat">Alamat</label>
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="exampleInputAlamat" placeholder="Masukkan Alamat" name="address" value="{{old('address')}}" required>
                        @error('address') <span class="text-danger">{{$message}}</span> @enderror
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
                "targets": [6],
                "orderable": false
            },
            {
                "targets": [0, 6],
                "className": "text-center"
            },
            {
                "width": "130px",
                "targets": 6
            },
        ],
        dom: 'Bfrtip',
        buttons: [{
                extend: 'pdf',
                text: '<i class="fa fa-file-pdf text-danger"></i> PDF',
                title: 'Daftar siswa',
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
                title: 'Daftar Siswa',
                exportOptions: {
                    columns: ':visible'
                },
                messageTop: ''
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print text-info" > </i> PRINT',
                title: 'Daftar siswa',
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