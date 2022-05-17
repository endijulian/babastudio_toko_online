<nav class="navbar navbar-expand-sm navbar-default">
    <div id="main-menu" class="main-menu collapse navbar-collapse">
        <ul class="nav navbar-nav">
            <li class="{{ (request()->is('home')) ? 'active' : '' }}">
                <a href="{{ route('home') }}"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
            </li>
            <li class="menu-title">Module</li>
            <li class="{{ (request()->is('category*')) ? 'active' : '' }}">
                <a href="{{ route('category.index') }}"> <i class="menu-icon fa fa-table"></i>Category</a>
            </li>
            <li class="{{ (request()->is('product*')) ? 'active' : '' }}">
                <a href="{{ route('product.index') }}"> <i class="menu-icon fa fa-table"></i>Product</a>
            </li>
        </ul>
    </div><!-- /.navbar-collapse -->
</nav>