@extends('layouts.adminbase')

@section('title', 'User List')

@section('content')

<div id="page-wrapper" style="width:85%">
    <div id="page-inner" style="width:100%">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">USER LIST</h1>

            </div>
        </div>
        <div class="col-md-6" style="width:100%">
            <!--   USERS -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    User List
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Role</th>
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
                                    <td>{{$rs->email}}</td>
                                    <td>
                                        @foreach($rs->roles as $role)
                                        {{$role->name}} /
                                        @endforeach
                                    </td>
                                    <td></td>
                                    <td><a href="{{route('admin.user.edit', ['id'=>$rs->id])}}"><button type="button" class="btn btn-info">Edit</button></a></td>
                                    <td><a href="{{route('admin.user.show', ['id'=>$rs->id])}}" onclick="return !window.open(this.href, '', 'top=50 left=100 width=1100, height=700')"><button type="button" class="btn btn-success">Show</button></a></td>
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