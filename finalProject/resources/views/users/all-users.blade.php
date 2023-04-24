<x-layout>
    <x-slot name='title'>All Users</x-slot>
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
                    <th scope="col">Username</th>
                    <th scope="col">User Email</th>
                    <th scope="col">Action</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>
                            <div class="table-btn">
                                <a href={{url('delete-user/'.$user->id)}}><button class="primary-button">Delete User Account</button></a>                        </div>
                        </td>

                      </tr>
                    @endforeach
                </tbody>
              </table>
        </div>
    </x-app-layout>
    <x-footer></x-footer>
</x-layout>
