@extends('home')
@section('content')
    <link rel="stylesheet" href="{{ asset('admin/css/style_view.css') }}">

    <div class="card mb-4">
        <div class="card-body">
            <div class="row">
                <div class="col-md-12 mb-3 mb-md-0">
                    <div id="propertySlideshow" class="slideshow-container">
                        @if ($property->hasImages->isNotEmpty())
                            @foreach ($property->hasImages as $key => $image)
                                <div class="mySlides" style="display: {{ $key == 0 ? 'block' : 'none' }}">
                                    <div class="image-wrapper">
                                        <img src="{{ asset('storage/' . $image->image_url) }}"
                                            onclick="showModal('{{ asset('storage/' . $image->image_url) }}')">
                                        <div class="image-overlay"
                                            onclick="showModal('{{ asset('storage/' . $image->image_url) }}')">
                                            Xem chi tiết ảnh
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="mySlides" style="display: block;">
                                <img src="{{ asset('default-image.jpg') }}"
                                    onclick="showModal('{{ asset('default-image.jpg') }}')">
                            </div>
                        @endif
                        <a class="prev" onclick="plusSlides(-1)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1)">&#10095;</a>
                    </div>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="imageModal" tabindex="-1" aria-labelledby="imageModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-fullscreen modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body"
                                style="display: flex; justify-content: center; align-items: center; padding: 0;">
                                <!-- Điều chỉnh kích thước ảnh để to hơn -->
                                <img id="modalImage" src="" style="width: auto; height: 80%;">
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <ul class="list-group list-group-flush mt-3">
                        @if ($property->type)
                            <li class="list-group-item"><strong>Loại:</strong> {{ $property->type }}</li>
                        @endif
                        @if ($property->status)
                            <li class="list-group-item"><strong>Trạng thái:</strong>
                                {{ $property->status == 'sold' ? 'Đã bán' : 'Đang bán' }}</li>
                        @endif
                        @if ($property->hasLocation)
                            <li class="list-group-item"><strong>Địa chỉ:</strong>
                                {{ $property->hasLocation->full_address ?? '' }}

                                {{-- {{ $property->hasLocation->street ?? '' }},

                                {{ $property->hasLocation->ward ?? '' }}, {{ $property->hasLocation->district ?? '' }},
                                {{ $property->hasLocation->city ?? '' }} --}}
                            </li>
                        @endif
                        @if ($property->hasDescription && $property->hasDescription->acreage)
                            <li class="list-group-item"><strong>Diện tích:</strong>
                                {{ $property->hasDescription->acreage }} m²
                            </li>
                        @endif
                        @if ($property->hasDescription && $property->hasDescription->floor)
                            <li class="list-group-item"><strong>Tầng:</strong> {{ $property->hasDescription->floor }}</li>
                        @endif
                    </ul>
                </div>
                <div class="col-md-6">
                    <ul class="list-group list-group-flush mt-3">
                        @if ($property->hasDescription && $property->hasDescription->price)
                            <li class="list-group-item"><strong>Giá thành:</strong>
                                {{ number_format(floatval($property->hasDescription->price), 0, ',', '.') }}
                                vnđ</li>
                        @endif
                        @if ($property->hasDescription && $property->hasDescription->frontage)
                            <li class="list-group-item"><strong>Mặt tiền:</strong>
                                {{ $property->hasDescription->frontage }} m</li>
                        @endif
                        @if ($property->hasDescription && $property->hasDescription->house_direction)
                            <li class="list-group-item"><strong>Hướng:</strong>
                                {{ $property->hasDescription->house_direction }}</li>
                        @endif
                    </ul>
                </div>
                <div class="col-md-12">
                    <ul class="list-group list-group-flush mt-3">
                        <li class="list-group-item text-center">
                            @if (Auth::user()->hasPermission('Sửa Bất động sản'))
                                <a href="{{ route('bat-dong-san.edit', $property->id) }}" class="btn btn-success me-2">Sửa
                                    bất động sản</a>
                            @endif
                            @if (Auth::user()->hasPermission('Xóa bất động sản'))
                                <form action="{{ route('bat-dong-san.destroy', $property->id) }}" method="POST"
                                    onsubmit="return confirm('Bạn có muốn xóa bất động sản không?');"
                                    class="d-inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Xóa bất động sản</button>
                                </form>
                            @endif
                        </li>
                    </ul>
                </div>
            </div>
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

        function showModal(imageUrl) {
            document.getElementById('modalImage').src = imageUrl;
            $('#imageModal').modal('show');
        }

        $(document).ready(function() {
            $('.close').click(function() {
                $('#imageModal').modal('hide');
            });
        });
    </script>

@endsection
