@extends('layouts.frontbase')

@section('title', 'Show Content')


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
                                                    DETAILS : {{$data->title}}
                                                </div>

                                                <div class="panel-body">
                                                    <div class="table-responsive">
                                                        <table class="table table-hover">
                                                            <tbody>
                                                                <tr>
                                                                    <th style="width: 100px">Course</th>
                                                                    <td>{{$data->course->title}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 100px">Title</th>
                                                                    <td>{{$data->title}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 100px">Keywords</th>
                                                                    <td>{{$data->keywords}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 100px">Description</th>
                                                                    <td>{{$data->description}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 100px">Image</th>
                                                                    <td>
                                                                        @if ($data->image)
                                                                        <img src="{{Storage::url($data->image)}}" style="height: 40px">
                                                                        @endif
                                                                    </td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 100px">Details</th>
                                                                    <td>{!! $data->detail !!}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 100px">Status</th>
                                                                    <td>{{$data->status}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 100px">File</th>
                                                                    <td>{{$data->file}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 100px">Videolink</th>
                                                                    <td>{{$data->videolink}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 100px">Created Date</th>
                                                                    <td>{{$data->created_at}}</td>
                                                                </tr>
                                                                <tr>
                                                                    <th style="width: 100px">Updated Date</th>
                                                                    <td>{{$data->updated_at}}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div>
                                            <a href="{{route('userpanel.contentedit', ['id'=>$data->id])}}"><button type="button" class="btn btn-lg btn-primary">Edit</button></a>
                                            <a href="{{route('userpanel.contentdestroy', ['pid'=>$data->course_id, 'id'=>$data->id])}}" onclick="return confirm('Deleting !! Are you sure ?')"><button type="button" class="btn btn-lg btn-danger">Delete</button></a>
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