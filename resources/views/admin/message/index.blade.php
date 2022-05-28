@extends('layouts.adminbase')

@section('title', 'Message List')

@section('content')

<div id="page-wrapper" style="width:85%">
    <div id="page-inner" style="width:100%">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">MESSAGE LIST</h1>

            </div>
        </div>
        <div class="col-md-6" style="width:100%">
            <!--   MESSAGES -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Message List
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Phone</th>
                                    <th>Email</th>
                                    <th>Subject</th>
                                    <th>Status</th>
                                    <th>Show</th>
                                    <th>Delete</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $rs)
                                <tr>
                                    <td>{{$rs->id}}</td>
                                    <td>{{$rs->name}}</td>
                                    <td>{{$rs->phone}}</td>
                                    <td>{{$rs->email}}</td>
                                    <td>{{$rs->subject}}</td>
                                    <td>{{$rs->status}}</td>
                                    <td><a href="{{route('admin.message.show', ['id'=>$rs->id])}}" onclick="return !window.open(this.href, '', 'top=50 left=100 width=1100, height=700')"><button type="button" class="btn btn-success" >Show</button></a></td>
                                    <td><a href="{{route('admin.message.destroy', ['id'=>$rs->id])}}" onclick="return confirm('Deleting !! Are you sure ?')"><button type="button" class="btn btn-danger">Delete</button></a>
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