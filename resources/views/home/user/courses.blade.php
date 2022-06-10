@extends('layouts.frontbase')

@section('title', 'User Courses')


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
                        <li class="active">User Courses</li>
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
                                    <p>Tüm kurslarınıza bu sayfadan ulaşabilirsiniz.</p>
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
                                                <h1>USER COURSES</h1>
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Course</th>
                                                            <th>Teacher</th>
                                                            <th>Watch Link</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($courses as $rs)
                                                        <tr>
                                                            <td><a href="{{route('course', ['id'=>$rs->id])}}">{{$rs->title}}</a></td>
                                                            <td>{{$rs->creator->name}}</td>
                                                            <td><a href="{{route('userpanel.videopage', ['id' => $rs->id])}}" class="btn btn-success" role="button">Watch Now</a></td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
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