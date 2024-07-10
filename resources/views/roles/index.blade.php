@extends('home')
@section('content')
    <div class="d-flex justify-content-end my-2 mr-3">
        <a href="{{ route('roles.create') }}" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#exampleModal"
            style="margin-right: 30px; margin-top: 20px;">Thêm chức vụ</a>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered text-center custom-table">
            <thead class="custom-header">
                <tr>
                    <th scope="col">STT</th>
                    <th scope="col">Tên chức vụ</th>
                    <th scope="col">Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataRole as $index => $role)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $role->name }}</td>
                        <td class="action-buttons d-flex justify-content-center align-items-center">
                            @if (Auth::user()->hasPermission('Sửa chức vụ'))
                                <a href="{{ route('roles.show', $role->id) }}" class="btn btn-primary btnOpenEditModal me-2"
                                    data-role-id="{{ $role->id }}">Sửa</a>
                            @endif
                            @if (Auth::user()->hasPermission('Xóa chức vụ'))
                                <form action="{{ route('roles.destroy', $role->id) }}" method="POST"
                                    style="margin-right: 5px;"
                                    onsubmit="return confirm('Bạn có muốn xóa chức vụ này không');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">Xóa</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    {{-- modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm chức vụ mới</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('roles.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="roleName" class="form-label">Tên chức vụ</label>
                            <input type="text" class="form-control" id="roleName" name="name">
                        </div>
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="mb-3">
                            <label for="permissions" class="form-label">Quyền</label>
                            <div class="d-flex flex-column">
                                @foreach ($dataPermission as $permission)
                                    <div class="form-check form-switch mb-3">
                                        <input class="form-check-input" type="checkbox" role="switch"
                                            id="{{ $permission->id }}" name="permissions[]" value="{{ $permission->id }}">
                                        <label class="form-check-label"
                                            for="permission{{ $permission->id }}">{{ $permission->name }}</label>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Thêm mới</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
