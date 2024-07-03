@extends('home')

@section('content')
<div class="container d-flex justify-content-center align-items-center flex-column rounded p-4" style="max-width: 800px; margin-top: 0;">
    <h4 class="mb-4 text-center">Tạo Người Bán Mới</h4>
    <form action="{{ route('danh-sach-nguoi-ban.store') }}" method="POST" class="w-100" style="max-width: 600px;">
        @csrf
        <div class="mb-3 row">
            <label for="inputName" class="col-sm-4 col-form-label text-end">Tên:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="inputName" name="name" placeholder="Nhập tên">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputEmail" class="col-sm-4 col-form-label text-end">Email:</label>
            <div class="col-sm-8">
                <input type="email" class="form-control" id="inputEmail" name="email" placeholder="Nhập email">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputPhone" class="col-sm-4 col-form-label text-end">Số điện thoại:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="inputPhone" name="phone" placeholder="Nhập số điện thoại">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="inputAddress" class="col-sm-4 col-form-label text-end">Địa chỉ:</label>
            <div class="col-sm-8">
                <input type="text" class="form-control" id="inputAddress" name="address" placeholder="Nhập địa chỉ">
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">Tạo người bán</button>
        </div>
    </form>
    <hr class="my-5 w-100">
    <h4 class="mb-4 text-center">Thêm Người Bán Từ File Excel</h4>
    <form action="{{ route('danh-sach-nguoi-ban.store') }}" method="POST" enctype="multipart/form-data" class="w-100" style="max-width: 600px;">
        @csrf
        <div class="mb-3 row">
            <label for="inputExcelFile" class="col-sm-4 col-form-label text-end">Chọn File Excel:</label>
            <div class="col-sm-8">
                <input type="file" class="form-control" id="inputExcelFile" name="excel_file" accept=".xlsx, .xls">
            </div>
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-success">Tải lên và Xử lý</button>
        </div>
    </form>
</div>
@endsection
