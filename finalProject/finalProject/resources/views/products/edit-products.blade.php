<x-layout>
    <x-slot name='title'>Edit Product</x-slot>
    <x-app-layout>
        <div class="form-container">
            <form class = "form-create form-edit" action = {{url('update-product/'.$product->id)}} method="post" enctype="multipart/form-data">
                @csrf
                @method("PUT")
                <div class="form-create-heading">
                    <p>Edit Product</p>
                </div>
                @if($product->image == null)
                <img src="{{asset('/storage/images/aboutus/20.jpg')}}" alt="">
                @endif
                @if($product->image != null)
                <img src="{{asset('/storage/images/products/'.$product->image)}}" alt="img">
                @endif
                <div class="form-group mb-4">
                    <label for="exampleFormControlFile1">Change Image</label>
                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <div class="form-group mb-4">
                    <label for="exampleFormControlSelect1">Product Type</label>
                    <select name="category_id" class="form-control" id="exampleFormControlSelect1">
                      @foreach ($categories as $category )
                      <option value={{$category->id}}>{{$category->name}}</option>
                      @endforeach
                    </select>
                  </div>
                <div class="form-group mb-4">
                    <label for="exampleFormControlInput1">Product Name</label>
                  <input type="text" name="title" value="{{$product->title}}" placeholder="title" required><br><br>
                </div>
                <div class="form-group mb-4">
                    <label for="exampleFormControlInput1">Product Price</label>
                    <input type="text" name="price" value="{{$product->price}}" placeholder="price" required>
                </div>
                <div class="right">
                    <button type="submit" class="main-button">Update</button>
                </div>
              </form>
        </div>
        <x-footer></x-footer>
    </x-app-layout>
</x-layout>


