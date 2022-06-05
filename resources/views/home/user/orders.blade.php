@extends('layouts.frontbase')

@section('title', 'User Orders')


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
                        <li class="active">User Orders</li>
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
                                    <h2>Get in Touch</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores ut laboriosam corporis doloribus, officia, accusamus illo nam tempore totam alias!</p>
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
                                                <h1>USER ORDERS</h1>
                                                <table class="table table-striped table-bordered table-hover">
                                                    <thead>
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Course</th>
                                                            <th>Price</th>
                                                            <th>Status</th>
                                                            <th>Order Date</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($orders as $rs)
                                                        <tr>
                                                            <td>{{$rs->id}}</td>
                                                            <td><a href="{{route('course', ['id'=>$rs->course->id])}}">{{$rs->course->title}}</a></td>
                                                            <td>${{$rs->price}}</td>
                                                            <td>{{$rs->status}}</td>
                                                            <td>{{$rs->created_at}}</td>
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