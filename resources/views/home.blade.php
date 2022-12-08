@extends('layouts.main')

@section('content')


<section class="section">

    @if ($message = Session::get('denied_message'))
    <script>
        Swal.fire(
            'Gagal!',
            '{{ $message }}'
        )
    </script>
    @endif


    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="container">
        <div class="row row-cols-1 row-cols-md-2 g-4">
            @foreach($exams as $data)
            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">0</h1>
                        <h5 class="card-text">Matematika</h5>
                        <a href="{{url('home/' . $data->id)}}" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection