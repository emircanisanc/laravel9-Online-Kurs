@extends('layouts.adminbase')

@section('title', 'FAQ List')

@section('content')

<div id="page-wrapper" style="width:85%">
    <div id="page-inner" style="width:100%">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">FAQ LIST</h1>

            </div>
        </div>

        <div class="col-md-6" style="width:100%">
            <!--   FAQ -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    FAQ List
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Question</th>
                                    <th>Answer</th>
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
                                    <td>{{$rs->question}}</td>
                                    <td>{!! $rs->answer !!}</td>
                                    <td>{{$rs->status}}</td>
                                    <td><a href="{{route('admin.faq.edit', ['id'=>$rs->id])}}"><button type="button" class="btn btn-info">Edit</button></a></td>
                                    <td><a href="{{route('admin.faq.destroy', ['id'=>$rs->id])}}" onclick="return confirm('Deleting !! Are you sure ?')"><button type="button" class="btn btn-danger">Delete</button></a>
                                    <td><a href="{{route('admin.faq.show', ['id'=>$rs->id])}}"><button type="button" class="btn btn-success">Show</button></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <td><a href="{{route('admin.faq.create')}}"><button type="button" class="btn btn-lg btn-success">Add FAQ</button></a></td>
            <!-- End Table Sink -->
        </div>
    </div>
    <!-- /. PAGE INNER  -->

</div>

@endsection