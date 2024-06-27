{{-- test --}}
@extends('home')
@section('content')
    <a href="{{ route('bat-dong-san.create') }}" class="btn btn-success mb-3" style="margin:15px ">Thêm mới bất động
        sản</a>
    <div class="container">
        <div class="row">
            @for ($i = 0; $i < 6; $i++)
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 100%;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                            <a href="#" class="btn btn-secondary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            @endfor
        </div>
    </div>
@endsection
