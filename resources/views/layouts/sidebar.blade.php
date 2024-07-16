<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-light navbar-light">
        <a href="{{ route('home') }}" class="navbar-brand mx-1 mb-3 d-inline-block">
            <h2 class="text-primary"><img class="img-logo" src="{{ asset('admin/img/codemi-viet-nam.jpg') }}"></h2>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('admin/img/user.jpg') }}" alt=""
                    style="width: 40px; height: 40px;">
                <div
                    class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1">
                </div>
            </div>
            @if (Auth::check())
                <div class="ms-3">{{ Auth::user()->name }}</h6>
            @endif

        </div>
</div>
<div class="navbar-nav w-100">
    <a href="{{ route('bat-dong-san.index') }}" class="nav-item nav-link"><i class="fa fa-home me-2"></i>Bất
        động sản</a>
    @if (
        (Auth::check() && Auth::user()->hasPermission('Xem thông tin tài khoản')) ||
            (Auth::check() && Auth::user()->hasPermission('Xem thông tin chức vụ')))
        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><i
                    class="fa fa-id-badge me-2"></i>Phân quyền</a>
            <div class="dropdown-menu bg-transparent border-0">
                @if (Auth::check() && Auth::user()->hasPermission('Xem thông tin tài khoản'))
                    <a href="{{ route('users.index') }}" class="dropdown-item"><i class="fa fa-user me-2"></i>Người
                        dùng</a>
                @endif
                @if (Auth::check() && Auth::user()->hasPermission('Xem thông tin chức vụ'))
                    <a href="{{ route('roles.index') }}" class="dropdown-item"><i class="fa fa-briefcase me-2"></i>Chức
                        vụ</a>
                @endif
            </div>
        </div>
    @endif
    <div class="nav-item dropdown">
        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
            <i class="fa fa-user-tie me-2"></i>Quản lý thực thể
        </a>
        <div class="dropdown-menu bg-transparent border-0" style="width: auto;">
            <a href="{{ route('danh-sach-nguoi-mua.index') }}" class="dropdown-item">
                <i class="fa fa-users me-2"></i>Danh mục người mua
            </a>
            <a href="{{ route('danh-sach-nguoi-ban.index') }}" class="dropdown-item ml-auto">
                <i class="fa fa-users me-2"></i>Danh mục người bán
            </a>
        </div>
    </div>
    <div class="nav-item dropdown">
        <a href="" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
            <i class="fas fa-table me-2"></i>Báo cáo thống kê
        </a>
        <div class="dropdown-menu bg-transparent border-0" style="width: auto;">
            <a href="{{ route('map') }}" class="dropdown-item">
                <i class="fas fa-chart-line me-2"></i>Xu hướng giao dịch bất động sản
            </a>
            {{-- <a href="{{ route('danh-sach-nguoi-ban.index') }}" class="dropdown-item ml-auto">
                        <i class="fa fa-users me-2"></i>Thống kê theo khu vực
                    </a> --}}
        </div>
    </div>


</div>
</nav>
</div>
