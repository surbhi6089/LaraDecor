<x-layout>
    <x-slot name='title'>AboutUs || LaraDecor</x-slot>
    <x-app-layout>
            @foreach ($infos as $info )
            <div class="aboutus-container">
                <div class="img-fluid aboutus-img">
                    <img src="{{asset('/storage/images/home/logo.png')}}" alt="...">
                </div>
                <div class="aboutus-info">
                    <h1>{{$info->heading}}</h1>
                    <p>{{$info->content}}</p>
                </div>
            </div>

            @endforeach
            <x-footer></x-footer>
    </x-app-layout>
</x-layout>
