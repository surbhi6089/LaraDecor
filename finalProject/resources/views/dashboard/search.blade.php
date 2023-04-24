<x-layout>
    <x-slot name='title'>Search</x-slot>
    <x-app-layout>
        <div>
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
        </div>
        @if($results->isEmpty())
        <div class="no-result">
            <p>No products match your search!</p>
        </div>
        @endif
        @if(!$results->isEmpty())
        <div class="table-container">
            <table class="table">
                <tbody>
                    @foreach ($results as $result)
                        <tr>
                            @if(class_basename($result) == "Product")
                            <td><img src="{{$result->image}}" alt="image"></td>
                            <td>{{$result->title}}</td>
                            <td>Category: {{$result->category->name}}</td>
                            <td>Price: ${{$result->price}}</td>
                            <td>
                                <div class="table-btn">
                                    <a href={{url('edit-product/'.$result->id)}}><button class="primary-button">Edit</button></a>
                                    <a href={{url('delete-product/'.$result->id)}}><button class="primary-button">Delete</button></a>
                                </div>
                            </td>
                            @endif
                            @if(class_basename($result) == "Category")
                            <td>{{$result->name}}</td>
                            <td>Total Products: {{$result->product()->count()}}</td>
                            <td>
                                <div class="table-btn">
                                    <a href={{url('edit-category/'.$result->id)}}><button class="primary-button">Edit</button></a>
                                    <a href={{url('delete-category/'.$result->id)}}><button class="primary-button">Delete</button></a>
                                </div>
                            </td>
                            @endif
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </x-app-layout>
    <x-footer></x-footer>
</x-layout>
