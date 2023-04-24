<x-layout>
    <x-slot name='title'>Home || LaraDecor</x-slot>
    <x-app-layout>
        @if($products->isEmpty())
        <div class="no-result">
            <p>No products match your search!</p>
        </div>
        @endif
        <div class="search-container">
            @foreach ($products as $product )
            <div class="product-container">
                @if($product->image == null)
                        <img src="{{asset('/storage/images/aboutus/20.jpg')}}" alt="">
                    @endif
                    @if($product->image != null)
                    <img src="{{asset('/storage/images/products/'.$product->image)}}" alt="img">
                @endif
                <h4>
                    {{$product->title}}
                </h4>
                <h6>
                    ${{$product->price}}
                </h6>
            </div>
            @endforeach
        </div>
        <x-footer></x-footer>
    </x-app-layout>
</x-layout>
