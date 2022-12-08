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
        <div class="row">

            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">0</h1>
                        <h5 class="card-text">Matematika</h5>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">0</h1>
                        <h5 class="card-text">Matematika</h5>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">0</h1>
                        <h5 class="card-text">Matematika</h5>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">0</h1>
                        <h5 class="card-text">Matematika</h5>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">0</h1>
                        <h5 class="card-text">Matematika</h5>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">0</h1>
                        <h5 class="card-text">Matematika</h5>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">0</h1>
                        <h5 class="card-text">Matematika</h5>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">0</h1>
                        <h5 class="card-text">Matematika</h5>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>

            <div class="col-4">
                <div class="card">
                    <div class="card-body">
                        <h1 class="card-title">0</h1>
                        <h5 class="card-text">Matematika</h5>
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection