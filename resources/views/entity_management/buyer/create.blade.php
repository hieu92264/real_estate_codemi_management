@extends('home')

@section('content')
    <div class="container d-flex justify-content-center">
        <div class="col-md-8">
            <h4 class="mb-4 text-center">Tạo Người Mua Mới</h4>
            <form action="{{ route('danh-sach-nguoi-mua.store') }}" method="POST" class="w-100">
                @csrf
                <div class="mb-3 row">
                    <label for="inputName" class="col-sm-3 col-form-label text-end">Tên:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputName" name="name" placeholder="Nhập tên"
                            required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputEmail" class="col-sm-3 col-form-label text-end">Email:</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Nhập email"
                            required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputPhone" class="col-sm-3 col-form-label text-end">Số điện thoại:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputPhone" name="phone"
                            placeholder="Nhập số điện thoại" required>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="inputAddress" class="col-sm-3 col-form-label text-end">Địa chỉ:</label>
                    <div class="col-sm-9">
                        <input type="text" class="form-control" id="inputAddress" name="address"
                            placeholder="Nhập địa chỉ" required>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary">Tạo Người Mua</button>
                </div>
            </form>
            <hr class="my-5 w-100">
            <h4 class="mb-4 text-center">Thêm Người Mua Từ File Excel</h4>
            <form action="{{ route('danh-sach-nguoi-mua.store') }}" method="POST" enctype="multipart/form-data"
                class="w-100">
                @csrf
                <div class="mb-3 row">
                    <label for="inputExcelFile" class="col-sm-3 col-form-label text-end">Chọn File Excel:</label>
                    <div class="col-sm-9">
                        <input type="file" class="form-control" id="inputExcelFile" name="excel_file"
                            accept=".xlsx, .xls" required>
                    </div>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-success">Tải lên và Xử lý</button>
                </div>
            </form>
        </div>
    </div>
@endsection
