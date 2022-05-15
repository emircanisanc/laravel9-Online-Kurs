@extends('layouts.adminwindow')

@section('title', 'Content Image Gallery')

@section('content')

<div id="page-inner" style="width:100%">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">{{$content->title}}</h1>
        </div>
    </div>
    <div class="panel-body">
        <form role="form" action="{{route('admin.image.store', ['pid'=>$content->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf    
            <div class="form-group">
                <label>Title</label>
                <input class="form-control" name="title" type="text">
            </div>
 <!-- 
            <div class="form-group" enctype="multipart/form-data">
                <label for="exampleInputFile">Image</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="image">
                        <label class="custom-file-label" for="exampleInputFile"></label>
                    </div>
                </div>
            </div>
            -->
            <div class="md-6" enctype="multipart/form-data">
                <label for="formFile" class="form-label">Image</label>
                <input class="form-control" type="file" name="image">
            </div>
            <br>
            <button type="submit" class="btn btn-info">Save</button>

        </form>
    </div>
    <div class="col-md-6" style="width:100%">
        <!--   COURSES -->
        <div class="panel panel-default">
            <div class="panel-heading">
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Title</th>
                                <th>Image</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($images as $rs)
                            <tr>
                                <td>{{$rs->id}}</td>
                                <td>{{$rs->title}}</td>
                                <td>
                                    @if ($rs->image)
                                    <img src="{{Storage::url($rs->image)}}" style="height: 40px">
                                    @endif
                                </td>
                                <td><a href="{{route('admin.image.destroy', ['pid'=>$content->id, 'id'=>$rs->id])}}"><button type="button" class="btn btn-danger">Delete</button></a></td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End  Kitchen Sink -->
    </div>


</div>
<!-- /. PAGE INNER  -->





@endsection