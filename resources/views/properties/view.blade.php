@extends('home')
@section('content')
    <link rel="stylesheet" href="{{ asset('admin/css/style_view.css') }}">

    <div class="card mb-4">
        <div class="card-body">
            <div id="propertySlideshow" class="slideshow-container">
                @if ($property->hasImages->isNotEmpty())
                    @foreach ($property->hasImages as $key => $image)
                        <div class="mySlides" style="display: {{ $key == 0 ? 'block' : 'none' }}">
                            <img src="{{ asset('storage/' . $image->image_url) }}"
                                style="width:100%; height: 300px; object-fit: cover;">
                        </div>
                    @endforeach
                @else
                    <div class="mySlides" style="display: block;">
                        <img src="{{ asset('default-image.jpg') }}" style="width:100%; height: 300px; object-fit: cover;">
                    </div>
                @endif
                <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                <a class="next" onclick="plusSlides(1)">&#10095;</a>
            </div>
            <ul class="list-group list-group-flush mt-3">
                @if ($property->type)
                    <li class="list-group-item"><strong>Loại:</strong> {{ $property->type }}</li>
                @endif
                @if ($property->status)
                    <li class="list-group-item"><strong>Trạng thái:</strong>
                        {{ $property->status == 'sold' ? 'dã bán' : 'đang bán' }}</li>
                @endif
                @if ($property->hasLocation && $property->hasLocation->full_address)
                    <li class="list-group-item"><strong>Địa chỉ:</strong> {{ $property->hasLocation->full_address }}</li>
                @endif
                @if ($property->hasDescription && $property->hasDescription->acreage)
                    <li class="list-group-item"><strong>Diện tích:</strong> {{ $property->hasDescription->acreage }}</li>
                @endif
                @if ($property->hasDescription && $property->hasDescription->price)
                    <li class="list-group-item"><strong>Giá thành:</strong> {{ $property->hasDescription->price }}</li>
                @endif
                @if ($property->hasDescription && $property->hasDescription->frontage)
                    <li class="list-group-item"><strong>Mặt tiền:</strong> {{ $property->hasDescription->frontage }}</li>
                @endif
                @if ($property->hasDescription && $property->hasDescription->house_direction)
                    <li class="list-group-item"><strong>Hướng:</strong> {{ $property->hasDescription->house_direction }}
                    </li>
                @endif
                @if ($property->hasDescription && $property->hasDescription->floor)
                    <li class="list-group-item"><strong>Tầng:</strong> {{ $property->hasDescription->floor }}</li>
                @endif
                <li class="list-group-item">
                    <form style="margin-left: 5px" action="{{ route('bat-dong-san.destroy', $property->id) }}"
                        method="POST" onsubmit="return confirm('Bạn có muốn xóa bất động sản không?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Xóa bất động sản</button>
                    </form>
                </li>
            </ul>
        </div>
    </div>

    <script>
        let slideIndex = 0;
        showSlides(slideIndex);

        function plusSlides(n) {
            showSlides(slideIndex += n);
        }

        function showSlides(n) {
            let slides = document.getElementsByClassName("mySlides");
            if (n >= slides.length) {
                slideIndex = 0
            }
            if (n < 0) {
                slideIndex = slides.length - 1
            }
            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none";
            }
            slides[slideIndex].style.display = "block";
        }
    </script>
@endsection
