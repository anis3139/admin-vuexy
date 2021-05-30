<!DOCTYPE html>
<html lang="en">
<head>
    <title> @yield('title')   </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="we provied good web design service in bangladesh with chef rate">
    <meta name="keywords" content="web development service in bangladesh,mobile app development">
    <meta name="author" content="Dhrubo Jyoti Das">
    <script src="https://kit.fontawesome.com/4b5d72e539.js" crossorigin="anonymous"></script>



    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css">



    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('front_end/news-template/css/responsiveMenu.css') }}">
    <link rel="stylesheet" href="{{ asset('front_end/news-template/css/style.css') }}">
</head>

<body>

@include('front_end.layouts.partials._header',['categories' => \App\Models\Category::where('status','1')->get()])

<div class="clearfix"></div>
<div class="news-section">
    <div class="container">
        <div class="newsType">
            <h5><span class="icon_wrap">
                        <spna class="icon-co"></spna> <span class="icon_converter">আজকের সংবাদ শিরোনামঃ </span>
                    </span>

                <marquee behavior="" direction="">
                    @foreach(\App\Models\News::orderBy('created_at', 'desc')->take(5)->get()->pluck('title') as $latest)
                        {{ $latest }} |
                    @endforeach
                </marquee>

            </h5>
        </div>

        <div class="row pt-5">

        @yield('base.content')

        @include('front_end.layouts.partials._rightsidebar',['categories' => \App\Models\Category::where('status','1')->get(),'news' => \App\Models\News::orderBy('created_at', 'desc')->take(5)->get()])

        </div>



    </div> <!-- Container -->




</div>

@include('front_end.layouts.partials._footer')










<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="{{ asset('front_end/news-template/js/responsiveMenu.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script>
    $(document).ready(function() {
        $(".owl-carousel").owlCarousel({
            items: 1,
            loop: true,
            nav: true,
            dots: true,
            autoplay: true,
            autoplaySpeed: 1000,
            smartSpeed: 1500,
            autoplayHoverPause: true
        });
    });
</script>
</body>
</html>





























