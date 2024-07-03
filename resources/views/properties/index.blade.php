{{-- test --}}
@extends('home')
@section('content')

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
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary" style="margin-left: 10pt">Tìm
                            Kiếm</button>
                    </div>
                </form>
            </div>
        </div>

        <a href="{{ route('bat-dong-san.create') }}" class="btn btn-success mb-3" style="margin: 15px;">Thêm mới bất động sản</a>
    
    <div class="tab-content">
        <div id="tab-1" class="tab-pane fade show p-0 active">
            <div class="row g-4">
                @foreach ($properties as $property)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="property-item rounded overflow-hidden">
                            <div class="position-relative overflow-hidden">
                                @if ($property->hasImages->isNotEmpty())
                                    @foreach ($property->hasImages->take(1) as $image)
                                        <a href="{{ route('bat-dong-san.show', $property->id) }}">
                                            <img class="img-fluid" src="{{ asset('storage/' . $image->image_url) }}" alt="">
                                        </a>
                                        @break
                                    @endforeach
                                @else
                                    <img src="{{ asset('default-image.jpg') }}" class="card-img-top rounded-0" alt="Default Image" style="height: 250px; object-fit: cover;">
                                @endif
                                
                                <div class="bg-primary rounded text-white position-absolute start-0 top-0 m-4 py-1 px-3">
                                    {{ $property->status }}
                                </div>
                                <div class="bg-white rounded-top text-primary position-absolute start-0 bottom-0 mx-4 pt-1 px-3">
                                    {{ $property->type }}
                                </div>
                            </div>

                            <div class="p-4 pb-0">
                                <h5 class="text-primary mb-3">$12,345</h5>
                                {{-- <a class="d-block h5 mb-2" href="">Golden Urban House For Sell</a> --}}
                                <p>
                                    <i class="fa fa-map-marker-alt text-primary me-2"></i>
                                    {{ $property->hasLocation->full_address ?? 'No address available' }}
                                </p>
                            </div>
                            
                            {{-- Thêm chi tiết --}}
                            <div class="d-flex border-top">
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-ruler-combined text-primary me-2"></i>1000 m2</small>
                                <small class="flex-fill text-center border-end py-2"><i class="fa fa-bed text-primary me-2"></i>3 Bed</small>
                                <small class="flex-fill text-center py-2"><i class="fa fa-bath text-primary me-2"></i>2 Bath</small>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div>
                    {{ $properties->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
    
@endsection
