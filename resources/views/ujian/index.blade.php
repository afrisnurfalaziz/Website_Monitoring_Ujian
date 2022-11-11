@extends('layouts.main')
@section('content')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css"/>
<section class="section">
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
    <div class="section-header">
      <h1>Data Ujian</h1>
    </div>
    <div class="section-body">
      <div class="row">
        <div class="col-12">
            <div class="card">
                <div class= "class-body">
                <div class="container mt-5 mb-5">
                    <a href=# >
                        <button class="btn btn-primary mb-2"> <i class="fas fa-user-plus"></i></button>
                    </a>
                    <table class ="table table-hover table-bordered table-stripped" id="alumni">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Id Ujian</th>
                                <th>Nama Ujian</th>
                                <th>Kode Ujian</th>
                                <th>Tanggal Ujian</th>
                                <th>Opsi</th>
                                {{-- <th>Opsi</th> --}}
                            </tr>
                        </thead>  


                        {{-- tes data --}}
                        {{-- <tbody> --}}
                            <tr>
                                <td>1.</td>
                                <td>A</td>
                                <td>Matematika</td>
                                <td>absusiw</td>
                                <td>12 november</td>
                                <td>
                                    <a href=# class="btn btn-primary btn-xs">
                                        Edit
                                    </a>
                                    <a href=# class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                                {{-- <th>Opsi</th> --}}
                            </tr>
                        {{-- </tbody> --}}
                        
                        

                        {{-- <tbody>
                            @foreach($alumni as $key => $alumni)
                              
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$alumni->no_induk}}</td>
                                    <td>{{$alumni->nama}}</td>
                                    <td>{{$alumni->no_ijazah}}</td>
                                    <td>{{$alumni->no_skhun}}</td>
                                    <td>{{$alumni->tahun_lulus}}</td>
                                    <td>{{$alumni->tgl_pengambilan}}</td>
                                    <td>@if($alumni->vcd_foto==1)
                                          <button class="btn btn-sm btn-info">Sudah</button>
                                        @elseif($alumni->vcd_foto==0)
                                        <button class="btn btn-sm btn-warning">Belum</i></button>
                                        @endif
                                    </td>
                                    <td>{{$alumni->nama_sekolah_lanjutan}}</td>
                                    <td>@if($alumni->status==1)
                                        Sudah Mengambil
                                      @elseif($alumni->status==0)
                                        Belum Mengambil
                                      @endif</td>
                                    <td>
                                        <a href="{{route('alumni.edit', $alumni)}}" class="btn btn-primary btn-xs">
                                            Edit
                                        </a>
                                        <a href="{{route('alumni.destroy', $alumni)}}" 
                                            onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>             --}}
                    </table>
                </div>
                </div>
            </div>
        </div>
    </div>
    </div>
  </section>
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.0/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.2.2/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.0.0/js/buttons.colVis.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<form action="" id="delete-form" method="post">
    @method('delete')
    @csrf
</form>

<script>
  $('#alumni').DataTable( {
            "order": [[ 0, 'asc' ]],
      "columnDefs": [ {
                        "targets": [5],
                        "orderable": false
                        },
                        {
                          "targets":[0, 5],
                          "className": "text-center"
                        },
                        { "width": "130px", "targets": 5 },
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
        buttons: [
            { extend: 'pdf', 
              text: '<i class="fa fa-file-pdf text-danger"></i> PDF', 
              title: 'Daftar Alumni MTs At - Taqwa Bondowoso',
              exportOptions: { columns: ':visible'},
              messageTop: '',
              orientation:'portrait',
              pageSize:'A4'
            },
            { extend: 'excel', text: '<i class="fa fa-file-excel text-success" > </i> EXCEL', 
            title: 'Daftar Alumni MTs At - Taqwa Bondowoso',
            exportOptions: { columns: ':visible'},
            messageTop: ''
            },
            { extend: 'print', text: '<i class="fa fa-print text-info" > </i> PRINT', 
            title: 'Daftar Alumni MTs At - Taqwa Bondowoso',
            exportOptions: { columns: ':visible'},
            messageTop: '',
            },
            { extend: 'colvis', text:'<i class="fa fa-table" > </i> Columns',   postfixButtons: [ 'colvisRestore' ] },
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

    } );

    function notificationBeforeDelete(event, el){
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