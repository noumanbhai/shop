<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fas fa-laugh-wink"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item active">
        <a class="nav-link" href="index.html">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Heading -->
        <div class="sidebar-heading">
            Interface
        </div>

        <!-- Nav Item - Pages Collapse Menu -->
   <li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseOne"
aria-expanded="true" aria-controls="collapseOne">
<i class="fas fa-fw fa-cog"></i>
<span>Category</span>
</a>
<div id="collapseOne" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
<div class="bg-white py-2 collapse-inner rounded">
<h6 class="collapse-header">Category:</h6>
<a class="collapse-item" href="{{route('category.index')}}">Category</a>
<a class="collapse-item" href="{{route('subcategory.index')}}">Sub Category</a>
<a class="collapse-item" href="{{route('brand.index')}}">Brand</a>
</div>
</div>
</li>

<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseseven"
aria-expanded="true" aria-controls="collapseseven">
<i class="fas fa-fw fa-cog"></i>
<span>Coupon</span>
</a>
<div id="collapseseven" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
<div class="bg-white py-2 collapse-inner rounded">
<h6 class="collapse-header">Coupon:</h6>
<a class="collapse-item" href="{{route('coupon.index')}}">counpn</a>
</div>
</div>
</li>
<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsesix"
aria-expanded="true" aria-controls="collapsesix">
<i class="fas fa-fw fa-cog"></i>
<span>Other</span>
</a>
<div id="collapsesix" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
<div class="bg-white py-2 collapse-inner rounded">
<h6 class="collapse-header">Other:</h6>
<a class="collapse-item" href="{{route('other.index')}}">counpn</a>
</div>
</div>
</li>
<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsefive"
aria-expanded="true" aria-controls="collapsefive">
<i class="fas fa-fw fa-cog"></i>
<span>Product</span>
</a>
<div id="collapsefive" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
<div class="bg-white py-2 collapse-inner rounded">
<h6 class="collapse-header">Add Product:</h6>
<a class="collapse-item" href="{{route('product.index')}}">Add Product</a>
<a class="collapse-item" href="{{route('product.index')}}">Add Product</a>
</div>
</div>
</li>
<li class="nav-item">
<a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseten"
aria-expanded="true" aria-controls="collapseten">
<i class="fas fa-fw fa-cog"></i>
<span>Blog</span>
</a>
<div id="collapseten" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
<div class="bg-white py-2 collapse-inner rounded">
<h6 class="collapse-header">Blog:</h6>
<a class="collapse-item" href="{{route('postcategory.index')}}">Blog Post Category</a>
<a class="collapse-item" href="{{route('post.index')}}">Blog Post List</a>
</div>
</div>
</li>

    <!-- Nav Item - Utilities Collapse Menu -->
    <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities"
        aria-expanded="true" aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-wrench"></i>
        <span>Utilities</span>
    </a>
    <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities"
    data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Custom Utilities:</h6>
        <a class="collapse-item" href="utilities-color.html">Colors</a>
        <a class="collapse-item" href="utilities-border.html">Borders</a>
        <a class="collapse-item" href="utilities-animation.html">Animations</a>
        <a class="collapse-item" href="utilities-other.html">Other</a>
    </div>
</div>
</li>

<!-- Divider -->
<hr class="sidebar-divider">

<!-- Heading -->
<div class="sidebar-heading">
    Addons
</div>

<!-- Nav Item - Pages Collapse Menu -->
<li class="nav-item">
    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
    aria-expanded="true" aria-controls="collapsePages">
    <i class="fas fa-fw fa-folder"></i>
    <span>Pages</span>
</a>
<div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
    <div class="bg-white py-2 collapse-inner rounded">
        <h6 class="collapse-header">Login Screens:</h6>
        <a class="collapse-item" href="login.html">Login</a>
        <a class="collapse-item" href="register.html">Register</a>
        <a class="collapse-item" href="forgot-password.html">Forgot Password</a>
        <div class="collapse-divider"></div>
        <h6 class="collapse-header">Other Pages:</h6>
        <a class="collapse-item" href="404.html">404 Page</a>
        <a class="collapse-item" href="blank.html">Blank Page</a>
    </div>
</div>
</li>

<!-- Nav Item - Charts -->
<li class="nav-item">
    <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
    </li>

    <!-- Nav Item - Tables -->
    <li class="nav-item">
        <a class="nav-link" href="tables.html">
            <i class="fas fa-fw fa-table"></i>
            <span>Tables</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>