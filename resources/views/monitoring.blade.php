@extends('layouts.main')
@section('content')

@include('core');

<section class="">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="class-body">
                    <div class="container mt-4 mb-4">
                        <h1 class="mb-5">Ujian {{ $exam->exam_name }}</h1>

                        <table class="table table-hover table-bordered table-stripped" id="monitoringUjian">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Screenshot</th>
                                    <th>Menoleh ke</th>
                                    <th>Waktu</th>
                                    <th>Tanggal Terjadi</th>
                                    <th>Indikasi</th>
                                </tr>
                            </thead>

                            @php
                            $count = 1;
                            @endphp
                            @foreach ($monitorings as $data)

                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>
                                    <a href="{{ url('assets/images/monitoring/' . $data->screenshot) }}" target="_blank">
                                        <img src="{{ url('assets/images/monitoring/' . $data->screenshot) }}" style="width: 150px;" alt="">
                                        <br><span>{{ 'ID: ' . $data->examReg->participant->id }}</span>
                                        <br><span>{{ 'Nama: ' . $data->examReg->participant->name }}</span>
                                    </a>
                                </td>
                                <td>{{ $data->look_to }}</td>
                                <td>{{ $data->time . ' detik' }}</td>
                                <td>{{ $data->created_at }}</td>
                                <td>
                                    @if ($data->time <= 3)
                                    <span class="badge badge-success">Rendah</span>
                                    @elseif ($data->time <= 7)
                                    <span class="badge badge-warning">Sedang</span>
                                    @else
                                    <span class="badge badge-danger">Tinggi</span>
                                    @endif
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

<script>
    $('#monitoringUjian').DataTable({
        "order": [
            [0, 'asc']
        ],
        "columnDefs": [
            {
                "targets": [0],
                "width": "10px"
            },
            {
                "targets": [1],
                "orderable": false
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
</script>
@endsection