@extends('home')
@section('content')
    @include('charts.bar-chart')
    <hr class="my-5 w-100">
    @include('charts.pie-chart')
    <hr class="my-5 w-100">
    @include('charts.doughnut-chart')
@endsection
