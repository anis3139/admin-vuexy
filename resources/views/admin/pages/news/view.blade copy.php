@extends('admin.layouts.master')
@section('prefixname', $prefixname)
@section('title', $title)
@section('page_title', $page_title)
@section('content')
<div class="row">
    <div class="col s12">
        <div id="input-fields" class="card card-tabs">
            <div class="card-content">
                <div class="card-title">
                    <div class="row">
                        <div class="col s12 m6 l10">
                            <h4 class="card-title">View</h4>
                        </div>
                        {{-- <div class="col s12 m6 l2">--}}
                        {{-- <ul class="tab">--}}
                        {{-- <li class="tab col s6 p-0"><a class="p-0" href="{{ route('news.index') }}">List</a></li>--}}
                        {{-- <li class="tab col s6 p-0"><a class="p-0" href="{{ route('news.create') }}">Add</a></li>--}}
                        {{-- </ul>--}}
                        {{-- </div>--}}
                    </div>
                </div>
                <div id="view-input-fields">
                    <div class="row">
                        <div class="col s12">
                            @if ($message = Session::get('success'))
                            <div class="card-alert card green">
                                <div class="card-content white-text">
                                    <p>SUCCESS : {{ $message }}</p>
                                </div>
                                <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
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

                            <form class="row" action="{{ route('news.update', $news->id) }}" method="POST" enctype="multipart/form-data" files="true">
                                @csrf
                                <div class="row">
                                    <div class="col s12 m6 l8">
                                        <div class="card m-0 hoverable">
                                            <div class="card-content">
                                                <div class="card-header pb-1">
                                                    <div class="card-text">
                                                        <h6 class="m-0">{{ $news->title }}</h6>
                                                        <small>{{ $news->created_at->toFormattedDateString() }}</small>
                                                    </div>
                                                </div>
                                                <div class="divider"></div>
                                                {{-- <div class="card-image waves-effect waves-block waves-light mt-1">--}}
                                                {{-- <img class="responsive-img" style="width:100%; height: 200px" src="{{ asset($news->image) }}" alt="28.png">--}}
                                                {{-- </div>--}}
                                                <br>
                                                <p class="card-text mt-1">
                                                    {{ $news->description }}
                                                </p>
                                            </div>
                                            <!-- card action -->
                                            <div class="card-action">
                                                <a href="#" class="m-0"><i class="material-icons">favorite_border</i></a>
                                                <span class="ml-3 vertical-align-top">{{ $news->category->nameBn }}</span>
                                                <a href="#" class="mr-0 ml-3"><i class="material-icons">chat_bubble_outline</i></a>
                                                {{-- <span class="ml-3 vertical-align-top">{{ $news->subcategory->nameBn }}</span>--}}
                                                <a href="#" class="mr-0 ml-3"><i class="material-icons">share</i></a>
                                                {{-- <span class="ml-3 vertical-align-top">{{ $news->tag->nameBn }}</span>--}}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col s12 m6 l4">

                                        <div class="col s12">
                                            <div id="checkboxes" class="card card-tabs">
                                                <div class="card-content">
                                                    <div class="card-title">
                                                        <div class="row">
                                                            <div class="col s12 m6 l10">
                                                                <h4 class="card-title">Image</h4>
                                                            </div>
                                                            <div class="col s12">

                                                                @if($news->image != null)
                                                                <img class="responsive-img" style="width:100%; height: 200px" src="{{ asset($news->image) }}" alt="">
                                                                @elseif(isset($news->subcategory->image))
                                                                <img class="responsive-img" style="width:100%; height: 200px" src="{{ asset($news->subcategory->image) }}" alt="28.png">
                                                                @else

                                                                @endif
                                                            </div>
                                                        </div>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
@push('custom-css')
<link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/dropify/css/dropify.min.css')}}">

<link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/quill/katex.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/quill/monokai-sublime.min.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/quill/quill.snow.css')}}">
<link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/quill/quill.bubble.css')}}">
@endpush
@push('custom-js')
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{ asset('admin/app-assets/vendors/dropify/js/dropify.min.js')}}"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{ asset('admin/app-assets/js/scripts/form-file-uploads.js') }}"></script>
<!-- END PAGE LEVEL JS-->
<!-- BEGIN PAGE LEVEL JS-->
<script src="{{ asset('admin/app-assets/js/scripts/ui-alerts.js')}}"></script>
<!-- END PAGE LEVEL JS-->
<!-- BEGIN PAGE VENDOR JS-->
<script src="{{asset('admin/app-assets/vendors/quill/katex.min.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/quill/highlight.min.js')}}"></script>
<script src="{{asset('admin/app-assets/vendors/quill/quill.min.js')}}"></script>
<!-- END PAGE VENDOR JS-->

<!-- BEGIN PAGE LEVEL JS-->
<script src="{{asset('admin/app-assets/js/scripts/form-editor.js')}}"></script>
<!-- END PAGE LEVEL JS-->
<script>
    (function($) {
        "use strict";

        jQuery(document).ready(function($) {
            var quill = new Quill('#editor', {
                modules: {
                    toolbar: '#toolbar'
                },
                theme: 'snow'
            });
        });


    }(jQuery));
</script>
@endpush