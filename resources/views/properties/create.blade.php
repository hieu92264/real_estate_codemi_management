{{-- test --}}
@extends('home')
@section('content')
    <h6 class="mb-4">Thêm mới bất động sản</h6>
    <form>
        <fieldset class="row mb-3">
            <legend class="col-form-label col-sm-2 pt-0">Loại bất động sản</legend>
            <div class="col-sm-10">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="option1"
                        checked="">
                    <label class="form-check-label" for="gridRadios1">
                        Nhà
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios2" value="option2">
                    <label class="form-check-label" for="gridRadios2">
                        Đất nền
                    </label>
                </div>
            </div>
        </fieldset>
        <label for="">Trạng thái</label>
        <select class="form-select form-select-sm mb-3" aria-label=".form-select-sm example">
            <option value="1">Đã bán</option>
            <option value="2">Đang bán</option>
            <option value="3">Chờ xử lí</option>
        </select>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Thành phố</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Huyện</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Phường</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3">
            </div>
        </div>
        <div class="row mb-3">
            <label for="inputEmail3" class="col-sm-2 col-form-label">Đường</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="inputEmail3">
            </div>
        </div>
        <div class="mb-3">
            <label for="formFile" class="form-label">Hình ảnh</label>
            <input class="form-control" type="file" id="formFile">
        </div>
        <button type="submit" class="btn btn-primary">Sign in</button>
    </form>
@endsection
