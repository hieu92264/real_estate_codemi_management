@extends('home')
@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h4 class="mb-4">Thông tin người mua</h4>
            <div class="table-responsive">
                <div class="container mt-3">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <form action="{{ route('danh-sach-nguoi-mua.index') }}" method="GET" class="mb-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search"
                                        placeholder="Tìm kiếm người mua..." value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-success">Tìm
                                        Kiếm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <div class="d-flex justify-content-end my-2 mr-3">
                        <a href="{{ route('danh-sach-nguoi-mua.create') }}" class="btn btn-success mb-3"
                            style="margin-right:20px; margin-top:20px">Thêm người mua</a>
                    </div>
                    <table class="table table-bordered text-center custom-table">
                        <thead class="custom-header">
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Tên người mua</th>
                                <th scope="col">Email</th>
                                <th scope="col">Số điện thoại</th>
                                <th scope="col">Địa chỉ</th>
                                <th scope="col">Lịch sử giao dịch</th>
                                <th scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- <tr>
                            <th scope="row">1</th>
                            <td>John</td>
                            <td>Doe</td>
                            <td>jhon@email.com</td>
                            <td>USA</td>
                            <td>123</td>
                        </tr> --}}
                            @foreach ($buyer as $buyers)
                                <tr>
                                    <th scope="row">{{ $buyers->id }}</th>
                                    <td>{{ $buyers->name }}</td>
                                    <td>{{ $buyers->email }}</td>
                                    <td>{{ $buyers->phone }}</td>
                                    <td>{{ $buyers->address }}</td>
                                    <td>{{ $buyers->transaction_history }}</td>
                                    <td class="action-buttons">
                                        <a href="{{ route('danh-sach-nguoi-mua.edit', $buyers->id) }}"
                                            class="btn btn-primary btn-sm">Sửa</a>
                                        {{-- <form class="mt-2" action="{{ route('danh-sach-nguoi-mua.destroy', $buyers->id) }}", method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger btn-sm" value="Xóa">
                                    </form> --}}
                                        <form action="{{ route('danh-sach-nguoi-mua.destroy', $buyers->id) }}"
                                            method="POST" onsubmit="return confirmDelete()">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">Xóa</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <p>
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        @if (session('error'))
                            <p class="error-message">{{ session('error') }}</p>
                        @endif
                    </p>
                    <div>
                        {{ $buyer->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        function confirmDelete() {
            return confirm('Bạn có chắc chắn muốn xóa không?');
        }
    </script>
@endsection
