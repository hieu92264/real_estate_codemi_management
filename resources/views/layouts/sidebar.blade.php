<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="index.html" class="navbar-brand mx-1 mb-3 d-inline-block">
            <h2 class="text-primary"><img src="{{asset('admin/img/codemi-viet-nam.jpg')}}"></h2>
        </a>      
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('admin/img/user.jpg') }}" alt=""
                    style="width: 40px; height: 40px;">
                <div    
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ Auth::user()->name }}</h6>

            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{ route('home') }}" class="nav-item nav-link active"><i class="fa fa-tachometer-alt me-2"></i>Trang chủ</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-laptop me-2"></i>Phân quyền</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('users.index') }}" class="dropdown-item">Người dùng</a>
                    <a href="{{ route('roles.index') }}" class="dropdown-item">Chức vụ</a>
                </div>
            </div>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                        class="fa fa-laptop me-2"></i>Quản lý thực thể</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{ route('danh-sach-nguoi-mua.index') }}" class="dropdown-item">Danh mục người mua</a>
                    <a href="{{ route('danh-sach-nguoi-ban.index') }}" class="dropdown-item">Danh mục người bán</a>
                </div>
            </div>

        </div>
    </nav>
</div>
