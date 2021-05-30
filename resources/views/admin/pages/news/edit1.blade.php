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
                                <h4 class="card-title">Edit--</h4>
                            </div>
                            <div class="col s12 m6 l2">
                                <ul class="tab">
                                    <li class="tab col s6 p-0"><a class="p-0" href="{{ route('news.index') }}">List</a></li>
                                    <li class="tab col s6 p-0"><a class="p-0" href="{{ route('news.create') }}">Add</a></li>
                                </ul>
                            </div>
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
                                            <div class="card subscriber-list-card animate fadeRight">
                                                <div class="card-content pb-1">
                                                    <h5 class="card-title mb-0">Title & Description</h5>
                                                    <div class="switch mb-1 right">
                                                        <label>
                                                            English Off
                                                            <input name="view_english" type="checkbox">
                                                            <span class="lever view_english" value="check"></span>
                                                            English On
                                                        </label>
                                                    </div>
                                                </div>
                                                <section class="full-editor">
                                                    <div class="row">
                                                        <div class="col s12">
                                                            <div class="card">
                                                                <div class="card-content">
                                                                    <div class="input-field col s12">
                                                                        <input placeholder="Enter Title" id="title" value="{{ $news->title }}" type="text" name="title" class="validate @error('title') validate @enderror">
                                                                        <label for="first_name1">Title</label>
                                                                        <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('title') }}</span>
                                                                    </div>
                                                                    <h4 class="card-title">Full Editor</h4>

                                                                    <div class="row">
                                                                        <div class="col s12">
                                                                            <div id="full-wrapper">
                                                                                <div id="full-container">

                                                                                        <textarea class="customtextarea" name="description" id=""
                                                                                                  rows="30">{{ $news->description }}</textarea>


                                                                                </div>
                                                                            </div>
                                                                            <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('description') }}</span>
                                                                        </div>
                                                                        </div>
                                                                    </div>
                                                                <div class="card-content english">
                                                                    <div class="input-field col s12">
                                                                        <input placeholder="Enter English Title" id="title" value="{{ $news->titleEn }}" type="text" name="titleEn" class="validate @error('title') validate @enderror">
                                                                        <label for="first_name1">Title English</label>
                                                                        <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('titleEn') }}</span>
                                                                    </div>
                                                                    <h4 class="card-title">Description English</h4>

                                                                    <div class="row">
                                                                        <div class="col s12">
                                                                            <div id="full-wrapper">
                                                                                <div id="full-container">
                                                                                    <textarea style="height: 300px" name="descriptionEn" id="" cols="30"
                                                                                    >{{ $news->descriptionEn }}</textarea>
                                                                                </div>
                                                                            </div>
                                                                            <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('descriptionEn') }}</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col s12">
                                                                    <div class="input-field col s12">
                                                                        <select name="status">
                                                                            <option {{ $news->status==1 ? "selected" : '' }} value="1">Active</option>
                                                                            <option {{ $news->status==0 ? "selected" : '' }} value="0">Deactive</option>
                                                                        </select>
                                                                    </div>

                                                                </div>
                                                                    <div class="row">
                                                                        <div class="input-field col s12">
                                                                            <button class="btn cyan waves-effect waves-light right" type="submit">Submit
                                                                                <i class="material-icons right">send</i>
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>


                                                </section>
                                                <!-- full Editor end -->


                                            </div>
                                        </div>
                                        <div class="col s12 m6 l4">

                                            <div class="col s12">
                                                <div id="checkboxes" class="card card-tabs">
                                                    <div class="card-content">
                                                        <div class="card-title">
                                                            <div class="row">
                                                                <div class="col s12 m6 l10">
                                                                    <h4 class="card-title">Category</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="view-checkboxes">
                                                            <div class="input-field">
                                                                <select name="category" class="select2 browser-default">
                                                                    <option value="" selected>---- Select Category---</option>
                                                                    @foreach($categories as $key => $category)
                                                                        <option value="{{ $category->id }}" {{ $category->id == $news->category_id ? "selected" : '' }}>{{ $category->nameBn }} ({{ $category->nameEn }})</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('category') }}</span>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col s12">
                                                <div id="checkboxes" class="card card-tabs">
                                                    <div class="card-content">
                                                        <div class="card-title">
                                                            <div class="row">
                                                                <div class="col s12 m6 l10">
                                                                    <h4 class="card-title">Sub Category</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="view-checkboxes">
                                                            <div class="input-field">
                                                                <select name="subcategory" class="select2 browser-default">
                                                                    <option value="" selected>---- Select SubCategory---</option>
                                                                    @foreach($subcategories as $key => $subcategory)
                                                                        <option value="{{ $subcategory->id }}" {{ $subcategory->id == $news->subcategory_id ? "selected" : '' }}>{{ $subcategory->nameBn }} ({{ $subcategory->nameEn }})</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('subcategory') }}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col s12">
                                                <div id="checkboxes" class="card card-tabs">

                                                        <div id="view-checkboxes">

                                                                <div class="col s12">
                                                                    @if($news->image != null)
                                                                    <input type="file" name="img" id="input-file-now" class="dropify" data-default-file="{{ asset($news->image) }}" />
                                                                    @elseif(isset($news->subcategory->image))
                                                                        <input type="file" name="img" id="input-file-now" class="dropify" data-default-file="{{ asset($news->subcategory->image) }}" />
                                                                    @else
                                                                        <input type="file" name="img" id="input-file-now" class="dropify" data-default-file="{{ asset($news->image) }}" />
                                                                    @endif
                                                                </div>
                                                            <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('img') }}</span>

                                                </div>
                                            </div>
                                            <div class="col s12">
                                                <div id="checkboxes" class="card card-tabs">
                                                    <div class="card-content">
                                                        <div class="card-title">
                                                            <div class="row">
                                                                <div class="col s12 m6 l10">
                                                                    <h4 class="card-title">Tags</h4>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div id="view-checkboxes">
                                                            <div class="input-field">
                                                                <select name="tag" class="select2 browser-default">
                                                                    <option value="" selected>---- Select Tag---</option>
                                                                    @foreach($tags as $key => $tag)
                                                                        <option value="{{ $tag->id }}" {{ $tag->id == $news->tag_id ? "selected" : '' }}>{{ $tag->nameBn }} ({{ $tag->nameEn }})</option>
                                                                    @endforeach
                                                                </select>
                                                                <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('tag') }}</span>
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
    <style>
        .customtextarea{
            width: 100%;
            height: auto;
            padding:20px;
            border:2px solid gray;
        }
    </style>
@endpush
@push('custom-js')
    <!-- BEGIN PAGE VENDOR JS-->
    <script src="{{ asset('admin/app-assets/vendors/dropify/js/dropify.min.js')}}"></script>
    <!-- END PAGE VENDOR JS-->
    <!-- BEGIN PAGE LEVEL JS-->
    <script src="{{ asset('admin/app-assets/js/scripts/form-file-uploads.js') }}"></script>
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
        (function ($) {
            "use strict";

            jQuery(document).ready(function ($) {
                var quill = new Quill('#editor', {
                    modules: {
                        toolbar: '#toolbar'
                    },
                    theme: 'snow'
                });
            });

            $(document).ready(function() {
                $(".english").hide();
                $('input[type="checkbox"]').click(function() {
                    if($(this).is(":checked")) {
                        $(".english").show(300);
                    } else {
                        $(".english").hide(200);
                    }
                });
            });



        }(jQuery));
    </script>
@endpush
