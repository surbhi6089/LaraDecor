<nav class="navbar navbar-expand-lg navbar-dark header">
    <div class="container-fluid">
        <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
            <div class="navbar-nav">
                <a href="#" class="nav-item active nav-link">Home</a>
                <a href="/aboutus" class="nav-item nav-link">About Us</a>
                <a href="#" class="nav-item nav-link">Contact Us</a>
                <div class="nav-item dropdown">
                    <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Categories</a>
                    <div class="dropdown-menu">
                        <a href="/categories/1" class="dropdown-item">Statues</a>
                        <a href="/categories/2" class="dropdown-item">Paintings</a>
                        <a href="/categories/3" class="dropdown-item">Wall Decor</a>
                        <a href="/categories/4" class="dropdown-item">Rugs/Carpets</a>
                    </div>
                </div>
            </div>
            <form class="d-flex" action="{{url('/search')}}">
                <div class="input-group rounded header-search">
                    <input type="search" class="form-control rounded" name = "search" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                    <a href="{{ url('/search') }}"><button><i class="fa fa-search"></i></button></a>
                </div>
            </form>
        </div>
    </div>
</nav>
