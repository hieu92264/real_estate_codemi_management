<nav class="navbar navbar-expand bg-light navbar-light sticky-top px-4 py-0">
    <a href="index.html" class="navbar-brand d-flex d-lg-none me-4">
        <h2 class="text-primary mb-0"><i class="fa fa-hashtag"></i></h2>
    </a>
    <a href="#" class="sidebar-toggler flex-shrink-0">
        <i class="fa fa-bars"></i>
    </a>
    <form class="d-none d-md-flex ms-4">
        <input class="form-control border-0" type="search" placeholder="Tìm kiếm">
    </form>
    {{-- <form class="d-none d-md-flex ms-4">
        <input class="form-control border-0" type="search" placeholder="Search">
    </form> --}}
    <div class="navbar-nav align-items-center ms-auto">
        <div class="nav-item dropdown">
        </div>

        <div class="nav-item dropdown">
            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">
                <img class="rounded-circle me-lg-2" src="{{ asset('admin/img/user2.jpg') }}" alt=""
                    style="width: 40px; height: 40px;">
                <span class="d-none d-lg-inline-flex">{{ Auth::user()->name }}</span>
            </a>
            <div class="dropdown-menu dropdown-menu-end bg-light border-0 rounded-0 rounded-bottom m-0">
                <a href="{{ route('logout') }}" class="dropdown-item d-flex align-items-center">
                    <i class="fas fa-sign-out-alt me-2"></i> Log Out
                </a>
                <a href="{{ route('change.password') }}" class="dropdown-item d-flex align-items-center">
                    <i class="fas fa-key me-2"></i> Change Password
                </a>
            </div>
        </div>
    </div>
</nav>
