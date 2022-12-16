@extends('layouts.main')

@section('content')

@include('core')

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
        <div class="row row-cols-1 row-cols-md-3 g-4">

            @foreach($exams as $data)
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">{{ count($data->monitorings) }}</h1>
                        <h5 class="card-text">{{ $data->exam_name }}</h5>
                        <div class="d-flex justify-content-between">
                            <a href="{{url('home/' . $data->id)}}" class="btn btn-primary">Detail</a>
                            <span class="mt-3">{{ count($data->examRegs) }} peserta</span>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</section>
@endsection