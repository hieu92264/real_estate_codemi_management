@extends('home')
@section('content')
    <a href="{{ route('bat-dong-san.create') }}" class="btn btn-success mb-3" style="margin:15px ">Thêm mới bất động sản</a>
    <div class="container">
        <div class="row">
            @foreach ($properties as $property)
                <div class="col-md-4 mb-4">
                    <div class="card">
                        @if ($property->hasImages->isNotEmpty())
                            @foreach ($property->hasImages as $image)
                                <img src="{{ asset('storage/' . $image->image_url) }}" class="card-img-top rounded-0"
                                    alt="Property Image" style="height: 300px; object-fit: cover;">
                            @break

                            <!-- Chỉ hiển thị ảnh đầu tiên -->
                        @endforeach
                    @else
                        <img src="{{ asset('default-image.jpg') }}" class="card-img-top rounded-0" alt="Default Image"
                            style="height: 300px; object-fit: cover;">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $property->type }}</h5>
                        <p class="card-text text-muted">{{ $property->status }}</p>
                        <p class="card-text">{{ $property->hasLocation->full_address ?? 'No address available' }}</p>
                        <a href="#" class="btn btn-primary">Chi tiết</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
