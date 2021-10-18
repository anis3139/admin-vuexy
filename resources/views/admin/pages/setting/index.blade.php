@extends('admin.layouts.master')
@section('content')
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Setting</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">Setting Create
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="content-body">
            @include('ErrorMessage')
            <!-- Tooltip validations start -->
            <section class="tooltip-validations" id="tooltip-validation">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>
                            </div>
                            <div class="card-body">

                                <form class="" action="{{ route('setting.update', $setting->id) }}"
                                    method="POST" enctype="multipart/form-data" files="true">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="site_name">Site Name</label>
                                                <input type="text" class="form-control" placeholder="Enter Bangla Name"
                                                    id="site_name" name="site_name" value="{{ $setting->site_name }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="site_title">Site Title</label>
                                                <input type="text" class="form-control" placeholder="Enter Bangla Name"
                                                    id="site_title" name="site_title" value="{{ $setting->site_title }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="copyright_message">Copyright Message</label>
                                                <input type="text" class="form-control"
                                                    placeholder="Enter Copyright message" id="copyright_message"
                                                    name="copyright_message" value="{{ $setting->copyright_message }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="copyright_name">Copyright Name</label>
                                                <input type="text" class="form-control" placeholder="Enter Copyright Name"
                                                    id="copyright_name" name="copyright_name"
                                                    value="{{ $setting->copyright_name }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="copyright_url">Copyright URL</label>
                                                <input type="text" class="form-control" placeholder="Enter Copyright Name"
                                                    id="copyright_url" name="copyright_url"
                                                    value="{{ $setting->copyright_url }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="design_develop_by_text">Design & Developed By Text</label>
                                                <input type="text" class="form-control" placeholder="Enter Copyright Name"
                                                    id="design_develop_by_text" name="design_develop_by_text"
                                                    value="{{ $setting->design_develop_by_text }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="design_develop_by_name">Design & Developed By Name</label>
                                                <input type="text" class="form-control" placeholder="Enter Copyright Name"
                                                    id="design_develop_by_name" name="design_develop_by_name"
                                                    value="{{ $setting->design_develop_by_name }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="design_develop_by_url">Design & Developed By URL</label>
                                                <input type="text" class="form-control" placeholder="Enter Copyright Name"
                                                    id="design_develop_by_url" name="design_develop_by_url"
                                                    value="{{ $setting->design_develop_by_url }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input type="text" class="form-control" placeholder="Enter Copyright Name"
                                                    id="phone" name="phone" value="{{ $setting->phone }}">
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="text" class="form-control" placeholder="Enter Copyright Name"
                                                    id="email" name="email" value="{{ $setting->email }}">
                                            </div>
                                        </div>










                                        <div class="col s12">
                                            <div class="col s12 m4 l3">
                                                <p> Logo</p>
                                            </div>
                                            <div class="col s12 m8 l9">
                                                @if ($setting->logo)
                                                    <input type="file" name="logo" id="logoID" id="input-file-now"
                                                        class="dropify"
                                                        data-default-file="{{ asset($setting->logo) }}" />
                                                @else
                                                    <input type="file" name="logo" id="logoID" class="dropify"
                                                        data-default-file="" />

                                                @endif
                                                <span class="helper-text red-text" data-error="wrong"
                                                    data-success="right">{{ $errors->first('logo') }}</span>
                                            </div>

                                        </div>
                                        <div class="col s12">
                                            <div class="col s12 m4 l3">
                                                <p> Default Image</p>
                                            </div>
                                            <div class="col s12 m8 l9">
                                                @if ($setting->default_image)
                                                    <input type="file" name="default_image" id="default_image"
                                                        class="dropify"
                                                        data-default-file="{{ asset($setting->default_image) }}" />
                                                @else
                                                    <input type="file" name="default_image" id="default_image"
                                                        class="dropify" data-default-file="" />

                                                @endif
                                                <span class="helper-text red-text" data-error="wrong"
                                                    data-success="right">{{ $errors->first('default_image') }}</span>
                                            </div>
                                        </div>


                                    </div>
                                    <div class="row ">
                                        <div class="col-md-4 offset-md-4 d-flex">
                                            <div class="mr-5">
                                                <img src="{{ asset($setting->logo) }}" alt="" id="logoPreview"
                                                    width="150px" height="150px" class="text-center">
                                            </div>
                                            <div >
                                                <img src="{{ asset($setting->default_image) }}" alt="" id="defaultImagePreview"
                                                    width="150px" height="150px" class="text-center">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <button class="btn btn-success right" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Tooltip validations end -->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script>
        $('#logoID').change(function() {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function(event) {
                var ImgSource = event.target.result;
                $('#logoPreview').attr('src', ImgSource)
            }
        })
        $('#default_image').change(function() {
            var reader = new FileReader();
            reader.readAsDataURL(this.files[0]);
            reader.onload = function(event) {
                var ImgSource = event.target.result;
                $('#defaultImagePreview').attr('src', ImgSource)
            }
        })
    </script>
@endsection
