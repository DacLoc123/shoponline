<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin/main" class="brand-link">
        <img src="/template/admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
             class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Shoe Store Admin</span>
    </a>



    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <ul class="navbar-nav align-items-center">
            <li class="nav-item dropdown m-3 ml-5">
                <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                   aria-expanded="false">
                    <div class="media align-items-center">
                        <span class="rounded-circle">
                            <img src="/template/admin/dist/img/user2-160x160.jpg" width="30px"
                                 class="img-circle elevation-2" alt="User Image">
                        </span>
                        <div class="media-body  ml-2  d-none d-lg-block">
                            <span class="mb-0 text-md-center  font-weight-bold">
                                @if (Session::has('admin_email'))
                                    {{ Session::get('admin_firstname') . ' ' . Session::get('admin_lastname') }}
                                @else
                                    No
                                @endif
                            </span>
                        </div>
                    </div>
                </a>
                <div class="dropdown-menu  dropdown-menu-right">
                    <div class="dropdown-header noti-title">
                        <h6 class="text-overflow m-0 text-dark">Welcome!</h6>
                    </div>
                    <a class="dropdown-item text-dark">
                        <i class="fas fa-info-circle"></i>
                        <span type="button" class="mb-2" data-toggle="modal" data-target="#exampleModal">
                            Thông tin chi tiết
                        </span>
                    </a>
                    <a href="#!" class="dropdown-item text-dark">
                        <i class="fas fa-cog"></i>
                        <span class="text-dark ml-2">Settings</span>
                    </a>
                    <div class="dropdown-divider"></div>
                    <a href="/admin/logout" class="dropdown-item text-dark">
                        <i class="ni ni-user-run"></i>
                        <span>Logout</span>
                    </a>
                </div>
            </li>
        </ul>
        <!-- SidebarSearch Form -->
        <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
   with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Danh Mục
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/menus/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm Danh Mục</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/menus/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách Danh Mục</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-images"></i>
                        <p>
                            Slider
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/slider/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm Slider</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/slider/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách Slider</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-images"></i>
                        <p>
                            Sản phẩm
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/admin/product/add" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Thêm Sản phẩm</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="/admin/product/list" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Danh Sách Sản phẩm</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
