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
                <div class= "class-body">
                <div class="container mt-5 mb-5">

                    <h1>Data Admin</h1>

                    {{-- add --}}
                    <button type="button" class="btn btn-primary my-4" data-toggle="modal" data-target="#exampleModal"> <i class="fas fa-user-plus"></i></button>
                    
                    <table class ="table table-hover table-bordered table-stripped" id="alumni">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
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
                            @foreach ($admins as $data)

                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $data->nama_admin }}</td>
                                <td>{{ $data->telepon }}</td>
                                <td>{{ $data->alamat }}</td>
                                <td>{{ $data->email }}</td>

                                <td>
                                    <a href=# class="btn btn-primary btn-xs" data-toggle="modal" data-target="#editDataAdmin{{ $data->id }}">
                                        Edit
                                    </a>
                                    <a href="{{route('admin.destroy', $data)}}" 
                                        onclick="notificationBeforeDelete(event, this)" class="btn btn-danger btn-xs">
                                        Delete
                                    </a>
                                </td>
                            </tr>

                            {{-- Modal Edit Admin --}}
                            <div class="modal fade" id="editDataAdmin{{ $data->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Edit Data Admin</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="{{ url('admin/'. $data->id ) }}" method="POST">
                                            @method('PUT')
                                            @csrf
                                            <div class="modal-body">
                
                                                {{-- nama admin --}}
                                                <div class="form-group">
                                                    <label for="exampleInputNamaAdmin">Nama Admin</label>
                                                    <input type="text" class="form-control @error('nama_admin') is-invalid @enderror"
                                                    id="exampleInputNamaAdmin" placeholder="Nama Admin" name="nama_admin"
                                                    value="{{$data->nama_admin ?? old('nama_admin')}}">
                                                    @error('nama_admin') <span class="text-danger">{{$message}}</span> @enderror
                                                </div>

                                                {{-- email --}}
                                                <div class="form-group">
                                                    <label for="exampleInputEmail">E-mail</label>
                                                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                                                    id="exampleInputEmail" placeholder="Masukkan Email" name="email"
                                                    value="{{$data->email ?? old('email')}}">
                                                    @error('email') <span class="text-danger">{{$message}}</span> @enderror
                                                </div>
                                                
                                                {{-- telepon --}}
                                                <div class="form-group">
                                                    <label for="exampleInputTelepon">Telepon</label>
                                                    <input type="text" class="form-control @error('telepon') is-invalid @enderror"
                                                    id="exampleInputTelepon" placeholder="Masukkan Tanggal Ujian" name="telepon"
                                                    value="{{$data->telepon ?? old('telepon')}}">
                                                    @error('telepon') <span class="text-danger">{{$message}}</span> @enderror
                                                </div>
                                                
                                                {{-- role --}}
                                                <div class="form-group">
                                                    <label for="exampleInputRole">Role</label>
                                                    <input type="text" class="form-control @error('role') is-invalid @enderror"
                                                    id="exampleInputRole" placeholder="Pilih Role" name="role"
                                                    value="{{$data->role ?? old('role')}}">
                                                    @error('role') <span class="text-danger">{{$message}}</span> @enderror
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

{{-- Modal create Siswa --}}
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Data Admin</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <div class="modal-body">
                <form action="{{ url('admin') }}" method="POST">
                @csrf

                {{-- nama admin --}}
                <div class="form-group">
                    <label for="exampleInputNamaAdmin">Nama Admin</label>
                    <input type="text" class="form-control @error('nama_admin') is-invalid @enderror"
                    id="exampleInputNamaAdmin" placeholder="Nama Admin" name="nama_admin"
                    value="{{old('nama_admin')}}">
                    @error('nama_admin') <span class="text-danger">{{$message}}</span> @enderror
                </div>

                {{-- email --}}
                <div class="form-group">
                    <label for="exampleInputEmail">E-mail</label>
                    <input type="text" class="form-control @error('email') is-invalid @enderror"
                    id="exampleInputEmail" placeholder="Masukkan Email" name="email"
                    value="{{old('email')}}">
                    @error('email') <span class="text-danger">{{$message}}</span> @enderror
                </div>
                
                {{-- telepon --}}
                <div class="form-group">
                    <label for="exampleInputTelepon">Telepon</label>
                    <input type="text" class="form-control @error('telepon') is-invalid @enderror"
                    id="exampleInputTelepon" placeholder="Masukkan Tanggal Ujian" name="telepon"
                    value="{{old('telepon')}}">
                    @error('telepon') <span class="text-danger">{{$message}}</span> @enderror
                </div>

                {{-- role --}}
                <div class="form-group">
                    <label for="exampleInputRole">Role</label>
                    <input type="text" class="form-control @error('role') is-invalid @enderror"
                    id="exampleInputRole" placeholder="Pilih Role" name="role"
                    value="{{old('role')}}">
                    @error('role') <span class="text-danger">{{$message}}</span> @enderror
                </div>

                {{-- password --}}
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

                {{-- pass confirm --}}

                <div class="row mb-3">
                    <label for="password-confirm" class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                    <div class="col-md-6">
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
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
              title: 'Daftar Admin',
              exportOptions: { columns: ':visible'},
              messageTop: '',
              orientation:'portrait',
              pageSize:'A4'
            },
            { extend: 'excel', text: '<i class="fa fa-file-excel text-success" > </i> EXCEL', 
            title: 'Daftar Admin',
            exportOptions: { columns: ':visible'},
            messageTop: ''
            },
            { extend: 'print', text: '<i class="fa fa-print text-info" > </i> PRINT', 
            title: 'Daftar Admin',
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