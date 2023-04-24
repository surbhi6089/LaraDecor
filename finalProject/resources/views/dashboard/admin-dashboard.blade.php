<x-layout>
    <x-slot name='title'>Admin Dashboard||LaraDecor</x-slot>
    <x-app-layout>
            <div class="admin-dashboard-container">
                <div class="sidebar-container">
                    <div class="sidebar-items">
                        <a href="home"><h6>Search Dashboard</h6></a>
                        <form action="{{url('/dashboard-search')}}">
                            <div class="dashboard-search">
                                <input type="search" name = "search" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                            </div>
                        </form>
                    </div>
                    <hr>
                    <div class="sidebar-items">
                        <h6>Edit/Delete</h6>
                        <a href="/all-products"><p>Products</p></a>
                        <a href="all-categories"><p>Categories</p></a>
                    </div>
                    <hr>
                    <div class="sidebar-items">
                        <h6>Add</h6>
                        <a href="/add-product"><p>Products</p></a>
                        <a href="/add-category"><p>Categories</p></a>
                    </div>
                    <hr>
                    <div class="sidebar-items">
                        <a href="/all-users"><h6>Delete Users</h6></a>
                    </div>
                </div>

                <div class="admin-body">
                    <div class="p-6 text-gray-900 dashboard-msg">
                        {{ __("Welcome back admin ") }}{{$admin}}{{"!"}}
                    </div>
                    <div class="data-container">
                        <div class="data-items">
                            <h4>Total Products</h4>
                            <h1>{{$totalProducts}}</h1>
                            <a href="/all-products">view</a>
                        </div>
                        <div class="data-items">
                            <h4>Total Categories</h4>
                            <h1>{{$totalCategories}}</h1>
                            <a href="/all-categories">view</a>
                        </div>
                        <div class="data-items">
                            <h4>Total Users</h4>
                            <h1>{{$totalUsers}}</h1>
                            <a href="/all-users">view</a>
                        </div>
                    </div>
                    <div class="admin-body-section">
                        <div class="admin-section">
                            <h4>Admin</h4>
                            <h5>{{$admin}}</h5>
                        </div>
                        <div class="admin-section">
                            <h4>Editor</h4>
                            <h5>{{$editor}}</h5>
                        </div>
                    </div>
                </div>
            </div>
    </x-app-layout>
</x-layout>
