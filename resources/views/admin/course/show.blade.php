@extends('layouts.adminbase')

@section('title', 'Show Course : '.$data->title)

@section('content')

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-6 col-sm-6 col-xs-12">

                <div class="panel panel-info">


                    <div class="panel-heading">
                        DETAILS : {{$data->title}}
                    </div>

                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <th style="width: 100px">Category</th>
                                        <td>{{$data->category->title}}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 100px">User</th>
                                        <td>{{$data->creator->name}}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 100px">Title</th>
                                        <td>{{$data->title}}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 100px">Keywords</th>
                                        <td>{{$data->keywords}}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 100px">Description</th>
                                        <td>{{$data->description}}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 100px">Image</th>
                                        <td>
                                            @if ($data->image)
                                            <img src="{{Storage::url($data->image)}}" style="height: 200px">
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <th style="width: 100px">Details</th>
                                        <td>{!! $data->detail !!}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 100px">Status</th>
                                        <td>{{$data->status}}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 100px">Price</th>
                                        <td>{{$data->price}}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 100px">Created Date</th>
                                        <td>{{$data->created_at}}</td>
                                    </tr>
                                    <tr>
                                        <th style="width: 100px">Updated Date</th>
                                        <td>{{$data->updated_at}}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
                <a href="{{route('admin.course.edit', ['id'=>$data->id])}}"><button type="button" class="btn btn-lg btn-primary">Edit</button></a>
                <a href="{{route('admin.content.index', ['pid'=>$data->id])}}"><button type="button" class="btn btn-lg btn-success">Show Contents</button></a>
                <a href="{{route('admin.course.destroy', ['id'=>$data->id])}}" onclick="return confirm('Deleting !! Are you sure ?')"><button type="button" class="btn btn-lg btn-danger">Delete</button></a>
            </div>
        </div>

        <!-- /. PAGE INNER  -->
    </div>


    @endsection