@extends('layouts.adminbase')

@section('title', 'Add Course')
@section('head')
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
@endsection
@section('content')

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">
                <div class="panel panel-info">
                    <div class="panel-heading">
                        ADD COURSE
                    </div>
                    <div class="panel-body">
                        <form role="form" action="{{route('admin.course.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control select2" name="category_id">
                                    @foreach($data as $rs)
                                    <option value="{{ $rs->id }}">{{\App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($rs, $rs->title) }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" name="title" type="text">
                            </div>

                            <div class="form-group">
                                <label>Keywords</label>
                                <input class="form-control" name="keywords" type="text">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <input class="form-control" name="description" type="text">
                            </div>
                            <!-- /
                        <div class="form-group" enctype="multipart/form-data">
                            <label class="control-label col-lg-4">Image</label>
                            <div class="">
                                <div class="fileupload fileupload-new" data-provides="fileupload">
                                    <div class="fileupload-preview thumbnail" style="width: 200px; height: 150px;"></div>
                                    <div>
                                        <span class="btn btn-file btn-success"><span class="fileupload-new">Select image</span><span class="fileupload-exists">Change</span><input type="file" name="image"></span>
                                        <a href="#" class="btn btn-danger fileupload-exists" data-dismiss="fileupload">Remove</a>
                                    </div>
                                </div>
                            </div>
                        </div>
-->

                            <div class="form-group" enctype="multipart/form-data">
                                <label for="exampleInputFile">Image</label>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" name="image">
                                        <label class="custom-file-label" for="exampleInputFile">Choose Image File</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Details</label>
                                <textarea class="form-control" id="detail" name="detail" type="text"></textarea>
                                <script>
                                    ClassicEditor
                                        .create(document.querySelector('#detail'))
                                        .then(editor => {
                                            console.log(editor);
                                        })
                                        .catch(error => {
                                            console.error(error);
                                        });
                                </script>
                            </div>

                            <div class="form-group">
                                <label>Price</label>
                                <input class="form-control" name="price" type="number">
                                <!-- <p class="help-block">Title</p> -->
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option>True</option>
                                    <option>False</option>
                                </select>
                            </div>

                            <button type="submit" class="btn btn-info">Save</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- /. PAGE INNER  -->
    </div>


    @endsection