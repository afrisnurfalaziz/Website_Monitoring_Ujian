@extends('layouts.main')

@section('content')
<section class="section">
    <div class="section-header">
        <h1>Dashboard</h1>
    </div>
    <div class="row justify-content-center">
       <div class="col-md-8">
           <div class="card">
               <div class="card-body">
                   @if (session('status'))
                       <div class="alert alert-success" role="alert">
                           {{ session('status') }}
                       </div>
                   @endif
    
                   {{ __('You are logged in!') }}
               </div>
           </div>
       </div>
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