<nav class="navbar bg-danger-subtle">
    <div class="container-fluid">
        <a class="navbar-brand text-white" href="/">Baktify</a>
        <div class="" id="navbarSupportedContent">
            <ul class="nav mb-2 mb-lg-0">
                @can('admin')
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/add_category">Add Category</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/insert_product">Insert Product</a>
                    </li>
                @endcan
                <li class="nav-item">
                    <a class="nav-link text-white" href="/about">About Us</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="/products">Products</a>
                </li>
                @can('normal')
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/transaction">Transaction</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/carts">Cart</a>
                    </li>
                @endcan('normal')


                @auth
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/profile">Profile</a>
                    </li>
                @else
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/register">Register</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="/login">Login</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
