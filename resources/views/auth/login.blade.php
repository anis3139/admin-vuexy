<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script
        src="https://kit.fontawesome.com/64d58efce2.js"
        crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="{{asset('login_page/style.css')}}" />
    <title>Sign in & Sign up Form</title>
</head>
<body>
<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            @php
            $setting = \App\Models\Setting::first()
            @endphp
            <form action="{{ route('login') }}" method="POST" class="sign-in-form">
                @csrf
                <img src="{{ $setting->logo ?? asset('login_page/img/logo.png') }}" alt="" class="logo-img">
                <h2 class="title">Sign in</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input id="email" placeholder="Email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input id="password" placeholder="Password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                    @enderror
                </div>
                <input type="submit" value="Login" class="btn solid" />

               <div class="social-media">
                   <a href="#" class="social-icon">
                       <i class="fab fa-facebook-f"></i>
                   </a>
                   <a href="#" class="social-icon">
                       <i class="fab fa-twitter"></i>
                   </a>
                   <a href="#" class="social-icon">
                       <i class="fab fa-google"></i>
                   </a>
                   <a href="#" class="social-icon">
                       <i class="fab fa-linkedin-in"></i>
                   </a>
               </div>
            </form>


            <form action="#" class="sign-up-form">
                <img src="{{ $setting->logo ?? asset('login_page/img/logo.png') }}" alt="" class="logo-img">
                <h2 class="title">Sign up</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username" />
                </div>
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" placeholder="Email" />
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" />
                </div>
                <input type="submit" class="btn" value="Sign up" />
                <p class="social-text">Or Sign up with social platforms</p>
                <div class="social-media">
                    <a href="#" class="social-icon">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="#" class="social-icon">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </form>



        </div>
    </div>

    <div class="panels-container">
        <div class="panel left-panel">
           <div class="content">
               <h3>Sign In</h3>
               <p >
                {{ $setting->site_title ?? 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
                ex ratione. Aliquid!' }} 
               </p>
               <button class="btn transparent" id="sign-up-btn">
                   Sign up
               </button>
           </div>
            <img src="{{ $setting->default_image ?? asset('login_page/img/sideimage.png') }}" class="image" alt="" />
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3>One of us ?</h3>
                <p>
                    {{ $setting->site_title ?? 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Debitis,
                    ex ratione. Aliquid!' }} 
                </p>
                <button class="btn transparent" id="sign-in-btn">
                    Sign in
                </button>
            </div>
            <img src="{{ $setting->default_image ?? asset('login_page/img/sideimage.png') }}" class="image" alt="" />
        </div>
    </div>
</div>

<script src="{{asset('login_page/app.js')}}"></script>
</body>
</html>
