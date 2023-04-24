<x-layout>
    <x-slot name='title'>Add Product</x-slot>
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
        <div class="form-container">
            <form class = "form-create" action ="{{ url('create-product')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-create-heading">
                    <p>New Product</p>
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
                  <input type="text" name="title" placeholder="title" required>
                </div>
                <div class="form-group mb-4">
                    <label for="exampleFormControlInput1">Product Price</label>
                    <input type="text" name="price" placeholder="price" required>
                </div>
                <div class="form-group mb-4">
                    <label for="exampleFormControlFile1">Upload Image</label>
                    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                </div>
                <div class="right">
                    <button type="submit" class="main-button">Add Product</button>
                </div>
              </form>
        </div>
        <x-footer></x-footer>
    </x-app-layout>
</x-layout>

