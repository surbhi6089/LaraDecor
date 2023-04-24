<x-layout>
    <x-slot name='title'>Welcome To LaraDecor</x-slot>
    <div class="welcome-container">
        <div class="welcome-box">
            <div class="welcome-logo">
                <p> 彡Welcome To彡</p>
                <img src="{{asset('/storage/images/home/logo.png')}}" alt="...">
            </div>
            <div class="welcome-links">
                @if (Route::has('login'))
                    @auth
                    <div class="loggedin">
                        <a href="{{ url('/dashboard') }}" class="nav-item">Dashboard</a>
                    </div>
                        @else
                            <a href="{{ route('login') }}" class="nav-item">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 nav-item">Register</a>
                        @endif
                    @endauth
                 @endif
            </div>
        </div>
    </div>
</x-layout>

