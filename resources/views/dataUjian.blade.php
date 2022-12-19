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
                    <div class="container mt-4 mb-4">
                        <h1>Data Ujian</h1>

                        <button type="button" class="btn btn-primary my-4" data-toggle="modal" data-target="#addData"> <i class="fas fa-user-plus"></i></button>

                        <table class="table table-hover table-bordered table-stripped" id="dataUjian">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Nama Ujian</th>
                                    <th>Kode Ujian</th>
                                    <th>Tanggal Ujian</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>

                            @php
                            $count = 1;
                            @endphp

                            @foreach ($exams as $data)

                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $data->exam_name }}</td>
                                <td>{{ $data->exam_code }}</td>
                                <td>{{ $data->exam_date }}</td>
                                <td>
                                    <a href="{{ url('ujian/'.$data->id) }}" class="btn btn-warning btn-xs">
                                        <i class="fas fa-users"></i>
                                    </a>
                                    <a href=# class=" btn btn-primary btn-xs" data-toggle="modal" data-target="#editData{{ $data->id }}">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{route('ujian.destroy', $data)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        <i class="fas fa-trash-alt"></i>
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
                                            </button>
                                        </div>
                                        <form action="{{ url('ujian/'. $data->id ) }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal-body">

                                                <div class="form-group">
                                                    <label for="exampleInputNamaUjian">Nama Ujian</label>
                                                    <input type="text" class="form-control @error('exam_name') is-invalid @enderror" id="exampleInputNamaUjian" placeholder="Nama Ujian" name="exam_name" value="{{$data->exam_name ?? old('exam_name')}}" required>
                                                    @error('exam_name') <span class="text-danger">{{$message}}</span> @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputKodeUjian">Kode Ujian</label>
                                                    <input type="text" class="form-control @error('exam_code') is-invalid @enderror" id="exampleInputKodeUjian" placeholder="Masukkan Kode Ujian" name="exam_code" value="{{$data->exam_code ?? old('exam_code')}}" required>
                                                    @error('exam_code') <span class="text-danger">{{$message}}</span> @enderror
                                                </div>

                                                <div class="form-group">
                                                    <label for="exampleInputTanggalUjian">Tanggal Ujian</label>
                                                    <input type="date" class="form-control @error('exam_date') is-invalid @enderror" id="exampleInputTanggalUjian" placeholder="Masukkan Tanggal Ujian" name="exam_date" value="{{$data->exam_date ?? old('exam_date')}}" required>
                                                    @error('exam_date') <span class="text-danger">{{$message}}</span> @enderror
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

<!-- Modal Add-->
<div class="modal fade" id="addData" tabindex="-1" role="dialog" aria-labelledby="addDataLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataLabel">Tambah Data Ujian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="{{url('ujian')}}" method="post">
                @csrf
                
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="form-group">
                                        <label for="exampleInputNamaUjian">Nama Ujian</label>
                                        <input type="text" class="form-control @error('exam_name') is-invalid @enderror" id="exampleInputNama" placeholder="Nama Ujian" name="exam_name" value="{{old('exam_name')}}" required>
                                        @error('exam_name') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputKodeUjian">Kode Ujian</label>
                                        <input type="text" class="form-control @error('exam_code') is-invalid @enderror" id="exampleInputKodeUjian" placeholder="Masukkan Kode Ujian" name="exam_code" value="{{old('exam_code')}}" required>
                                        @error('exam_code') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>

                                    <div class="form-group">
                                        <label for="exampleInputTanggalUjian">Tanggal Ujian</label>
                                        <input type="date" class="form-control @error('exam_date') is-invalid @enderror" id="exampleInputTanggalUjian" placeholder="Masukkan Tanggal Ujian" name="exam_date" value="{{old('exam_date')}}" required>
                                        @error('exam_date') <span class="text-danger">{{$message}}</span> @enderror
                                    </div>
                                </div>
                            </div>
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
    $('#dataUjian').DataTable({
        "order": [
            [0, 'asc']
        ],
        "columnDefs": [{
                "targets": [4],
                "orderable": false
            },
            {
                "targets": [0, 4],
                "className": "text-center"
            },
            {
                "width": "150px",
                "targets": 4
            },
        ],
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