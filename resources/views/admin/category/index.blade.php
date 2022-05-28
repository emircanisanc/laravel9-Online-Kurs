@extends('layouts.adminbase')

@section('title', 'Category List')

@section('content')

<div id="page-wrapper" style="width:85%">
    <div id="page-inner" style="width:100%">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">CATEGORY LIST</h1>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6" style="width:100%">
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
                                        <th>Parent</th>
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
                                        <td>{{\App\Http\Controllers\AdminPanel\CategoryController::getParentsTree($rs, $rs->title) }}</td>
                                        <td>{{$rs->title}}</td>
                                        <td>{{$rs->keywords}}</td>
                                        <td>{{$rs->description}}</td>
                                        <td>
                                            @if ($rs->image)
                                            <img src="{{Storage::url($rs->image)}}" style="height: 40px">
                                            @endif
                                        </td>
                                        <td>{{$rs->status}}</td>
                                        <td><a href="{{route('admin.category.edit', ['id'=>$rs->id])}}"><button type="button" class="btn btn-info">Edit</button></a></td>
                                        <td><a href="{{route('admin.category.destroy', ['id'=>$rs->id])}}"><button type="button" class="btn btn-danger">Delete</button></a></td>
                                        <td><a href="{{route('admin.category.show', ['id'=>$rs->id])}}"><button type="button" class="btn btn-success">Show</button></a></td>
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
    </div>
    <!-- /. PAGE INNER  -->



</div>

@endsection