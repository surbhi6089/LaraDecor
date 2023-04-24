<x-layout>
    <x-slot name='title'>Edit Category</x-slot>
    <x-app-layout>
        <div>
            @if(session()->has('message'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session()->get('message')}}
                    <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
        </div>
        <div class="form-container">
            <form class = "form-create" action = {{url('update-category/'.$categories->id)}} method="post">
                @csrf
                @method("PUT")
                <div class="form-create-heading">
                    <p>Edit Category</p>
                </div>
                <div class="form-group mb-4">
                    <label for="exampleFormControlSelect1">Category Name</label>
                    <input type="text" name="name" value="{{$categories->name}}" placeholder="title" required><br><br>
                </div>
                <div class="right">
                    <button type="submit" class="main-button">Update</button>
                </div>
              </form>
        </div>
    </x-app-layout>
</x-layout>


