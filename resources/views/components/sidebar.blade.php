<div class="main-sidebar sidebar-style-2">
    <aside id="sidebar-wrapper">
        <div class="sidebar-brand">
            <a href="#">Inventory</a>
        </div>
        <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">Inv</a>
        </div>
        <ul class="sidebar-menu">

            <li class="{{ Request::is('dashboard') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('dashboard') }}"><i class="fas fa-home"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li class="{{ Request::is('categories') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('category.index') }}"><i class="fas fa-dolly-flatbed"></i>
                    <span>Categories</span>
                </a>
            </li>

            <li class="{{ Request::is('products*') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('product.index') }}"><i class="fas fa-box"></i>
                    <span>Products</span>
                </a>
            </li>

            <li class="{{ Request::is('supplyings') ? 'active' : '' }}">
                <a class="nav-link"
                    href="{{ route('supplying.index') }}"><i class="fas fa-shipping-fast"></i>
                    <span>Supplying</span>
                </a>
            </li>
        </ul>

        {{-- <i class="fas fa-shipping-fast"></i> --}}

        {{-- <div class="hide-sidebar-mini mt-4 mb-4 p-3">
            <a href="https://getstisla.com/docs"
                class="btn btn-primary btn-lg btn-block btn-icon-split">
                <i class="fas fa-rocket"></i> Documentation
            </a>
        </div> --}}
    </aside>
</div>
