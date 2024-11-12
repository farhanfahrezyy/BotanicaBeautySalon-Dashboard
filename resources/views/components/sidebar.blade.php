<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="{{ route('dashboard') }}">Botanica Beauty Salon</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="{{ route('dashboard') }}">BBS</a>
        </div>
        <ul class="sidebar-menu">
            <li class="menu-header">Dashboard Admin</li>

            <li class="nav-item {{ $type_menu === 'dashboard' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('dashboard') }}">
                    <i class="fas fa-fire"></i> <span>Dashboard</span>
                </a>
            </li>

            <li class="{{ $type_menu === 'admin' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.user.index') }}">
                    <i class="fas fa-user"></i> <span>Admin</span>
                </a>
            </li>

            <li class="{{ $type_menu === 'service' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.service.index') }}">
                    <i class="fas fa-spa"></i> <span>Service</span>
                </a>
            </li>

            <li class="{{ $type_menu === 'product' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.products.index') }}">
                    <i class="fas fa-shopping-cart"></i> <span>Product</span>
                </a>
            </li>

            <li class="{{ $type_menu === 'blog' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.blogs.index') }}">
                    <i class="fas fa-blog"></i> <span>Blog</span>
                </a>
            </li>

            <li class="{{ $type_menu === 'review' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('admin.products.reviews') }}">
                    <i class="fas fa-star"></i> <span>Review</span>
                </a>
            </li>

        </ul>
    </aside>
</div>
