<x-layout>
    <x-slot name='title'>All Products</x-slot>
    <x-app-layout>
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
        <div class="table-container">
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
                            <td><img src="{{asset('/storage/images/products/'.$product->image)}}" alt="img"></td>
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
        </div>
        <div class="pagination">
            {{$products->links('pagination::bootstrap-4')}}
        </div>
    </x-app-layout>
    <x-footer></x-footer>
</x-layout>
