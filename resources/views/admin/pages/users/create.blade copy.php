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
                                <h4 class="card-title">Add</h4>
                            </div>
                            <div class="col s12 m6 l2">
                                <ul class="tab">
                                    <li class="tab col s6 p-0"><a class="p-0" href="{{ route('user.index') }}">List</a></li>
                                    <li class="tab col s6 p-0"><a class="p-0" href="{{ route('user.create') }}">Add</a></li>
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

                                <form class="row" action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data" files="true">
                                    @csrf
                                        <div class="col s6">
                                            <div class="input-field col s12">
                                                <input placeholder="Enter Name" id="name" type="text" name="name" class="validate @error('name') validate @enderror">
                                                <label for="first_name1"> Name</label>
                                                <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('name') }}</span>
                                            </div>
                                        </div>

                                        <div class="col s6">
                                            <div class="input-field col s12">
                                                <input placeholder="Enter User Name" id="username" type="text" name="username" class="validate">
                                                <label for="first_name1">User Name</label>
                                                <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('username') }}</span>
                                            </div>
                                        </div>
                                    <div class="col s6">
                                        <div class="input-field col s12">
                                            <input placeholder="Enter Email" id="email" type="email" name="email" class="validate @error('email') validate @enderror">
                                            <label for="first_name1"> Email</label>
                                            <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('email') }}</span>
                                        </div>
                                    </div>

                                    <div class="col s6">
                                        <div class="input-field col s12">
                                            <input placeholder="Enter Phone" id="phone" type="text" name="phone" class="validate">
                                            <label for="first_name1">Phone</label>
                                            <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('phone') }}</span>
                                        </div>
                                    </div>
                                    <div class="col s6">
                                        <div class="input-field col s12">
                                            <input placeholder="Enter Password" id="password" type="password" name="password" class="validate @error('password') validate @enderror">
                                            <label for="first_name1"> Password</label>
                                            <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('password') }}</span>
                                        </div>
                                    </div>

                                    <div class="col s6">
                                        <div class="input-field col s12">
                                            <input placeholder="Enter Confirm Password" id="password-confirm" type="password" name="password_confirmation" class="validate">
                                            <label for="first_name1">Confirm Password</label>
                                            <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('password_confirmation') }}</span>
                                        </div>
                                    </div>
                                    <div class="col s12">
                                        <div class="input-field col s12">
                                            <select name="role">
                                                <option value="">---Select Role---</option>
                                                @foreach($roles as $key => $role)
                                                    <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                            <span class="helper-text red-text" data-error="wrong" data-success="right">{{ $errors->first('role') }}</span>
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
