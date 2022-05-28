@extends('layouts.adminbase')

@section('title', 'Comment & Review List')

@section('content')

<div id="page-wrapper" style="width:85%">
    <div id="page-inner" style="width:100%">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">COMMENT LIST</h1>

            </div>
        </div>
        <div class="row">
            <div class="col-md-6" style="width:100%">
                <!--   COMMENT -->
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Comment List
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Course</th>
                                        <th>Name</th>
                                        <th>Subject</th>
                                        <th>Review</th>
                                        <th>Rate</th>
                                        <th>Status</th>
                                        <th>Show</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($data as $rs)
                                    <tr>
                                        <td>{{$rs->id}}</td>
                                        <td><a href="{{route('admin.course.show', ['id'=>$rs->course->id])}}">{{$rs->course->title}}</a></td>
                                        <td>{{$rs->user->name}}</td>
                                        <td>{{$rs->subject}}</td>
                                        <td>{{$rs->review}}</td>
                                        <td>{{$rs->rate}}</td>
                                        <td>{{$rs->status}}</td>
                                        <td><a href="{{route('admin.comment.show', ['id'=>$rs->id])}}" onclick="return !window.open(this.href, '', 'top=50 left=100 width=1100, height=700')"><button type="button" class="btn btn-success">Show</button></a></td>
                                        <td><a href="{{route('admin.comment.destroy', ['id'=>$rs->id])}}" onclick="return confirm('Deleting !! Are you sure ?')"><button type="button" class="btn btn-danger">Delete</button></a>
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