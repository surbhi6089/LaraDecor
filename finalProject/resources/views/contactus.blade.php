<x-layout>
    <x-slot name='title'>ContactUs || LaraDecor</x-slot>
    <x-app-layout>
        <div class="contact-container">
            @foreach ($infos as $info )
            <div class="contact">
                <div class="welcome-logo">
                    <p> 彡Stay in touch with彡</p>
                    <img src="{{asset('/storage/images/home/logo.png')}}" alt="...">
                </div>
                    <div class="contactus-info">
                        <h1>Email Address</h1>
                        <a href="mailto:laradecor@gmail.com" target="_blank"><button>{{$info->email}}</button></a>
                        <h1>Instagram</h1>
                        <a href="https://www.instagram.com/accounts/login/" target="_blank"><button>{{$info->instagram}}</button></a>
                        <h1>Facebook</h1>
                        <a href="https://www.facebook.com/" target="_blank"><button>{{$info->facebook}}</button></a>
                        <h1>Twitter</h1>
                        <a href="https://twitter.com/i/flow/login" target="_blank"><button>{{$info->twitter}}</button></a>

                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </x-app-layout>
    <x-footer></x-footer>
</x-layout>
