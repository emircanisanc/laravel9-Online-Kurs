@extends('layouts.adminbase')

@section('title', 'Category List')

@section('content')

<div id="page-wrapper">
    <div id="page-inner">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">CATEGORY LIST</h1>

            </div>
        </div>

        <div class="col-md-6">
            <!--   CATEGORIES -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Category List
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Title</th>
                                    <th>Keywords</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Status</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                    <th>Show</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $rs)
                                <tr>
                                    <td>{{$rs->id}}</td>
                                    <td>{{$rs->title}}</td>
                                    <td>{{$rs->keywords}}</td>
                                    <td>{{$rs->description}}</td>
                                    <td>{{$rs->image}}</td>
                                    <td>{{$rs->status}}</td>
                                    <td><a href="/admin/category/edit/{{$rs->id}}"><button type="button" class="btn btn-info">Edit</button></a></td>
                                    <td><a href="/admin/category/delete/{{$rs->id}}"><button type="button" class="btn btn-danger">Delete</button></a></td>
                                    <td><a href="/admin/category/show/{{$rs->id}}"><button type="button" class="btn btn-success">Show</button></a></td>
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



</div>

@endsection