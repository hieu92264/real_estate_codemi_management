{{-- test --}}
@extends('home')
@section('content')
    @if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="container">
        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <form class="row g-2" method="GET" action="{{ route('searchProperties') }}">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-12">
                                <input type="text" class="form-control" name="search"
                                    placeholder="Tìm kiếm bất động sản..." value="{{ request('search') }}">
                            </div>
                            <div class="col-md-4">
                                <select name="type" class="form-select border-0 py-3">
                                    <option value="1" selected>Loại nhà đất</option>
                                    @if (isset($types))
                                        @foreach ($types as $type)
                                            <option value="{{ $type }}">{{ $type }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select name="local" class="form-select border-0 py-3">
                                    <option value="1" selected>Khu vực nội thành Hải Phòng</option>
                                    @if (isset($locations))
                                        @foreach ($locations as $local)
                                            <option value="{{ $local }}">{{ $local }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select name="price" class="form-select border-0 py-3">
                                    <option value="1" selected>Mức giá</option>
                                    <option value="2">Dưới 500 triệu</option>
                                    <option value="3">500 - 800 triệu</option>
                                    <option value="4">800 triệu - 1 tỷ</option>
                                    <option value="5">1 - 2 tỷ</option>
                                    <option value="6">2 - 3 tỷ</option>
                                    <option value="7">3 - 5 tỷ</option>
                                    <option value="8">5 - 7 tỷ</option>
                                    <option value="9">Trên 7 tỷ</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select name="area" class="form-select border-0 py-3">
                                    <option value="1" selected>Diện tích</option>
                                    <option value="2">Dưới 30 m²</option>
                                    <option value="3">30 - 50 m²</option>
                                    <option value="4">50 - 80 m²</option>
                                    <option value="5">80 - 100 m²</option>
                                    <option value="6">100 - 150 m²</option>
                                    <option value="7">150 - 200 m²</option>
                                    <option value="8">200 - 250 m²</option>
                                    <option value="9">Trên 250 m²</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <select name="status" class="form-select border-0 py-3">
                                    <option value="1" selected>Trạng thái</option>
                                    @if (isset($statuses))
                                        @foreach ($statuses as $status)
                                            <option value="{{ $status }}">{{ $status }}</option>
                                        @endforeach
                                    @endif
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2 d-flex align-items-center">
                        <button type="submit" class="btn btn-success w-100">Tìm Kiếm</button>
                    </div>
                </form>
            </div>
        </div>

        <a href="{{ route('bat-dong-san.create') }}" class="btn btn-success mb-3" style="margin: 15px;">Thêm mới bất động
            sản</a>


        <div class="tab-content">
            <div id="tab-1" class="tab-pane fade show p-0 active">
                <div class="row g-4">
                    @foreach ($properties as $property)
                        <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                            <a href="{{ route('bat-dong-san.show', $property->id) }}">
                                <div class="property-item rounded overflow-hidden d-flex flex-column">
                                    <div class="position-relative overflow-hidden" style="height: 250px;">
                                        @if ($property->hasImages->isNotEmpty())
                                            @foreach ($property->hasImages->take(1) as $image)
                                                <img class="img-fluid w-100 h-100"
                                                    src="{{ asset('storage/' . $image->image_url) }}" alt=""
                                                    style="object-fit: cover;">
                                            @break
                                        @endforeach
                                    @else
                                        <img src="{{ asset('default-image.jpg') }}" class="img-fluid w-100 h-100"
                                            alt="" style="object-fit: cover;">
                                        <div class="position-absolute top-50 start-50 translate-middle text-center text-white"
                                            style="background: #bebebe; padding: 10px;">
                                            Không có ảnh
                                        </div>
                                    @endif
                                    <div
                                        class="rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3 
                                            @if ($property->status == 'available') bg-success
                                            @elseif($property->status == 'sold') bg-danger
                                            @elseif($property->status == 'pending') bg-info @endif">
                                        {{ $property->status }}
                                    </div>
                                    <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3"
                                        style="border: 3px solid #db5151">
                                        {{ $property->type }}
                                    </div>
                                </div>

                                <div class="p-4 pb-0 flex-grow-1">
                                    <h5 class="text-primary mb-3"><i class="fas fa-dollar-sign"></i>
                                        @if ($property->hasDescription)
                                            {{ $property->hasDescription->price }} vnđ
                                            {{-- {{ number_format(floatval($property->hasDescription->price), 0, ',', '.') }} vnđ --}}
                                        @endif
                                    </h5>
                                    {{-- <a class="d-block h5 mb-2" href="">Golden Urban House For Sell</a> --}}
                                    <h6>
                                        <i class="fa fa-map-marker-alt text-primary me-2"></i>
                                        {{ $property->hasLocation->full_address ?? '' }}
                                        {{ $property->hasLocation->street ?? '' }},{{ $property->hasLocation->ward ?? '' }},{{ $property->hasLocation->district ?? '' }},{{ $property->hasLocation->city ?? '' }}
                                    </h6>
                                </div>

                                {{-- Thêm chi tiết --}}
                                <div class="d-flex border-top mt-auto property-footer">
                                    <small class="flex-fill text-center border-end py-2">
                                        <i class="fa fa-ruler-combined text-primary me-2"></i>
                                        @if ($property->hasDescription)
                                            {{ $property->hasDescription->acreage }} m²
                                        @endif
                                    </small>
                                    <small class="flex-fill text-center border-end py-2">
                                        <i class="fa fa-bed text-primary me-2"></i>
                                        @if ($property->hasDescription)
                                            {{ $property->hasDescription->bedrooms }} phòng ngủ
                                        @endif
                                    </small>
                                    <small class="flex-fill text-center py-2">
                                        <i class="fa fa-bath text-primary me-2"></i>
                                        @if ($property->hasDescription)
                                            {{ $property->hasDescription->toilets }} toilets
                                        @endif
                                    </small>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
                <div>
                    {{ $properties->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
