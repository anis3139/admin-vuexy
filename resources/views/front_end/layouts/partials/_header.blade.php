<header>
    <div class="container">
        <div class="head pt-2 fix  pb-4">
            <div class="logoSection float-left">
                <img src="webimg/logo.png" alt="">
            </div>
            <div class="menusection float-right">
                <nav class="top-menu">
                    <ul class="menu">
                        <li><a href="{{ route('frontpage.index') }}">প্রথম পাতা</a></li>
                        @foreach($categories as $category)
                        <li><a href="{{ route('frontpage.categorywise',$category->id) }}">{{ $category->nameBn }}</a></li>
                        @endforeach
                        <li><a href="{{ route('login') }}" target="_blank">লগইন(Login)</a></li>
                    </ul>
                    <i class="fas fa-bars menuIcon"></i>
                </nav>
            </div>
        </div>
    </div>
</header>
