<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="{{url('dashboard')}}" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary"><i class="fa fa-user-edit me-2"></i>{{Setting::app()}}</h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{url('assets/img/user.jpg')}}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{Session::get('name')}}</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="{{url('dashboard')}}" class="nav-item nav-link @if($link=='dashboard') active @endif"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="{{url('artikel')}}" class="nav-item nav-link @if($link=='artikel') active @endif"><i class="fa fa-th me-2"></i>Artikel</a>
            <a href="{{url('contact')}}" class="nav-item nav-link @if($link=='contact') active @endif"><i class="fa fa-th me-2"></i>Contact</a>
            <div class="nav-item dropdown">
                <a href="#" class="nav-link dropdown-toggle @if($link=='kategori_artikel') active @endif" data-bs-toggle="dropdown"><i class="far fa-file-alt me-2"></i>Data</a>
                <div class="dropdown-menu bg-transparent border-0">
                    <a href="{{url('kategori-artikel')}}" class="dropdown-item" @if($link=='kategori_artikel') style="color: red" @endif>Kategori Artikel</a>
                </div>
            </div>
        </div>
    </nav>
</div>