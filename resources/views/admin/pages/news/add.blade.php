@extends('admin.layouts.master')
@section('vendor-style')
    {{-- Vendor Css files --}}
    <link rel="stylesheet" href="{{ asset('/app-assets/vendors/css/forms/select/select2.min.css') }}">
@endsection

@section('page-style')
    {{-- Page Css files --}}
    <link rel="stylesheet" href="{{ asset('/app-assets/css/plugins/forms/form-validation.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/app-assets/vendors/quill/quill.snow.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/admin/app-assets/vendors/quill/quill.bubble.css') }}">

    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/quill/katex.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('admin/app-assets/vendors/quill/monokai-sublime.min.css') }}">
    <!-- Template files -->
    <link rel="stylesheet" type="text/css" href="{{ asset('app-assets/css/plugins/forms/form-quill-editor.min.css') }}">


    <style>
        .select2-container--default .select2-selection--single .select2-selection__arrow b {
            border-style: none;
        }

    </style>
@endsection
@section('content')
    <style>
        .select2-selection__arrow {
            display: none;
        }

    </style>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">News</h2>
                        <div class="breadcrumb-wrapper">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a>
                                </li>
                                <li class="breadcrumb-item active">News Create
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Tooltip validations start -->
            <section class="tooltip-validations" id="tooltip-validation">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title"></h4>
                            </div>
                            <div class="card-body">
                                <form class="" action="{{ route('news.store') }}" method="POST"
                                    enctype="multipart/form-data" files="true" id="userAddForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">

                                            <div class="form-group">
                                                <label class="form-label" for="first_name1">Title Bangla</label>

                                                <input type="text" id="first_name1" class="form-control"
                                                    placeholder="Title Bangla" aria-label="title"
                                                    aria-describedby="first_name1" name="title" />
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please enter your name.</div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">

                                            <div class="form-group">
                                                <label class="form-label" for="titleEn">Title English</label>

                                                <input type="text" id="titleEn" class="form-control"
                                                    placeholder="Title English" aria-label="titleEn"
                                                    aria-describedby="titleEn" name="titleEn" />
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please enter your name.</div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="category">Category</label>
                                                <select id="category" name="category" class="form-control select2"
                                                    aria-label="category" aria-describedby="category">

                                                    <option value="" selected>---- Select Category---</option>
                                                    @foreach ($categories as $key => $category)
                                                        <option value="{{ $category->id }}">{{ $category->nameBn }}
                                                            ({{ $category->nameEn }})</option>
                                                    @endforeach
                                                </select>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please select your country</div>
                                            </div>
                                        </div>













                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="subcategory">Sub Category</label>
                                                <select id="subcategory" name="subcategory" class="form-control select2"
                                                    aria-label="subcategory" aria-describedby="subcategory">
                                                    <option value="" selected>---- Select Sub Category---</option>
                                                    @foreach ($subcategories as $key => $subcategory)
                                                        <option value="{{ $subcategory->id }}">
                                                            {{ $subcategory->nameBn }} ({{ $subcategory->nameEn }})
                                                        </option>
                                                    @endforeach
                                                </select>

                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please select your country</div>
                                            </div>
                                        </div>

                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="tag">Tag</label>
                                                <select name="tag" id="tag" class="form-control select2" aria-label="tag"
                                                    aria-describedby="tag" multiple>
                                                    @foreach ($tags as $key => $tag)
                                                        <option value="{{ $tag->id }}">{{ $tag->nameBn }}
                                                            ({{ $tag->nameEn }})</option>
                                                    @endforeach
                                                </select>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please select your country</div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mb-1">
                                            <div class="form-group">
                                                <label for="description">Satus</label>
                                                <select name="status" class="form-control select2" aria-label="status"
                                                    aria-describedby="status" id="status">
                                                    <option value="1">Active</option>
                                                    <option value="0">Deactive</option>
                                                </select>
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please select your country</div>
                                            </div>
                                        </div>
                                        <div class="col-xl-4 col-md-6 col-12 mb-1  my-5">
                                            <div class="form-group" id="bnDescrioption">

                                            </div>

                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please select your country</div>
                                        </div>

                                        <div class="col-xl-4 col-md-6 col-12 mb-1 my-5">
                                            <div class="form-group" id="enDescrioption">

                                            </div>
                                            <div class="valid-feedback">Looks good!</div>
                                            <div class="invalid-feedback">Please select your country</div>
                                        </div>


                                        <div class="col-xl-4 col-md-6 col-12  my-5">
                                            <div class="form-group">
                                                <label for="description">Image</label>

                                                <input type="file" id="img" class="form-control"
                                                    placeholder="Title English" aria-label="img" aria-describedby="img"
                                                    name="img" />
                                                <div class="valid-feedback">Looks good!</div>
                                                <div class="invalid-feedback">Please enter your name.</div>
                                            </div>
                                            <div class="image text-center">
                                                <img src="" alt="" id="imagePreview" width="150px" height="auto"
                                                    class="border border-round">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mt-5">
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
@endsection
@section('vendor-script')
    <!-- vendor files -->
    <script src="{{ asset('/app-assets/vendors/js/forms/select/select2.full.min.js') }}"></script>
    <script src="{{ asset('/app-assets/vendors/js/forms/validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('/app-assets/js/scripts/forms/form-validation.js') }}"></script>
    <script src="{{ asset('/admin/app-assets/vendors/quill/quill.min.js') }}"></script>
    <script src="{{ asset('/admin/app-assets/vendors/quill/themes/bubble.js') }}"></script>

    <script src="{{ asset('admin/app-assets/vendors/quill/katex.min.js') }}"></script>
    {{-- <script src="{{asset('admin/app-assets/js/scripts/form-editor.js')}}"></script> --}}
@endsection
@section('page-script')


    <script>
        (function(window, document, $) {
            'use strict';
            $('#userAddForm').validate({
                rules: {
                    title: "required",
                    img: "required",
                    tag: "required",
                    status: "required",
                    category: "required",
                    subcategory: "required",
                    bnDescrioption: "required",
                    enDescrioption: "required",
                    titleEn: {
                        required: true,
                        email: true
                    }
                },
                messages: {
                    title: "Please specify Title (Bangla)",
                    img: "Please Selcect Image",
                    tag: "Please Selcect Tag",
                    status: "Please Selcect Status",
                    category: "Please Selcect Category",
                    subcategory: "Please Selcect Sub Category",
                    enDescrioption: "Please specify Description (English)",
                    bnDescrioption: "Please specify Description (Bangla)",
                    titleEn: {
                        required: "Please specify Title (English)",
                        // email: "Your email address must be in the format of name@domain.com"
                    }
                }
            });


            // $(".select2").select2();
            var select = $('.select2');

            select.each(function() {
                var $this = $(this);
                $this.wrap('<div class="position-relative"></div>');
                $this
                    .select2({
                        placeholder: 'Select value',
                        dropdownParent: $this.parent()
                    })
                    .change(function() {
                        $(this).valid();
                    });
            });

            $('#img').change(function() {
                var reader = new FileReader();
                reader.readAsDataURL(this.files[0]);
                reader.onload = function(event) {
                    var ImgSource = event.target.result;
                    $('#imagePreview').attr('src', ImgSource)
                }
            })

            var Editors = ['#enDescrioption', '#bnDescrioption'];
            var quill;
            for (var k = 0; k <= Editors.length; k++) {
                quill = new Quill(Editors[k], {
                    theme: 'snow'
                });
            }



            var Font = Quill.import('formats/font');
            Font.whitelist = ['sofia', 'slabo', 'roboto', 'inconsolata', 'ubuntu'];
            Quill.register(Font, true);



            // Snow Editor




            var bnDescrioption = new Quill('#enDescrioption', {
                bounds: '#enDescrioption',
                modules: {
                    formula: true,
                    syntax: true,
                    toolbar: [
                        [{
                                font: []
                            },
                            {
                                size: []
                            }
                        ],
                        ['bold', 'italic', 'underline', 'strike'],
                        [{
                                color: []
                            },
                            {
                                background: []
                            }
                        ],
                        [{
                                script: 'super'
                            },
                            {
                                script: 'sub'
                            }
                        ],
                        [{
                                header: '1'
                            },
                            {
                                header: '2'
                            },
                            'blockquote',
                            'code-block'
                        ],
                        [{
                                list: 'ordered'
                            },
                            {
                                list: 'bullet'
                            },
                            {
                                indent: '-1'
                            },
                            {
                                indent: '+1'
                            }
                        ],
                        [
                            'direction',
                            {
                                align: []
                            }
                        ],
                        ['link', 'image', 'video', 'formula'],
                        ['clean']
                    ]
                },
                theme: 'snow'
            });


            var bnDescrioption = new Quill('#bnDescrioption', {

                modules: {
                    formula: true,
                    syntax: true
                },
                theme: 'bubble'
            });


            var editors = [bnDescrioption, enDescrioption];
        })(window, document, jQuery);
    </script>
@endsection
