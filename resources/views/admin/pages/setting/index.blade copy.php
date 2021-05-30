@extends('admin.layouts.master')
@section('prefixname', $prefixname)
@section('title', $title)
@section('page_title', $page_title)
@section('content')
    @if($setting)
        <div class="row">
            <div class="col s12">
                <div id="input-fields" class="card card-tabs">
                    <div class="card-content">
                        <div class="card-title">
                            <div class="row">
                                <div class="col s12 m6 l10">
                                    <h4 class="card-title">Setting Update</h4>
                                </div>
                                {{--                            <div class="col s12 m6 l2">--}}
                                {{--                                <ul class="tab">--}}
                                {{--                                    <li class="tab col s6 p-0"><a class="p-0" href="{{ route('category.index') }}">List</a></li>--}}
                                {{--                                    <li class="tab col s6 p-0"><a class="p-0" href="{{ route('category.create') }}">Add</a></li>--}}
                                {{--                                </ul>--}}
                                {{--                            </div>--}}
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

                                    <form class="row" action="{{ route('setting.update',$setting->id) }}" method="POST" enctype="multipart/form-data" files="true">
                                        @csrf
                                        <div class="col s6">
                                            <div class="input-field col s12">
                                                <input placeholder="Enter Site Name" id="nameBn" value="{{ $setting->site_name }}" type="text" name="site_name" class="validate @error('site_name') validate @enderror">
                                                <label for="first_name1">Site Name</label>
                                                <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('site_name') }}</span>
                                            </div>
                                        </div>

                                        <div class="col s6">
                                            <div class="input-field col s12">
                                                <input placeholder="Enter Site Title" id="nameEn" value="{{ $setting->site_title }}" type="text" name="site_title" class="validate">
                                                <label for="first_name1">Site Title</label>
                                                <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('site_title') }}</span>
                                            </div>
                                        </div>

                                        <div class="col s4">
                                            <div class="input-field col s12">
                                                <input placeholder="copyright message" value="{{ $setting->copyright_message }}" id="nameBn" type="text" name="copyright_message" class="validate @error('copyright') validate @enderror">
                                                <label for="first_name1">Copyright message</label>
                                                <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('copyright_message') }}</span>
                                            </div>
                                        </div>
                                        <div class="col s4">
                                            <div class="input-field col s12">
                                                <input placeholder="copyright name" value="{{ $setting->copyright_name }}" id="nameBn" type="text" name="copyright_name" class="validate @error('copyright') validate @enderror">
                                                <label for="first_name1">Copyright Name</label>
                                                <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('copyright_name') }}</span>
                                            </div>
                                        </div>
                                        <div class="col s4">
                                            <div class="input-field col s12">
                                                <input placeholder="http://www.address.com" value="{{ $setting->copyright_url }}" id="nameBn" type="text" name="copyright_url" class="validate @error('copyright') validate @enderror">
                                                <label for="first_name1">Copyright URl</label>
                                                <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('copyright_url') }}</span>
                                            </div>
                                        </div>

                                        <div class="col s4">
                                            <div class="input-field col s12">
                                                <input placeholder="Enter Design & Developed Text" value="{{ $setting->design_develop_by_text }}" id="nameEn" type="text" name="design_develop_by_text" class="validate">
                                                <label for="first_name1">Design & Developed By Text</label>
                                                <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('design_develop_by_text') }}</span>
                                            </div>
                                        </div>
                                        <div class="col s4">
                                            <div class="input-field col s12">
                                                <input placeholder="Enter Design & Developed Name" value="{{ $setting->design_develop_by_name }}" id="nameEn" type="text" name="design_develop_by_name" class="validate">
                                                <label for="first_name1">Design & Developed By Name</label>
                                                <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('design_develop_by_name') }}</span>
                                            </div>
                                        </div>
                                        <div class="col s4">
                                            <div class="input-field col s12">
                                                <input placeholder="http://wwww.google.com" value="{{ $setting->design_develop_by_url }}" id="nameEn" type="text" name="design_develop_by_url" class="validate">
                                                <label for="first_name1">Design & Developed By URL</label>
                                                <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('design_develop_by_url') }}</span>
                                            </div>
                                        </div>

                                        <div class="col s6">
                                            <div class="input-field col s12">
                                                <input placeholder="Enter Phone Number" value="{{ $setting->phone }}" id="nameBn" type="text" name="phone" class="validate @error('phone') validate @enderror">
                                                <label for="first_name1">Phone</label>
                                                <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('phone') }}</span>
                                            </div>
                                        </div>

                                        <div class="col s6">
                                            <div class="input-field col s12">
                                                <input placeholder="Enter Email" value="{{ $setting->email }}" id="nameEn" type="text" name="email" class="validate">
                                                <label for="first_name1">Email</label>
                                                <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('email') }}</span>
                                            </div>
                                        </div>
                                        <div class="col s12">
                                            <div class="col s12 m4 l3">
                                                <p> Logo</p>
                                            </div>
                                            <div class="col s12 m8 l9">
                                                @if($setting->logo)
                                                    <input type="file" name="logo" id="input-file-now" class="dropify" data-default-file="{{ asset($setting->logo) }}" />
                                                @else
                                                    <input type="file" name="logo" id="input-file-now" class="dropify" data-default-file="" />

                                                @endif
                                                <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('logo') }}</span>
                                            </div>

                                        </div>
                                        <div class="col s12">
                                            <div class="col s12 m4 l3">
                                                <p> Default Image</p>
                                            </div>
                                            <div class="col s12 m8 l9">
                                                @if($setting->default_image)
                                                    <input type="file" name="default_image" id="input-file-now" class="dropify" data-default-file="{{ asset($setting->default_image) }}" />
                                                @else
                                                    <input type="file" name="default_image" id="input-file-now" class="dropify" data-default-file="" />

                                                @endif
                                                <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('default_image') }}</span>
                                            </div>

                                        </div>
                                        <div class="row">
                                            <div class="input-field col s12">
                                                <button class="btn cyan waves-effect waves-light right" type="submit">Update
                                                    <i class="material-icons right">send</i>
                                                </button>
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
    @else
    <div class="row">
        <div class="col s12">
            <div id="input-fields" class="card card-tabs">
                <div class="card-content">
                    <div class="card-title">
                        <div class="row">
                            <div class="col s12 m6 l10">
                                <h4 class="card-title">Setting</h4>
                            </div>
{{--                            <div class="col s12 m6 l2">--}}
{{--                                <ul class="tab">--}}
{{--                                    <li class="tab col s6 p-0"><a class="p-0" href="{{ route('category.index') }}">List</a></li>--}}
{{--                                    <li class="tab col s6 p-0"><a class="p-0" href="{{ route('category.create') }}">Add</a></li>--}}
{{--                                </ul>--}}
{{--                            </div>--}}
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

                                <form class="row" action="{{ route('setting.store') }}" method="POST" enctype="multipart/form-data" files="true">
                                    @csrf
                                    <div class="col s6">
                                        <div class="input-field col s12">
                                            <input placeholder="Enter Site Name" id="nameBn" type="text" name="site_name" class="validate @error('site_name') validate @enderror">
                                            <label for="first_name1">Site Name</label>
                                            <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('site_name') }}</span>
                                        </div>
                                    </div>

                                    <div class="col s6">
                                        <div class="input-field col s12">
                                            <input placeholder="Enter Site Title" id="nameEn" type="text" name="site_title" class="validate">
                                            <label for="first_name1">Site Title</label>
                                            <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('site_title') }}</span>
                                        </div>
                                    </div>

                                    <div class="col s4">
                                        <div class="input-field col s12">
                                            <input placeholder="copyright message" id="nameBn" type="text" name="copyright_message" class="validate @error('copyright') validate @enderror">
                                            <label for="first_name1">Copyright message</label>
                                            <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('copyright') }}</span>
                                        </div>
                                    </div>
                                    <div class="col s4">
                                        <div class="input-field col s12">
                                            <input placeholder="copyright name" id="nameBn" type="text" name="copyright_name" class="validate @error('copyright') validate @enderror">
                                            <label for="first_name1">Copyright Name</label>
                                            <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('copyright') }}</span>
                                        </div>
                                    </div>
                                    <div class="col s4">
                                        <div class="input-field col s12">
                                            <input placeholder="http://www.address.com" id="nameBn" type="text" name="copyright_url" class="validate @error('copyright') validate @enderror">
                                            <label for="first_name1">Copyright URl</label>
                                            <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('copyright') }}</span>
                                        </div>
                                    </div>

                                    <div class="col s4">
                                        <div class="input-field col s12">
                                            <input placeholder="Enter Design & Developed Text" id="nameEn" type="text" name="design_develop_by_text" class="validate">
                                            <label for="first_name1">Design & Developed By Text</label>
                                            <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('design_develop_by_text') }}</span>
                                        </div>
                                    </div>
                                    <div class="col s4">
                                        <div class="input-field col s12">
                                            <input placeholder="Enter Design & Developed Name" id="nameEn" type="text" name="design_develop_by_name" class="validate">
                                            <label for="first_name1">Design & Developed By Name</label>
                                            <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('design_develop_by_name') }}</span>
                                        </div>
                                    </div>
                                    <div class="col s4">
                                        <div class="input-field col s12">
                                            <input placeholder="http://wwww.google.com" id="nameEn" type="text" name="design_develop_by_url" class="validate">
                                            <label for="first_name1">Design & Developed By URL</label>
                                            <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('design_develop_by_url') }}</span>
                                        </div>
                                    </div>

                                    <div class="col s6">
                                        <div class="input-field col s12">
                                            <input placeholder="Enter Phone Number" id="nameBn" type="text" name="phone" class="validate @error('phone') validate @enderror">
                                            <label for="first_name1">Phone</label>
                                            <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('phone') }}</span>
                                        </div>
                                    </div>

                                    <div class="col s6">
                                        <div class="input-field col s12">
                                            <input placeholder="Enter Email" id="nameEn" type="text" name="email" class="validate">
                                            <label for="first_name1">Email</label>
                                            <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('email') }}</span>
                                        </div>
                                    </div>
                                    <div class="col s12">
                                        <div class="col s12 m4 l3">
                                            <p> Logo</p>
                                        </div>
                                        <div class="col s12 m8 l9">
                                            <input type="file" name="logo" id="input-file-now" class="dropify" data-default-file="" />
                                            <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('logo') }}</span>
                                        </div>

                                    </div>
                                    <div class="col s12">
                                        <div class="col s12 m4 l3">
                                            <p> Default Image</p>
                                        </div>
                                        <div class="col s12 m8 l9">
                                            <input type="file" name="default_image" id="input-file-now" class="dropify" data-default-file="" />
                                            <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('default_image') }}</span>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="input-field col s12">
                                            <button class="btn cyan waves-effect waves-light right" type="submit">Submit
                                                <i class="material-icons right">send</i>
                                            </button>
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
    @endif


@endsection
@push('custom-css')
    <link rel="stylesheet" type="text/css" href="{{asset('admin/app-assets/vendors/dropify/css/dropify.min.css')}}">
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
@endpush
