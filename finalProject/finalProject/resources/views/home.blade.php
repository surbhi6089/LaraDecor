<x-layout>
    <x-slot name='title'>Home || LaraDecor</x-slot>
    <x-app-layout>
        <div id="carouselExampleControls" class="carousel slide home-slider" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{asset('/storage/images/home/home3.jpg')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('/storage/images/home/2-01.png')}}" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="{{asset('/storage/images/home/3-01.png')}}" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
        <div class="home-container">
            <div class="home-welcome">
                <div>
                    <h1>Welcome to LaraDecor</h1>
                </div>
                <div>
                    <p>Decor space to find what suits your personal taste</p>
                </div>
            </div>
            <div class="home-latest">
                <h1>New Arrivals</h1>
            </div>
            <div class="home-product-container">
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
            <a>
                <div class="home-categories">
                    <h1>Categories</h1>
                </div>
            </a>
            <div class="home-product-container">
                <a href="/categories/1">
                    <div class="product-container">
                        <img src="{{asset('/storage/images/products/10.jpg')}}" alt="">
                        <p>Rugs/Carpets</p>
                    </div>
                </a>
                <a href="/categories/2">
                    <div class="product-container">
                        <img src="{{asset('/storage/images/products/27.jpg')}}" alt="">
                        <p>Paintings</p>
                    </div>
                </a>
                <a href="/categories/3">
                    <div class="product-container">
                        <img src="{{asset('/storage/images/products/22.jpg')}}" alt="">
                        <p>Statue</p>
                    </div>
                </a>
                <a href="/categories/4">
                    <div class="product-container">
                        <img src="{{asset('/storage/images/products/9.jpg')}}" alt="">
                        <p>Wall Decor</p>
                    </div>
                </a>
            </div>
        </div>
        <x-footer></x-footer>
    </x-app-layout>
</x-layout>


