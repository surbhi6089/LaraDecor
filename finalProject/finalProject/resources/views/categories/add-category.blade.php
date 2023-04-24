<x-layout>
    <x-slot name='title'>Add Category</x-slot>
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
            <form class = "form-create" action ="{{ url('create-category')}}" method="post">
                @csrf
                <div class="form-create-heading">
                    <p>New Category</p>
                </div>
                <div class="form-group mb-4">
                  <label for="exampleFormControlInput1">Category Name</label>
                  <input type="text" name="name" placeholder="title" required>
                </div>
                <div class="right">
                    <button type="submit" class="main-button">Add Category</button>
                </div>
            </form>
        </div>
        <x-footer></x-footer>
    </x-app-layout>
</x-layout>

