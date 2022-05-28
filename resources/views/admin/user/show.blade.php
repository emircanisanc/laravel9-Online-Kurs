@extends('layouts.adminwindow')

@section('title', 'Show User')

@section('content')

<div id="page-inner" style="width:100%">
    <div class="row">
        <div class="col-md-12">
            <h1 class="page-head-line">USER</h1>
        </div>
    </div>
    <div class="row">
    <div class="col-md-6" style="width:100%">
        <!--   USER -->
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
                                    <th style="width: 100px">Email</th>
                                    <td>{{$data->email}}</td>
                                </tr>
                                <tr>
                                    <th style="width: 100px;">Roles</th>
                                    <td>
                                        @foreach($data->roles as $role)
                                        {{$role->name}}
                                        <a href="{{route('admin.user.destroyrole', ['uid'=>$data->id, 'rid'=>$role->id])}}" onclick="return confirm('Deleting !! Are you sure ?')"><button type="button" class="btn btn-danger">[x]</button></a>
                                        @endforeach
                                    </td>
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
                                    <th style="width: 100px">Add Role</th>
                                    <td>
                                        <form role="form" action="{{route('admin.user.addrole', ['id'=>$data->id])}}" method="POST">
                                            @csrf
                                        <select name="role_id">
                                            @foreach($roles as $role)
                                            <option value="{{$role->id}}">{{$role->name}}</option>
                                            @endforeach
                                        </select>
                                        <button type="submit" class="btn-info">Update</button>
                                        </form>
                                    </td>
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

</div>
<!-- /. PAGE INNER  -->





@endsection