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
                                    <th style="width: 100px">Name</th>
                                    <td>{{$data->name}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 100px">Phone</th>
                                    <td>{{$data->phone}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 100px">Email</th>
                                    <td>{{$data->email}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 100px">Subject</th>
                                    <td>{{$data->subject}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 100px">Message</th>
                                    <td>{{$data->message}}</td>
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
                                        <form role="form" action="{{route('admin.message.update', ['id'=>$data->id])}}" method="POST">
                                            @csrf
                                        <textarea cols="100" class="form-textarea" id="note" name="note">{{$data->note}}</textarea>
                                        <br>
                                        <button type="submit" class="btn-info">Update</button>
                                        </form>
                                    </td>
                                </tr>
                                <tr>
                                    <th style="width: 100px">Delete</th>
                                    <td><a href="{{route('admin.message.destroy', ['id'=>$data->id])}}" onclick="return confirm('Deleting !! Are you sure ?')"><button type="button" class="btn btn-danger">Delete</button></a></td>
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