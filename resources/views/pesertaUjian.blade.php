@extends('layouts.main')
@section('content')

@include('core')

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
                                    <a href="{{ url('destroy-participant/' . $data->id) }}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>

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
    <div class="modal-dialog modal-xl" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addDataLabel">Tambah Data Peserta Ujian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                </button>
            </div>
            <form action="{{ url('add-participant') }}" method="post">
                @csrf
                <div class="modal-body">

                    <table id="" class="table table-hover table-bordered table-stripped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID Peserta</th>
                                <th>Nama</th>
                                <th>Jenis Kelamin</th>
                                <th>E-mail</th>
                                <th>Nomor Telepon</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php
                            $count = 1;
                            @endphp

                            @foreach ($peserta as $data)


                            @if (count($data->examRegs->where('exam_id', $examId)) == 0)
                            <input type="hidden" value="{{ $examId }}" name="exam_id">
                            <tr>
                                <td>
                                    <input type="checkbox" id="checkParticipant{{ $data->id }}" name="participant[]" value="{{ $data->id }}">
                                </td>
                                <td>
                                    <label for="checkParticipant{{ $data->id }}">
                                        {{ $data->id }}
                                    </label>
                                </td>
                                <td>
                                    <label for="checkParticipant{{ $data->id }}">
                                        {{ $data->name }}
                                    </label>
                                </td>
                                <td>
                                    <label for="checkParticipant{{ $data->id }}">
                                        {{ $data->gender }}
                                    </label>
                                </td>
                                <td>
                                    <label for="checkParticipant{{ $data->id }}">
                                        {{ $data->email }}
                                    </label>
                                </td>
                                <td>
                                    <label for="checkParticipant{{ $data->id }}">
                                        {{ $data->phone }}
                                    </label>
                                </td>
                                <td>
                                    <label for="checkParticipant{{ $data->id }}">
                                        {{ $data->address }}
                                    </label>
                                </td>
                            </tr>
                            @endif

                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Tambahkan</button>
                </div>
            </form>
        </div>
    </div>
</div>



<script>
    $(document).ready(function() {
        $('#addPesertaUjian').DataTable({
            columnDefs: [{
                orderable: false,
                className: 'select-checkbox',
                targets: 0
            }],
            select: {
                style: 'os',
                selector: 'td:first-child'
            },
            order: [
                [1, 'asc']
            ]
        });
    });

    $('#dataUjian').DataTable({
        "order": [
            [0, 'asc']
        ],
        "columnDefs": [{
                "width": "80px",
                "targets": 1
            },
            {
                "width": "90px",
                "targets": 3
            },
            {
                "width": "100px",
                "targets": 5
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