@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    welcome to UIMS
                    <br><br>
                    <ul>
                        <li>we provide you with a list of registered universties</li>
                        <li>their details e.g location website courses available</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
