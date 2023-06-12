<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="javascript:void(0)">
                <img src="{{ asset('/assets/img/brand/blue.png') }}" class="navbar-brand-img" alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ url('/admin/') }}">
                            <i class="ni ni-tv-2 text-primary"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.supplier.index') }}">
                            <i class="ni ni-planet text-orange"></i>
                            <span class="nav-link-text">Supplier</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.supplier.index') }}">
                            <i class="ni ni-planet text-orange"></i>
                            <span class="nav-link-text">Category</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.supplier.index') }}">
                            <i class="ni ni-planet text-orange"></i>
                            <span class="nav-link-text">Brand</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.supplier.index') }}">
                            <i class="ni ni-planet text-orange"></i>
                            <span class="nav-link-text">Color</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.product.index') }}">
                            <i class="ni ni-planet text-orange"></i>
                            <span class="nav-link-text">Product</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.income.index') }}">
                            <i class="ni ni-planet text-orange"></i>
                            <span class="nav-link-text">Income</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.supplier.index') }}">
                            <i class="ni ni-planet text-orange"></i>
                            <span class="nav-link-text">Outcome</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/order') }}">
                            <i class="ni ni-planet text-orange"></i>
                            <span class="nav-link-text">Product Order</span>
                        </a>
                    </li>
                </ul>
                <!-- Divider -->

            </div>
        </div>
    </div>
</nav>