@extends('admin.layouts.master')
@section('prefixname', $prefixname)
@section('title', $title)
@section('page_title', $page_title)
@section('content')
    <div class="section">
        <div id="card-stats" class="pt-0">
            <div class="row">
                <div class="col s12 m6 l6 xl2">
                    <div class="card gradient-45deg-light-blue-cyan gradient-shadow min-height-100 white-text animate fadeLeft">
                        <div class="padding-4">
                            <div class="row">
                                <div class="col s7 m7">
                                    <i class="material-icons background-round mt-5">add_shopping_cart</i>
                                    <p>Category</p>
                                </div>
                                <div class="col s5 m5 right-align">
{{--                                    <h5 class="mb-0 white-text">{{ $category }}</h5>--}}
{{--                                    <p class="no-margin">Category</p>--}}
                                    <p>{{ $category }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col s12 m6 l6 xl2">
                    <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text animate fadeRight">
                        <div class="padding-4">
                            <div class="row">
                                <div class="col s7 m7">
                                    <i class="material-icons background-round mt-5">timeline</i>
                                    <p>Sub Cat.</p>
                                </div>
                                <div class="col s5 m5 right-align">
{{--                                    <h5 class="mb-0 white-text">{{ $subcategory }}</h5>--}}
{{--                                    <p class="no-margin">Sub Category</p>--}}
                                    <p>{{ $subcategory }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l6 xl2">
                    <div class="card gradient-45deg-amber-amber gradient-shadow min-height-100 white-text animate fadeRight">
                        <div class="padding-4">
                            <div class="row">
                                <div class="col s7 m7">
                                    <i class="material-icons background-round mt-5">timeline</i>
                                    <p>Tag</p>
                                </div>
                                <div class="col s5 m5 right-align">
                                    {{--                                    <h5 class="mb-0 white-text">{{ $subcategory }}</h5>--}}
                                    {{--                                    <p class="no-margin">Sub Category</p>--}}
                                    <p>{{ $tag }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l6 xl2">
                    <div class="card gradient-45deg-green-teal gradient-shadow min-height-100 white-text animate fadeRight">
                        <div class="padding-4">
                            <div class="row">
                                <div class="col s7 m7">
                                    <i class="material-icons background-round mt-5">attach_money</i>
                                    <p>News</p>
                                </div>
                                <div class="col s5 m5 right-align">

                                    <p>{{ $news }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l6 xl2">
                    <div class="card gradient-45deg-red-pink gradient-shadow min-height-100 white-text animate fadeLeft">
                        <div class="padding-4">
                            <div class="row">
                                <div class="col s7 m7">
                                    <i class="material-icons background-round mt-5">perm_identity</i>
                                    <p>Users</p>
                                </div>
                                <div class="col s5 m5 right-align">
                                    <p>{{ $user }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col s12 m6 l6">
                    <div class="card padding-4 animate fadeLeft">
                        <div class="row">
                            <div class="col s5 m5">
                                <h5 class="mb-0">{{ $story_today_view_count }}</h5>
                                <p class="no-margin">Today</p>
                                <p class="mb-0 pt-8">{{ $story_today_view_count }}</p>
                            </div>
                            <div class="col s7 m7 right-align">
                                <i class="material-icons background-round mt-5 mb-5 gradient-45deg-purple-amber gradient-shadow white-text">perm_identity</i>
                                <p class="mb-0">Today Total View</p>
                            </div>
                        </div>
                    </div>
                    <div id="chartjs" class="card pt-0 pb-0 animate fadeLeft">
                        <div class="dashboard-revenue-wrapper padding-2 ml-2">
                            <span class="new badge gradient-45deg-indigo-purple gradient-shadow mt-2 mr-2">{{ $story_today_view_count }}</span>
                            <p class="mt-2 mb-0 font-weight-600">Total View</p>
                            <p class="no-margin grey-text lighten-3">{{ $story_today_view_count }}</p>
                            <h5>{{ $story_today_view_count }}</h5>
                        </div>
                        <div class="sample-chart-wrapper card-gradient-chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <canvas id="custom-line-chart-sample-three" class="center chartjs-render-monitor" style="display: block; width: 329px; height: 164px;" width="329" height="164"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col s12 m6 l6">
                    <div class="card subscriber-list-card animate fadeRight">
                        <div class="card-content pb-1">
                            <h4 class="card-title mb-0">Latest Story List <i class="material-icons float-right">more_vert</i></h4>
                        </div>
                        <table class="subscription-table responsive-table highlight">
                            <thead>
                            <tr>
                                <th>SL</th>
                                <th>Title</th>
                                <th>Cateogry</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($stories as $key => $story)
                                <tr>
                                    <td>{{ ++$key }}</td>
                                    <td>{{ $story->title }}</td>
                                    <td>{{ $story->category->nameBn }}</td>
                                    <td>{{ \Illuminate\Support\Str::limit($story->description, 10, '') }}
                                        .....</td>
                                    <td>
                                        @if($story->image != null)
                                            <img src="{{ asset($story->image) }}" style="border-radius: 5px;" width="10" height="10" class="responsive-img mb-10" alt="">
                                        @else
                                            <img src="{{ asset('default_image/default.jpeg') }}" style="border-radius: 5px;" width="10" height="10" class="responsive-img mb-10" alt="">
                                        @endif
                                    </td>

                                    <td class="center-align">
                                        <a href="{{ route('news.view', $story->id) }}" method="GET" title="View">
                                            <i class="material-icons dp48">remove_red_eye</i>
                                        </a>
                                    </td>
                                </tr>

                            @empty
                                <tr>
                                    <td colspan="5">
                                        <div class="card-alert card gradient-45deg-purple-deep-orange">
                                            <div class="card-content white-text">
                                                <p>
                                                    <i class="material-icons">notifications</i> Sorry : Story List Empty.</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


@endsection
@push('custom-js')

@endpush
