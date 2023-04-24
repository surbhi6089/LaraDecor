<x-layout>
    <x-slot name='title'>Categories || LaraDecor</x-slot>
    <x-app-layout>
        <div class="category-container">
            <div class="col-md-12 mb-3 sort">
                <span class="font-weight-bold sort-font">Sort By :</span>
                <a href="{{URL::current()."?sort=price_low_to_high"}}">Price - Low to High</a>
                <span class="divide">|</span>
                <a href="{{URL::current()."?sort=price_high_to_low"}}">Price - High to Low</a>
                <span class="divide">|</span>
                <a href="{{URL::current()."?sort=latest"}}">Latest</a>
                <span class="divide">|</span>
                <a href="{{URL::current()}}">All</a>

            </div>
            <div class="home-product-container">
                @foreach ($products as $product )
                <div class="product-container">
                    @if($product->image == null)
                    <td><img src="{{asset('/storage/images/aboutus/20.jpg')}}" alt=""></td>
                    @endif
                    @if($product->image != null)
                        <td><img src="{{asset('/storage/images/products/'.$product->image)}}" alt="img"></td>
                    @endif
                    <img src="{{$product->image}}" alt="">
                    <h4>
                        {{$product->title}}
                    </h4>
                    <h6>
                        Price:$ {{$product->price}}
                    </h6>
                </div>
                @endforeach
            </div>
        </div>
        <div class="pagination">
            {{$products->links('pagination::bootstrap-4')}}
        </div>
    </x-app-layout>
    <x-footer></x-footer>
</x-layout>
