@extends('layouts.adminbase')

@section('title', 'Content List')

@section('content')

<div id="page-wrapper" style="width:85%">
    <div id="page-inner" style="width:100%">
        <div class="row">
            <div class="col-md-12">
                <h1 class="page-head-line">CONTENT LIST</h1>

            </div>
        </div>

        <div class="col-md-6" style="width:100%">
            <!--   CONTENTS -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Content List
                </div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Course</th>
                                    <th>Title</th>
                                    <th>Keywords</th>
                                    <th>Description</th>
                                    <th>Image</th>
                                    <th>Image Gallery</th>
                                    <th>Detail</th>
                                    <th>File</th>
                                    <th>Videolink</th>
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
                                    <td>
                                        @if($rs->course_id)
                                        {{\App\Models\Course:: find($rs->course_id)->title}}
                                        @endif
                                    </td>
                                    <td>{{$rs->title}}</td>
                                    <td>{{$rs->keywords}}</td>
                                    <td>{{$rs->description}}</td>
                                    <td>
                                        @if ($rs->image)
                                        <img src = "{{Storage::url($rs->image)}}" style="height: 40px">
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{route('admin.image.index', ['pid'=>$rs->id])}}"
                                        onclick="return !window.open(this.href, '', 'top=50 left=100 width=1100, height=700')">
                                            <img src="{{asset('assets')}}/adminassets/img/gallery.png">
                                        </a>
                                    </td>
                                    <td>{!! $rs->detail !!}</td>
                                    <td>{{$rs->file}}</td>
                                    <td>{{$rs->videolink}}</td>
                                    <td>{{$rs->status}}</td>
                                    <td><a href="{{route('admin.content.edit', ['id'=>$rs->id])}}"><button type="button" class="btn btn-info">Edit</button></a></td>
                                    <td><a href="{{route('admin.content.destroy', ['pid'=>$pid, 'id'=>$rs->id])}}" onclick="return confirm('Deleting !! Are you sure ?')"><button type="button" class="btn btn-danger">Delete</button></a>
                                    <td><a href="{{route('admin.content.show', ['id'=>$rs->id])}}"><button type="button" class="btn btn-success">Show</button></a></td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <td><a href="{{route('admin.content.create', ['pid'=>$pid])}}"><button type="button" class="btn btn-lg btn-success">Create Content</button></a></td>
            <!-- End Table Sink -->
        </div>
    </div>
    <!-- /. PAGE INNER  -->

</div>

@endsection