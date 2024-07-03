{{-- test --}}
@extends('home')
@section('content')

    <div class="container">
        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <form class="row g-2" method="GET" action="{{ route('bat-dong-san.index') }}">
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

        <a href="{{ route('bat-dong-san.create') }}" class="btn btn-success mb-3" style="margin:15px ">Thêm mới bất động
            sản</a>
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
                        <a href="{{ route('bat-dong-san.show', $property->id) }}" class="btn btn-primary">Chi tiết</a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
@endsection
