<div class="col-md-5">
    <div class="aside">
        <div class="sideber">


            <div class="news_3_title pt-2">
                <a href="#">
                    <h5 class="float-left mr-2 news_heading">বিভাগসমূহ</h5>
                </a>
                <div class="strip"></div>
            </div>
            <div class="wrap_more_news-2">
                <div class="single-file news-border">
                    <ul>
                        @foreach($categories as $category)
                            <li><a href="{{ route('frontpage.categorywise',$category->id) }}"><i class="far fa-folder"></i> {{ $category->nameBn }} </a></li>
                        @endforeach
                    </ul>
                </div>
            </div>


            <div class="news_3_title pt-2">
                <a href="#">
                    <h5 class="float-left mr-2 news_heading">সর্বশেষ সংবাদ</h5>
                </a>
                <div class="strip"></div>
            </div>

            <div class="wrap_more_news-2 single-file">

                <ul>
                    @foreach($news as $n)
                        <li><a href="{{ route('frontpage.newsview', $n->id) }}">{{ $n->title }}</a></li>
                    @endforeach
                </ul>

            </div>

{{--            <div class="news_3_title pt-4">--}}
{{--                <a href="#">--}}
{{--                    <h5 class="float-left mr-2 news_heading">লগ-ইন করুন</h5>--}}
{{--                </a>--}}
{{--                <div class="strip"></div>--}}
{{--            </div>--}}
{{--            <from action="" method="POST">--}}
{{--                @csrf--}}
{{--                <div class="wrap_more_news-2">--}}
{{--                    <div class="login">--}}
{{--                        <input type="text" placeholder="Username" required>--}}
{{--                        <input type="password" placeholder="Password" required>--}}
{{--                    </div>--}}
{{--                    <a href="{{ route('login') }}" target="_blank" class="readMore">Log in</a>--}}
{{--                </div>--}}
{{--            </from>--}}
{{--            <a href="#" class="lost d-block py-3 text-dark">Lost your Password?</a>--}}

        </div>
    </div>
</div> <!-- col-md-5 -->


