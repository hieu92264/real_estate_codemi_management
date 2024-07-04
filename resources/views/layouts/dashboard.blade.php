@extends('home')
@section('content')
    <div class="row">
        <div class="col-md-6 chart-container">
            @include('charts.bar-chart')
        </div>
    </div>
@endsection
