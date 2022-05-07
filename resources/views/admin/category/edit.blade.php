@extends('layouts.adminbase')

@section('title', 'Edit Category : '.$data->title)

@section('content')

<div id="page-wrapper">
    <div id="page-inner">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    EDIT CATEGORY: {{$data->title}}
                </div>
                <div class="panel-body">
                    <form role="form" action="{{route('admin.category.update', ['id'=>$data->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label>Parent Category</label>
                            <select class="form-control select2" name="parent_id">
                                <option value="0" selected="selected">Main Category</option>
                                @foreach($datalist as $rs)
                                <option value="{{ $rs->id }}">{{\App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($rs, $rs->title) }} </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Title</label>
                            <input class="form-control" name="title" value="{{$data->title}}" type="text">
                            <p class="help-block">Title</p>
                        </div>

                        <div class="form-group">
                            <label>Keywords</label>
                            <input class="form-control" name="keywords" value="{{$data->keywords}}" type="text">
                            <p class="help-block">keywords</p>
                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <input class="form-control" name="description" value="{{$data->description}}" type="text">
                            <p class="help-block">Title</p>
                        </div>

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
                                    <label>Status</label>
                                    <select class="form-control" name="status" >
                                                <option selected>{{$data->status}}</option>
                                                <option>True</option>
                                                <option>False</option>
                                            </select>
                        </div>

                        <button type="submit" class="btn btn-info">Update</button>

                    </form>
                </div>
            </div>
        </div>
        <!-- /. PAGE INNER  -->
    </div>


    @endsection