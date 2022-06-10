@extends('layouts.adminbase')

@section('title', 'Edit Course : '.$data->title)
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
                        EDIT COURSE: {{$data->title}}
                    </div>
                    <div class="panel-body">
                        <form role="form" action="{{route('admin.course.update', ['id'=>$data->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <label>Category</label>
                                <select class="form-control select2" name="category_id">
                                    <option value="{{ $data->category_id }}" selected>{{$data->category->title}}</option>
                                    @foreach($datalist as $rs)
                                    <option value="{{ $rs->id }}">{{\App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($rs, $rs->title) }} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>User</label>
                                <select class="form-control select2" name="user_id">
                                    @if($data->creator)
                                    <option value="{{ $data->user_id }}" selected>{{$data->creator->name}}</option>
                                    @endif
                                    @foreach($users as $rs)
                                    <option value="{{ $rs->id }}">{{$rs->name}} </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Title</label>
                                <input class="form-control" name="title" value="{{$data->title}}" type="text">
                            </div>

                            <div class="form-group">
                                <label>Keywords</label>
                                <input class="form-control" name="keywords" value="{{$data->keywords}}" type="text">
                            </div>

                            <div class="form-group">
                                <label>Description</label>
                                <input class="form-control" name="description" value="{{$data->description}}" type="text">
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
                                <label>Details</label>
                                <textarea class="form-control" id="detail" name="detail" type="text">{!! $data->detail !!}</textarea>
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
                                <input class="form-control" name="price" value="{{$data->price}}" type="number">
                            </div>

                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
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
        </div>
        <!-- /. PAGE INNER  -->
    </div>


    @endsection