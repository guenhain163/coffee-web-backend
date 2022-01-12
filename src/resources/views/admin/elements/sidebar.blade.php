<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="/admin-lte/index3.html" class="brand-link">
      <img src="/admin-lte/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AdminLTE 3</span>
    </a>

    <!-- Sidebar -->
    <nav class="mt-5 pt-3">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
                 with font-awesome or any other icon font library -->
            <li class="nav-item mb-2">
                <a href="{{ route('admin.index') }}" class="nav-link m-auto {{ Request::is('admin') || Request::is('admin/dashboard/*') ?
                                                        'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('admin.products.index') }}" class="nav-link m-auto {{ Request::is('admin/products') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-user"></i>
                    <p>Quản lý sản phẩm</p>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link m-auto">
{{--                <a href="{{ route('admin.companies.index') }}" class="nav-link m-auto {{ Request::is('admin/companies') ? 'active' : '' }}">--}}
                    <i class="nav-icon fas fa-building"></i>
                    <p>Quản lý hóa đơn</p>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link m-auto">
{{--                <a href="{{ route('admin.invoices.index') }}" class="nav-link m-auto {{ Request::is('admin/invoices') ? 'active' : '' }}">--}}
                    <i class="nav-icon fas fa-money-bill"></i>
                    <p>Quản lý lịch làm</p>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link m-auto">
{{--                <a href="{{ route('admin.contacts.index') }}" class="nav-link m-auto {{ Request::is('admin/contacts') ? 'active' : '' }}">--}}
                    <i class="nav-icon fas fa-address-card"></i>
                    <p>Quản lý liên hệ</p>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="#" class="nav-link m-auto">
{{--                <a href="{{ route('admin.accounts.index') }}" class="nav-link m-auto {{ Request::is('admin/accounts') ? 'active' : '' }}">--}}
                    <i class="nav-icon fas fa-users-cog"></i>
                    <p>Quản lý Admin</p>
                </a>
            </li>
            <li class="nav-item mb-2">
                <a href="{{ route('admin.logout') }}" class="nav-link m-auto">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>Đăng xuất</p>
                </a>
            </li>
        </ul>
    </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
