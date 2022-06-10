@extends('layouts.adminwindow')

@section('title', 'Show Message')

@section('content')

<div id="page-inner" style="width:100%">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">MESSAGE</h1>
        </div>
    </div>
    <div class="col-md-6" style="width:100%">
        <!--   COURSES -->
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <tbody>
                                <tr>
                                    <th style="width: 100px">Id</th>
                                    <td>{{$data->id}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 100px">Course</th>
                                    <td>{{$data->course->title}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 100px">Buyer Name</th>
                                    <td>{{$data->user->name}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 100px">User Email</th>
                                    <td>{{$data->user->email}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 100px">Price</th>
                                    <td>{{$data->price}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 100px">Course Owners</th>
                                    <td>{{count($data->course->owners)}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 100px">Status</th>
                                    <td>{{$data->status}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 100px">Created Date</th>
                                    <td>{{$data->created_at}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 100px">Updated Date</th>
                                    <td>{{$data->updated_at}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 100px">Admin Note</th>
                                    <td>
                                        <form role="form" action="{{route('admin.order.update', ['id'=>$data->id])}}" method="POST">
                                            @csrf
                                            <select name="status">
                                                <option value="New">New</option>
                                                <option value="Accepted">Accepted</option>
                                                <option value="Declined">Declined</option>
                                            </select>
                                            <br>
                                            <button type="submit" class="btn-info">Update Status</button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 100px">Delete</th>
                                    <td><a href="{{route('admin.order.destroy', ['id'=>$data->id, 'slug'=>$data->status])}}" onclick="return confirm('Deleting !! Are you sure ?')"><button type="button" class="btn btn-danger">Delete</button></a></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- End  Kitchen Sink -->
    </div>


</div>
<!-- /. PAGE INNER  -->





@endsection