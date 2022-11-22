@extends('layouts.main')
@section('content')
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"> --}}
<link rel="stylesheet" href="https://cdn.datatables.net/1.12.0/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/2.2.2/css/buttons.dataTables.min.css"/>
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
                <div class= "class-body">
                    <div class="container mt-5 mb-5">
                        <h1>Data Ujian</h1>

                        {{-- Add --}}
                        <button type="button" class="btn btn-primary my-4" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-user-plus"></i></button>
                            
                        <table class ="table table-hover table-bordered table-stripped" id="alumni">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Id Ujian</th>
                                    <th>Nama Ujian</th>
                                    <th>Kode Ujian</th>
                                    <th>Tanggal Ujian</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>  


                            {{-- tes data --}}
                            {{-- <tbody> --}}
                                @php
                                    $count = 1;
                                @endphp
                                @foreach ($ujians as $data)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $data->id_ujian }}</td>
                                    <td>{{ $data->nama_ujian }}</td>
                                    <td>{{ $data->kode_ujian }}</td>
                                    <td>{{ $data->tanggal_ujian }}</td>
                                    <td>
                                        <a href=# class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editDataUjian{{ $data->id }}">
                                            Edit
                                        </a>
                                        <a href="{{route('ujian.destroy', $data)}}" 
                                            onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                            Delete
                                        </a>
                                    </td>
                                </tr>

                                {{-- Modal Edit --}}
                                <div class="modal fade" id="editDataUjian{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Edit Data Ujian</h5>
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
                                                        <label for="exampleInputIdUjian">Id. Ujian</label>
                                                        <input type="text" class="form-control @error('id_ujian') is-invalid @enderror"
                                                        id="exampleInputIdUjian" placeholder="Id Ujian" name="id_ujian"
                                                        value="{{$data->id_ujian ?? old('id_ujian')}}">
                                                        @error('id_ujian') <span class="text-danger">{{$message}}</span> @enderror
                                                    </div>
                    
                                                    {{-- nama ujian --}}
                                                    <div class="form-group">
                                                        <label for="exampleInputNamaUjian">Nama Ujian</label>
                                                        <input type="text" class="form-control @error('nama_ujian') is-invalid @enderror"
                                                        id="exampleInputNama" placeholder="Nama Ujian" name="nama_ujian"
                                                        value="{{$data->nama_ujian ?? old('nama_ujian')}}">
                                                        @error('nama_ujian') <span class="text-danger">{{$message}}</span> @enderror
                                                    </div>
                    
                                                    {{-- kode ujian --}}
                                                    <div class="form-group">
                                                        <label for="exampleInputKodeUjian">Kode Ujian</label>
                                                        <input type="text" class="form-control @error('kode_ujian') is-invalid @enderror"
                                                        id="exampleInputKodeUjian" placeholder="Masukkan Kode Ujian" name="kode_ujian"
                                                        value="{{$data->kode_ujian ?? old('kode_ujian')}}">
                                                        @error('kode_ujian') <span class="text-danger">{{$message}}</span> @enderror
                                                    </div>
                                                    
                                                    {{-- tanggal ujian --}}
                                                    <div class="form-group">
                                                        <label for="exampleInputTanggalUjian">Tanggal Ujian</label>
                                                        <input type="text" class="form-control @error('tanggal_ujian') is-invalid @enderror"
                                                        id="exampleInputTanggalUjian" placeholder="Masukkan Tanggal Ujian" name="tanggal_ujian"
                                                        value="{{$data->tanggal_ujian ?? old('tanggal_ujian')}}">
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

  <!-- Modal Create-->
  <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Ujian</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <form action="{{url('ujian')}}" method="post">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                {{-- id ujian --}}
                                <div class="form-group">
                                    <label for="exampleInputIdUjian">Id. Ujian</label>
                                    <input type="text" class="form-control @error('id_ujian') is-invalid @enderror"
                                    id="exampleInputIdUjian" placeholder="Id Ujian" name="id_ujian"
                                    value="{{old('id_ujian')}}">
                                    @error('id_ujian') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                {{-- nama ujian --}}
                                <div class="form-group">
                                    <label for="exampleInputNamaUjian">Nama Ujian</label>
                                    <input type="text" class="form-control @error('nama_ujian') is-invalid @enderror"
                                    id="exampleInputNama" placeholder="Nama Ujian" name="nama_ujian"
                                    value="{{old('nama_ujian')}}">
                                    @error('nama_ujian') <span class="text-danger">{{$message}}</span> @enderror
                                </div>

                                {{-- kode ujian --}}
                                <div class="form-group">
                                    <label for="exampleInputKodeUjian">Kode Ujian</label>
                                    <input type="text" class="form-control @error('kode_ujian') is-invalid @enderror"
                                    id="exampleInputKodeUjian" placeholder="Masukkan Kode Ujian" name="kode_ujian"
                                    value="{{old('kode_ujian')}}">
                                    @error('kode_ujian') <span class="text-danger">{{$message}}</span> @enderror
                                </div>
                               
                                {{-- tanggal ujian --}}
                                <div class="form-group">
                                    <label for="exampleInputTanggalUjian">Tanggal Ujian</label>
                                    <input type="text" class="form-control @error('tanggal_ujian') is-invalid @enderror"
                                    id="exampleInputTanggalUjian" placeholder="Masukkan Tanggal Ujian" name="tanggal_ujian"
                                    value="{{old('tanggal_ujian')}}">
                                    @error('tanggal_ujian') <span class="text-danger">{{$message}}</span> @enderror
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
      </div>
    </div>
  </div>

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
              title: 'Daftar Ujian',
              exportOptions: { columns: ':visible'},
              messageTop: '',
              orientation:'portrait',
              pageSize:'A4'
            },
            { extend: 'excel', text: '<i class="fa fa-file-excel text-success" > </i> EXCEL', 
            title: 'Daftar Ujian',
            exportOptions: { columns: ':visible'},
            messageTop: ''
            },
            { extend: 'print', text: '<i class="fa fa-print text-info" > </i> PRINT', 
            title: 'Daftar Ujian',
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