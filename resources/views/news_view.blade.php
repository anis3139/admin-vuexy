@extends('front_end.layouts._master')
@section('title', $title)
@section('content')
    <div class="col-md-7">
        <p><i class="fas fa-home"></i> Home/ {{ $newsview->category->nameBn }} / {{ $newsview->title }}</p>

        <div class="single-post">

            <div class="post-img">
                <img src="{{ asset($newsview->image) }}" alt="">
            </div>

            <div class="post-text">
                <h2 class="main_news_heading mt-2">{{ $newsview->title }}</h2>

                <p><i class="far fa-clock"></i> {{ $newsview->created_at->toFormattedDateString() }}</p>

                <h2 class="main_news_heading mb-1"><i class="fas fa-folder"></i> {{ $newsview->title }}</h2>
                <div class="icon">
                    <i class="fa fa-eye"></i> <span class="view_counter">{{ $newsview->view_count }}</span>
                </div>

                <h5>{{ $newsview->user->name }}: {{ $newsview->title }}</h5>

                <p>{{$newsview->description}}</p>


            </div>

            <div class="post-share">
                <a href="#"><span><i class="fab fa-facebook"></i> Facebook</span></a>
                <a href="#"><span><i class="fab fa-linkedin"></i> Linkedin</span></a>
                <a href="#"><span><i class="fab fa-twitter-square"></i> Twitter</span></a>
            </div>

        </div> <!-- single post -->

        <div class="news_3_title">
            <a href="#">
                <h5 class="float-left mr-2 news_heading">About birganj24</h5>
            </a>
            <div class="strip">
            </div>
        </div>

        <div class="about shadow p-4 rounded news-border mb-5">
            <i class="fa fa-user"></i>
        </div>


        <div class="news_3_title">
            <a href="#">
                <h5 class="float-left mr-2 news_heading">Related News</h5>
            </a>
            <div class="strip"></div>
        </div>



        <div class="similer-post news-border shadow p-2 mb-5">
            <div class="row">
                @forelse($relatednews as $relatedn)
                <div class="col-md-4">
                    <img src="{{ asset($relatedn->image) }}" alt="">
                    <a href="{{ route('frontpage.newsview', $relatedn->id) }}"><h2 class="main_news_heading my-2">{{ $relatedn->title }}</h2></a>
                    <p><i class="far fa-clock"></i> {{ $relatedn->created_at->toFormattedDateString() }}</p>
                </div>
                @empty
                no news found
                @endforelse

            </div>
        </div>

        <div class="comment pb-3 news-border">
            <div class="news_3_title mb-4">
                <a href="#">
                    <h5 class="float-left mr-2 news_heading">Leave a Reply</h5>
                </a>
                <div class="strip"></div>

            </div>
            @if($comments->count())
            <div class="comment">
                <div class="row d-flex justify-content-center mt-100 mb-100">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body text-center">
                                <h4 class="card-title">Latest Comments ({{$comments->count()}})</h4>
                            </div>
                            @foreach($comments as $comment)
                                <div class="comment-widgets">
                                    <!-- Comment Row -->
                                    <div class="d-flex flex-row comment-row m-t-0">
                                        <div class="p-2"><img src="https://res.cloudinary.com/dxfq3iotg/image/upload/v1574583336/AAA/4.jpg" alt="user" width="50" class="rounded-circle"></div>
                                        <div class="comment-text w-100">
                                            <h6 class="font-medium">{{ $comment->name }}</h6> <span class="m-b-15 d-block">{{ $comment->comment }} </span>
                                            <div class="comment-footer"> <span class="text-muted float-right">{{ $comment->created_at->toFormattedDateString() }}</span>  </div>
                                        </div>
                                    </div> <!-- Comment Row -->
                                </div> <!-- Card -->
                            @endforeach

                        </div>
                    </div>
                </div>
            </div>
            @endif

            @if ($message = Session::get('success'))
                <div class="card-alert card green">
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                </div>
            @endif
            @if ($message = Session::get('failed'))
                <div class="card-alert card red">
                    <div class="card-content white-text">
                        <p>DANGER : {{ $message }}</p>
                    </div>
                    <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
            @endif
            <form action="{{ route('frontend.comment.store') }}" method="POST">
                @csrf
            <div class="comment-input mb-3">
                <div class="input-filed mb-3">
                    <div class="row">
                        <div class="col-md-4">
                            <label for="name">Name *</label>
                            <input type="text" name="name" id="name" required>
                            <input type="hidden" name="news_id" value="{{ $newsview->id }}">
                        </div>
                        <div class="col-md-4"><label for="email">Email *</label>
                            <input type="email" name="email" id="email" required></div>
                        <div class="col-md-4">
                            <label for="web">Phone</label>
                            <input type="text" name="phone" id="web">
                        </div>
                    </div>
                </div>
                <label for="text">Comment</label>
                <textarea name="comment" id="text" cols="30" rows="10" required></textarea>
            </div>

            <div class="news-btn">
                <button type="submit" class="readMore">Post Comment »</button>
            </div>
            </form>
        </div>

    </div><!-- col-md-7-->
    <style>
        @import url(http://fonts.googleapis.com/css?family=Calibri:400,300,700);

        .card {
            position: relative;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            min-width: 0;
            word-wrap: break-word;
            background-color: #fff;
            background-clip: border-box;
            border: 0px solid transparent;
            border-radius: 0px
        }

        .card-body {
            -webkit-box-flex: 1;
            -ms-flex: 1 1 auto;
            flex: 1 1 auto;
            padding: 1.25rem
        }

        .card .card-title {
            position: relative;
            font-weight: 600;
            margin-bottom: 10px
        }

        .comment-widgets {
            position: relative;
            margin-bottom: 10px
        }

        .comment-widgets .comment-row {
            border-bottom: 1px solid transparent;
            padding: 14px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            margin: 10px 0
        }

        .p-2 {
            padding: 0.5rem !important
        }

        .comment-text {
            padding-left: 15px
        }

        .w-100 {
            width: 100% !important
        }

        .m-b-15 {
            margin-bottom: 15px
        }

        .btn-sm {
            padding: 0.25rem 0.5rem;
            font-size: 0.76563rem;
            line-height: 1.5;
            border-radius: 1px
        }

        .btn-cyan {
            color: #fff;
            background-color: #27a9e3;
            border-color: #27a9e3
        }

        .btn-cyan:hover {
            color: #fff;
            background-color: #1a93ca;
            border-color: #198bbe
        }

        .comment-widgets .comment-row:hover {
            background: rgba(0, 0, 0, 0.05)
        }
    </style>
@endsection




