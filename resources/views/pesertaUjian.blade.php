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
                                    <a href="{{route('ujian.destroy', $data)}}" onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        <i class="fas fa-trash-alt"></i>
                                    </a>
                                </td>
                            </tr>

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

                        {{-- tes data --}}
                        <tbody>
                            @php
                            $count = 1;
                            @endphp
                            @foreach ($peserta as $data)

                            <label for="select{{$data->id}}">
                                <input type="hidden" value="{{ $data->id }}" name="exam_id">
                                <tr>
                                    <td>
                                        <input type="checkbox" name="participant[]" id="select{{$data->id}}" value="{{ $data->id }}">
                                    </td>
                                    <td>{{ $data->id }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $data->gender }}</td>
                                    <td>{{ $data->email }}</td>
                                    <td>{{ $data->phone }}</td>
                                    <td>{{ $data->address }}</td>
                                </tr>
                            </label>

                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save changes</button>
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