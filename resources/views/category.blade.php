@extends('front_end.layouts._master')
@section('title', $title)
@section('content')
    <div class="col-md-7 shadow p-2" style="box-sizing: border-box">

        <h6> Home / {{ $category_name->nameBn }} খবর</h6>

        <div class="news_3_title pt-2">
            <a href="#">
                <h5 class="float-left mr-2 news_heading">{{ $category_name->nameBn }} খবর</h5>
            </a>
            <div class="strip"></div>
            <div class="clarfix"></div>


            @forelse($categorywisenews as $news)
            <div class="news_shadow mt-5 pt-3">

                <div class="single-catagori pb-4 border-bottom mb-5">
                    <a href="#"><h2 class="main_news_heading">{{ $news->title }}</h2></a>

                    <p><i class="far fa-clock"></i> {{ $news->created_at->toFormattedDateString() }}</p>
                    <h2 class="main_news_heading mb-2"><i class="fas fa-folder"></i> {{ $news->category->nameBn }}, সর্বশেষ সংবাদ</h2>
                    <div class="d-flex">
                        <div class="w-50" style="box-sizing: border-box">
                            <img src="{{ asset($news->image) }}" alt="">
                        </div>
                        <div class="w-50 pl-3" style="box-sizing: border-box">
                            <p>
                                {{ \Illuminate\Support\Str::limit($news->description, 300, '') }}
                                ......
                            </p>
                        </div>
                    </div>
                    <br>
                    <div class="news-btn text-right">
                        <a href="{{ route('frontpage.newsview', $news->id) }}" class="readMore">Read More »</a>
                    </div>

                </div>

            </div>

            @empty
                <br>
                <br>
                <div class="alert alert-danger" role="alert">
                 !! Sorry Empty List.
                </div>
            @endforelse



        </div>

    </div>
    <!--col-md-7-->
@endsection

