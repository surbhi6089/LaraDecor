<x-layout>
    <x-slot name='title'>Editor Dashboard || LaraDecor</x-slot>
    <x-app-layout>
            <div class="admin-dashboard-container">
                <div class="sidebar-container-editor">
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
                </div>

                <div class="admin-body">
                    <div class="p-6 text-gray-900 dashboard-msg-ediotr">
                        {{ __("Welcome back ") }}{{$editor}}{{"!"}}
                    </div>
                    <div>
                        @if(session()->has('message'))
                            <div class="alert alert-success alert-dismissible fade show confirm" role="alert">
                                {{session()->get('message')}}
                                <div class="right">
                                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        @endif
                    </div>
                    <div class="editor-heading">
                        <h1>Products</h1>
                    </div>
                    <div class="table-container-editor">
                        <table class="table all-table" >
                            <thead>
                            <tr class="table-heading">
                                <th scope="col">Product</th>
                                <th scope="col">Category</th>
                                <th scope="col">Product Name</th>
                                <th scope="col">Product Price</th>
                                <th scope="col">Action</th>
                            </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product )
                                <tr>
                                    @if($product->image == null)
                                        <td><img src="{{asset('/storage/images/aboutus/20.jpg')}}" alt=""></td>
                                    @endif
                                    @if($product->image != null)
                                        <td><img src="{{asset('/storage/images/products'.$product->image)}}" alt=""></td>
                                    @endif
                                    <td>{{$product->category->name}}</td>
                                    <td>{{$product->title}}</td>
                                    <td>{{$product->price}}</td>
                                    <td>
                                        <div class="table-btn">
                                            <a href={{url('edit-product/'.$product->id)}}><button class="primary-button">Edit</button></a>
                                            <a href={{url('delete-product/'.$product->id)}}><button class="primary-button">Delete</button></a>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="pagination">
                            {{$products->links('pagination::bootstrap-4')}}
                        </div>
                    </div>
                </div>
            </div>
    </x-app-layout>
</x-layout>
