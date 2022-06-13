@extends('layouts.frontbase')

@section('title', 'Show Contents')


@section('content')

<!-- Page breadcrumb -->
<section id="mu-page-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mu-page-breadcrumb-area">
                    <h2>USER PROFILE</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li class="active">Show Content</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End breadcrumb -->

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- Start contact  -->
            <section id="mu-contact">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mu-contact-area">
                                <!-- start title -->
                                <div class="mu-title">
                                    <h2>KURSLARIM</h2>
                                    <p>Buradan dilediğiniz gibi bir kursunuzu yönetebilirsiniz.</p>
                                </div>
                                <!-- end title -->
                                <!-- start contact content -->
                                <div class="mu-contact-content">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="mu-contact-left">
                                                <h1>User Menu</h1>
                                                @include('home.user.usermenu')

                                            </div>
                                        </div>

                                        <div class="col-md-10">
                                            <div class="mu-contact-right">
                                                <div class="panel-heading">
                                                    Content List
                                                </div>
                                                <div class="panel-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-striped table-bordered table-hover">
                                                            <thead>
                                                                <tr>
                                                                    <th>Course</th>
                                                                    <th>Title</th>
                                                                    <th>Keywords</th>
                                                                    <th>Description</th>
                                                                    <th>Image</th>
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
                                                                        <img src="{{Storage::url($rs->image)}}" style="height: 40px">
                                                                        @endif
                                                                    </td>
                                                                    <td>{!! $rs->detail !!}</td>
                                                                    <td>{{$rs->file}}</td>
                                                                    <td>{{$rs->videolink}}</td>
                                                                    <td>{{$rs->status}}</td>
                                                                    <td><a href="{{route('userpanel.contentedit', ['id'=>$rs->id])}}"><button type="button" class="btn btn-info">Edit</button></a></td>
                                                                    <td><a href="{{route('userpanel.contentdestroy', ['pid'=>$pid, 'id'=>$rs->id])}}" onclick="return confirm('Deleting !! Are you sure ?')"><button type="button" class="btn btn-danger">Delete</button></a>
                                                                    <td><a href="{{route('userpanel.showcontent', ['id'=>$rs->id])}}"><button type="button" class="btn btn-success">Show</button></a></td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                                <td><a href="{{route('userpanel.contentcreate', ['pid'=>$pid])}}"><button type="button" class="btn btn-lg btn-success">Create Content</button></a></td>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end contact content -->
                    </div>
                </div>
        </div>
    </div>
    </section>
    <!-- End contact  -->

</div>
</div>
</div>
@endsection