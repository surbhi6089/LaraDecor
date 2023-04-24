<x-layout>
    <x-slot name='title'>All Categories</x-slot>
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
            <table class="table all-table">
                <thead>
                  <tr class="table-heading">
                    <th scope="col">Category</th>
                    <th scope="col">Total Items</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                    <tr>
                        <td>{{$category->name}}</td>
                        <td>{{$category->product()->count()}}</td>
                        <td>
                            <div class="table-btn">
                                <a href={{url('edit-category/'.$category->id)}}><button class="primary-button">Edit</button></a>
                                <a href={{url('delete-category/'.$category->id)}}><button class="primary-button">Delete</button></a>
                            </div>
                        </td>

                      </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </x-app-layout>
    <x-footer></x-footer>
</x-layout>
