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
                                    <th style="width: 100px">Name</th>
                                    <td>{{$data->user->name}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 100px">Phone</th>
                                    <td>{{$data->subject}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 100px">Email</th>
                                    <td>{{$data->review}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 100px">Subject</th>
                                    <td>{{$data->rate}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 100px">IP Number</th>
                                    <td>{{$data->IP}}</td>
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
                                        <form role="form" action="{{route('admin.comment.update', ['id'=>$data->id])}}" method="POST">
                                            @csrf
                                            <select name="status">
                                                <option value="New">New</option>
                                                <option value="True">True</option>
                                                <option value="False">False</option>
                                            </select>
                                            <br>
                                            <button type="submit" class="btn-info">Update Status</button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 100px">Delete</th>
                                    <td><a href="{{route('admin.comment.destroy', ['id'=>$data->id])}}" onclick="return confirm('Deleting !! Are you sure ?')"><button type="button" class="btn btn-danger">Delete</button></a></td>
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