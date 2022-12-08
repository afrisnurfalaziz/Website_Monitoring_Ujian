@extends('layouts.main')

@section('content')
<section class="section">
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
                        <a href="#" class="btn btn-primary">Detail</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection