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
                    <div class="container mt-4 mb-4">
                        <h1>Data Peserta Ujian</h1>

                        <button type="button" class="btn btn-primary my-4" data-toggle="modal" data-target="#addData"> <i class="fas fa-user-plus"></i></button>

                        <table class="table table-hover table-bordered table-stripped" id="dataUjian">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>ID Peserta</th>
                                    <th>Nama</th>
                                    <th>Jenis Kelamin</th>
                                    <th>E-mail</th>
                                    <th>Nomor Telepon</th>
                                    <th>Alamat</th>
                                    <th>Created</th>
                                    <th>Updated</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>

                            {{-- tes data --}}
                            {{-- <tbody> --}}
                            @php
                            $count = 1;
                            @endphp
                            @foreach ($pesertaUjian as $data)

                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->participant->name }}</td>
                                <td>{{ $data->participant->gender }}</td>
                                <td>{{ $data->participant->email }}</td>
                                <td>{{ $data->participant->phone }}</td>
                                <td>{{ $data->participant->address }}</td>
                                <td>{{ $data->created_at }}</td>
                                <td>{{ $data->updated_at }}</td>
                                <td>
<<<<<<< HEAD
                                    <a href="{{url('destroy-participant', $data->id)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
=======
                                    <a href="{{route('ujian.destroy', $data)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        <i class="fas fa-trash-alt"></i>
>>>>>>> 11e9877a1dcb22e56ca47355393a5eeac8c0ab24
                                    </a>
                                </td>
                            </tr>

                            <!-- Modal Edit -->
                            <div class="modal fade" id="editData{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="editDataLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="editDataLabel">Edit Data Ujian</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ url('ujian/'. $data->id ) }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal-body">
                                                {{-- id ujian --}}
                                                <div class="form-group">
                                                    <label for="exampleInputIdUjian">ID Ujian</label>
                                                    <input type="text" class="form-control @error('id_ujian') is-invalid @enderror" id="exampleInputIdUjian" placeholder="ID Ujian" name="id_ujian" value="{{$data->id_ujian ?? old('id_ujian')}}">
                                                    @error('id_ujian') <span class="text-danger">{{$message}}</span> @enderror
                                                </div>

                                                {{-- nama ujian --}}
                                                <div class="form-group">
                                                    <label for="exampleInputNamaUjian">Nama Ujian</label>
                                                    <input type="text" class="form-control @error('nama_ujian') is-invalid @enderror" id="exampleInputNama" placeholder="Nama Ujian" name="nama_ujian" value="{{$data->nama_ujian ?? old('nama_ujian')}}">
                                                    @error('nama_ujian') <span class="text-danger">{{$message}}</span> @enderror
                                                </div>

                                                {{-- kode ujian --}}
                                                <div class="form-group">
                                                    <label for="exampleInputKodeUjian">Kode Ujian</label>
                                                    <input type="text" class="form-control @error('kode_ujian') is-invalid @enderror" id="exampleInputKodeUjian" placeholder="Masukkan Kode Ujian" name="kode_ujian" value="{{$data->kode_ujian ?? old('kode_ujian')}}">
                                                    @error('kode_ujian') <span class="text-danger">{{$message}}</span> @enderror
                                                </div>

                                                {{-- tanggal ujian --}}
                                                <div class="form-group">
                                                    <label for="exampleInputTanggalUjian">Tanggal Ujian</label>
                                                    <input type="text" class="form-control @error('tanggal_ujian') is-invalid @enderror" id="exampleInputTanggalUjian" placeholder="Masukkan Tanggal Ujian" name="tanggal_ujian" value="{{$data->tanggal_ujian ?? old('tanggal_ujian')}}">
                                                    @error('tanggal_ujian') <span class="text-danger">{{$message}}</span> @enderror
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
                            {{-- </tbody> --}}
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

<!-- Modal Add-->
<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataLabel">Tambah Data Ujian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ url('add-participant') }}" method="post">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        @foreach ($peserta as $data)
                                        <div class="form-check">
                                            <input class="form-check-input" name="participant[]" type="checkbox" value="{{ $data->id }}" id="flexCheckDefault{{ $data->id }}">
                                            <label class="form-check-label" for="flexCheckDefault{{ $data->id }}">
                                                {{ $data->name }}
                                            </label>
                                            <input type="hidden" value="{{ $examId }}" name="exam_id">
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
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
    $('#dataUjian').DataTable({
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
                title: 'Daftar Ujian',
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
                title: 'Daftar Ujian',
                exportOptions: {
                    columns: ':visible'
                },
                messageTop: ''
            },
            {
                extend: 'print',
                text: '<i class="fa fa-print text-info" > </i> PRINT',
                title: 'Daftar Ujian',
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
            //     $('#btnmodaladddataUjian').click();
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