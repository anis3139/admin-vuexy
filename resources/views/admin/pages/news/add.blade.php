@extends('admin.layouts.master')
@section('content')
<div class="content-wrapper">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2 class="content-header-title float-left mb-0">News</h2>
                    <div class="breadcrumb-wrapper">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
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
                            <form class="" action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" files="true">
                                @csrf
                                <div class="row">
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="first_name1">Title Bangla</label>
                                            <input placeholder="Enter Bangla Title" id="title" type="text" name="title" class="form-control">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="titleEn">Title English</label>
                                            <input type="text" class="form-control" placeholder="Enter English  Name" id="titleEn" name="titleEn">
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="description">Description Bangla</label>
                                            <textarea placeholder="Enter Description" name="description" id="description" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="descriptionEn">Description English</label>
                                            <textarea placeholder="Enter Description" name="descriptionEn" id="descriptionEn" class="form-control"></textarea>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="category">Category</label>
                                            <select id="category" name="category" class="form-control">
                                                <option value="" selected>---- Select Category---</option>
                                                @foreach($categories as $key => $category)
                                                <option value="{{ $category->id }}">{{ $category->nameBn }} ({{ $category->nameEn }})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="subcategory">Sub Category</label>
                                            <select id="subcategory" name="subcategory" class="form-control">
                                                <option value="" selected>---- Select Sub Category---</option>
                                                @foreach($subcategories as $key => $subcategory)
                                                <option value="{{ $subcategory->id }}">{{ $subcategory->nameBn }} ({{ $subcategory->nameEn }})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="description">Image</label>
                                            <input type="file" name="img" id="input-file-now" class="form-control" data-default-file="" />
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="tag">Tag</label>
                                            <select name="tags[]" id="tag" class="form-control" multiple>
                                                <option value="" selected>---- Select Tag---</option>
                                                @foreach($tags as $key => $tag)
                                                <option value="{{ $tag->id }}">{{ $tag->nameBn }} ({{ $tag->nameEn }})</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-xl-4 col-md-6 col-12 mb-1">
                                        <div class="form-group">
                                            <label for="description">Satus</label>
                                            <select name="status" class="form-control">
                                                <option value="1">Active</option>
                                                <option value="0">Deactive</option>
                                            </select>
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
@endsection
