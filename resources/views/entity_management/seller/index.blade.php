@extends('home')
@section('content')
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4">
            <h4 class="mb-4">Thông tin người bán</h4>
            <div class="table-responsive">
                <div class="container mt-3">
                    <div class="row justify-content-center">
                        <div class="col-md-8">
                            <form action="{{ route('danh-sach-nguoi-ban.index') }}" method="GET" class="mb-4">
                                <div class="input-group">
                                    <input type="text" class="form-control" name="search"
                                        placeholder="Tìm kiếm người bán..." value="{{ request('search') }}">
                                    <button type="submit" class="btn btn-primary" style="margin-left: 10pt">Tìm
                                        Kiếm</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <a href="{{ route('danh-sach-nguoi-ban.create') }}" class="btn btn-success btn-sm my-2">Thêm người bán</a>
                {{-- <form action="{{ route('danh-sach-nguoi-ban.index') }}" method="GET" class="mb-4">
                    <div class="input-group">
                        <input type="text" class="form-control" name="search" placeholder="Tìm kiếm người bán..." value="{{ request('search') }}">
                        <button type="submit" class="btn btn-primary">Tìm Kiếm</button>
                    </div>
                </form> --}}

                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Tên người bán</th>
                            <th scope="col">Email</th>
                            <th scope="col">Số điện thoại</th>
                            <th scope="col">Địa chỉ</th>
                            <th scope="col">Lịch sử giao dịch</th>
                            <th scope="col">Hành động</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($sellers as $seller)
                            <tr>
                                <th scope="row">{{ $seller->id }}</th>
                                <td>{{ $seller->name }}</td>
                                <td>{{ $seller->email }}</td>
                                <td>{{ $seller->phone }}</td>
                                <td>{{ $seller->address }}</td>
                                <td>
                                    <a href="{{ route('lich-su-giao-dich.historyTransaction', $seller->id) }}"
                                        class="btn btn-primary btn-sm">Xem</a>
                                </td>
                                <td>
                                    <a href="{{ route('danh-sach-nguoi-ban.edit', $seller->id) }}"
                                        class="btn btn-primary btn-sm">Sửa</a>
                                    <form class="mt-2" action="{{ route('danh-sach-nguoi-ban.destroy', $seller->id) }}"
                                        method="POST" onsubmit="return confirmDelete()">
                                        @csrf
                                        @method('DELETE')
                                        <input type="submit" class="btn btn-danger btn-sm" value="Xóa">
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div>
                    {{ $sellers->links('pagination::bootstrap-4') }}
                </div>
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
