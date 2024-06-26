@extends('home')

@section('content')
    <div class="modal-body">
        <form action="{{ route('roles.update', $role->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="roleName" class="form-label">Tên chức vụ</label>
                <input type="text" class="form-control" id="roleName" name="name" value="{{ $role->name }}">
            </div>
            <div class="mb-3">
                <label for="permissions" class="form-label">Quyền</label>
                <div class="d-flex flex-column">
                    @foreach ($dataPermission as $permission)
                        <div class="form-check form-switch mb-3">
                            <input class="form-check-input" type="checkbox" role="switch" id="{{ $permission->id }}"
                                name="permissions[]" {{ in_array($permission->id, $role_permission) ? 'checked' : '' }}
                                value="{{ $permission->id }}">
                            <label class="form-check-label"
                                for="permission{{ $permission->id }}">{{ $permission->name }}</label>
                        </div>
                    @endforeach
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Sửa</button>
        </form>
    </div>
@endsection
