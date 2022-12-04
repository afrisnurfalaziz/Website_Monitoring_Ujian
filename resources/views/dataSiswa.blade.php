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

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="class-body">
                    <div class="container mt-5 mb-5">

                        <h1>Data Siswa</h1>

                        {{-- add --}}
                        <button type="button" class="btn btn-primary my-4" data-toggle="modal" data-target="#addDataSiswa"> <i class="fas fa-user-plus"></i></button>

                        <table class="table table-hover table-bordered table-stripped" id="alumni">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nomer Induk</th>
                                    <th>Nama Siswa</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Telepon</th>
                                    <th>Alamat</th>
                                    <th>E-mail</th>
                                    <th>Opsi</th>
                                    {{-- <th>Opsi</th> --}}
                                </tr>
                            </thead>


                            {{-- tes data --}}

                            @php
                            $count = 1;
                            @endphp
                            @foreach ($siswas as $data)

                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $data->nomer_induk }}</td>
                                <td>{{ $data->nama_siswa }}</td>
                                <td>{{ $data->jenis_kelamin }}</td>
                                <td>{{ $data->telepon }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ $data->email }}</td>

                                <td>
                                    <a href=# class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editDataSiswa{{ $data->id }}">
                                        Edit
                                    </a>
                                    <a href="{{route('siswa.destroy', $data)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                            </tr>

                            {{-- Modal Edit Siswa --}}
                            <div class="modal fade" id="editDataSiswa{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="editDataSiswaLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editDataSiswaLabel">Edit Data Siswa</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ url('siswa/'. $data->id ) }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal-body">
                                                {{-- nomer induk --}}
                                                <div class="form-group">
                                                    <label for="exampleInputNoInduk">No. Induk</label>
                                                    <input type="text" class="form-control @error('no_induk') is-invalid @enderror" id="exampleInputNoInduk" placeholder="Nomer Induk" name="nomer_induk" value="{{$data->nomer_induk ?? old('nomer_induk')}}">
                                                    @error('nomer_induk') <span class="text-danger">{{$message}}</span> @enderror
                                                </div>

                                                {{-- nama siswa --}}
                                                <div class="form-group">
                                                    <label for="exampleInputNamaSiswa">Nama Siswa</label>
                                                    <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror" id="exampleInputSiswa" placeholder="Nama Siswa" name="nama_siswa" value="{{$data->nama_siswa ?? old('nama_siswa')}}">
                                                    @error('nama_siswa') <span class="text-danger">{{$message}}</span> @enderror
                                                </div>

                                                {{-- Jenis Kelamin --}}
                                                <div class="form-group">
                                                    <label for="exampleInputJenisKelamin">Jenis Kelamin</label>
                                                    <input type="text" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="exampleInputJenisKelamin" placeholder="Masukkan Jenis Kelamin" name="jenis_kelamin" value="{{$data->jenis_kelamin ?? old('jenis_kelamin')}}">
                                                    @error('jenis_kelamin') <span class="text-danger">{{$message}}</span> @enderror
                                                </div>

                                                {{-- telepon --}}
                                                <div class="form-group">
                                                    <label for="exampleInputTelepon">Telepon</label>
                                                    <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="exampleInputTelepon" placeholder="Masukkan Tanggal Ujian" name="telepon" value="{{$data->telepon ?? old('telepon')}}">
                                                    @error('telepon') <span class="text-danger">{{$message}}</span> @enderror
                                                </div>

                                                {{-- alamat --}}
                                                <div class="form-group">
                                                    <label for="exampleInputAlamat">Alamat</label>
                                                    <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="exampleInputAlamat" placeholder="Masukkan Alamat" name="alamat" value="{{$data->alamat ?? old('alamat')}}">
                                                    @error('alamat') <span class="text-danger">{{$message}}</span> @enderror
                                                </div>

                                                {{-- email --}}
                                                <div class="form-group">
                                                    <label for="exampleInputEmail">E-mail</label>
                                                    <input type="text" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Email" name="email" value="{{$data->email ?? old('email')}}">
                                                    @error('email') <span class="text-danger">{{$message}}</span> @enderror
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary">Save changes</button>
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

{{-- Modal create Siswa --}}
<div class="modal fade" id="addDataSiswa" tabindex="-1" role="dialog" aria-labelledby="addDataSiswaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataSiswaLabel">Tambah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{ url('siswa') }}" method="POST">
                    @csrf

                    {{-- nomer induk --}}
                    <div class="form-group">
                        <label for="exampleInputNoInduk">No. Induk</label>
                        <input type="text" class="form-control @error('no_induk') is-invalid @enderror" id="exampleInputNoInduk" placeholder="Nomer Induk" name="nomer_induk" value="{{old('nomer_induk')}}">
                        @error('nomer_induk') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    {{-- nama siswa --}}
                    <div class="form-group">
                        <label for="exampleInputNamaSiswa">Nama Siswa</label>
                        <input type="text" class="form-control @error('nama_siswa') is-invalid @enderror" id="exampleInputSiswa" placeholder="Nama Siswa" name="nama_siswa" value="{{old('nama_siswa')}}">
                        @error('nama_siswa') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    {{-- Jenis Kelamin --}}
                    <div class="form-group">
                        <label for="exampleInputJenisKelamin">Jenis Kelamin</label>
                        <input type="text" class="form-control @error('jenis_kelamin') is-invalid @enderror" id="exampleInputJenisKelamin" placeholder="Masukkan Jenis Kelamin" name="jenis_kelamin" value="{{old('jenis_kelamin')}}">
                        @error('jenis_kelamin') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    {{-- telepon --}}
                    <div class="form-group">
                        <label for="exampleInputTelepon">Telepon</label>
                        <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="exampleInputTelepon" placeholder="Masukkan Nomer Telepon" name="telepon" value="{{old('telepon')}}">
                        @error('telepon') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    {{-- alamat --}}
                    <div class="form-group">
                        <label for="exampleInputAlamat">Alamat</label>
                        <input type="text" class="form-control @error('alamat') is-invalid @enderror" id="exampleInputAlamat" placeholder="Masukkan Alamat" name="alamat" value="{{old('alamat')}}">
                        @error('alamat') <span class="text-danger">{{$message}}</span> @enderror
                    </div>

                    {{-- email --}}
                    <div class="form-group">
                        <label for="exampleInputEmail">E-mail</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="exampleInputEmail" placeholder="Masukkan Email" name="email" value="{{old('email')}}">
                        @error('email') <span class="text-danger">{{$message}}</span> @enderror
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
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
                "targets": [0, 7],
                "className": "text-center"
            },
            {
                "width": "130px",
                "targets": 7
            },
            // { "width": "75px", "targets": 1 },
            // { "width": "65px", "targets": 3 },
            // { "width": "50px", "targets": 4 },
            // { "width": "80px", "targets": 5 },
            // { "width": "145px", "targets": 6 },
            // { "width": "165px", "targets": 7 }
        ],
        // "language": {
        //     // "lengthMenu": "<div class='text-info'>MENU Baris </div>",
        //     // "lengthMenu": "<div class='text-info'>Tampilkan MENU baris</div>",
        //     "zeroRecords": "Data tidak ditemukan!",
        //     "info": "<div class='text-info font-weight-normal'>Halaman PAGE dari PAGES</div>",
        //     "infoEmpty": "Tidak ditemukan Data",
        //     "infoFiltered": "(filtered from  MAX total data)",
        //     "search":         "<span class='text-info '><i class='fa fa-search'></i>  Cari data: </span>",
        // },
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
            // {
            // text: '<i class="fas fa-user-plus text-teal"> </i> TAMBAH DATA',
            // action: function ( e, dt, node, config ) {
            //     $('#btnmodaladdAlumni').click();
            //     }
            // }
        ],
        // membuat kolom

        "dom": "<'row'<'col-sm-12 col-md-2'l><'col-sm-12 col-md-6'B><'col-sm-12 col-md-4'f>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>"

    });

    function notificationBeforeDelete(event, el) {
        event.preventDefault();
        // if (confirm('Apakah Anda Yakin Akan Menghapus Data?')) {
        //     $("#delete-form").attr('action', $(el).attr('href'));
        //     $("#delete-form").submit();
        // }
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $("#delete-form").attr('action', $(el).attr('href'));
                $("#delete-form").submit();
            }
        })
    }
</script>
@endsection