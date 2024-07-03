{{-- test --}}
@extends('home')
@section('content')
    
    <div class="container">
        {{-- <div class="container mt-3">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <form action="{{ route('danh-sach-nguoi-ban.index') }}" method="GET" class="mb-4">
                        <div class="input-group">
                            <input type="text" class="form-control" name="search"
                                placeholder="Tìm kiếm bất động sản...." value="{{ request('search') }}">
                            <button type="submit" class="btn btn-primary" style="margin-left: 10pt">Tìm
                                Kiếm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> --}}

        <div class="container-fluid bg-primary mb-5 wow fadeIn" data-wow-delay="0.1s" style="padding: 35px;">
            <div class="container">
                <form class="row g-2" method="GET" action="{{ route('bat-dong-san.index') }}">
                    <div class="col-md-10">
                        <div class="row g-2">
                            <div class="col-md-12">
                                {{-- <input type="text" class="form-control border-0 py-3" placeholder="Search Keyword"> --}}
                                <input type="text" class="form-control" name="search"
                                placeholder="Tìm kiếm bất động sản..." value="{{ request('search') }}">
                            </div>
                            <div class="col-md-4">
                                <select name="type" class="form-select border-0 py-3">
                                    <option value="1" selected>Loại nhà đất</option>
                                    {{-- <option value="nhà">Nhà</option>
                                    <option value="đất nền">Đất nền</option> --}}
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
                                    {{-- <option value="2">Quận Hồng Bàng</option>
                                    <option value="3">Quận Ngô Quyền</option>
                                    <option value="4">Quận Lê Chân</option>
                                    <option value="5">Quận Hải An</option>
                                    <option value="6">Quận Kiến An</option>
                                    <option value="7">Quận Đồ Sơn</option>
                                    <option value="8">Quận Dương Kinh</option> --}}
                                    @if (isset($locals))
                                        @foreach ($locals as $local)
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
                                    {{-- <option value="2">Đã bán</option>
                                    <option value="3">Chưa bán</option> --}}
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
                        {{-- <button class="btn btn-dark border-0 w-100 py-3">Search</button> --}}
                        <button type="submit" class="btn btn-primary" style="margin-left: 10pt">Tìm
                            Kiếm</button>
                    </div>
                </form>
            </div>
        </div>
        
        <a href="{{ route('bat-dong-san.create') }}" class="btn btn-success mb-3" style="margin:15px ">Thêm mới bất động
            sản</a>
        <div class="row">
            {{-- @for ($i = 0; $i < 6; $i++)
                <div class="col-md-4 mb-4">
                    <div class="card" style="width: 100%;">
                        <img src="..." class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Card title</h5>
                            <p class="card-text">Some quick example text to build on the card title and make up the bulk of
                                the card's content.</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                </div>
            @endfor --}}
            
        </div>
        
        
    </div>
@endsection
