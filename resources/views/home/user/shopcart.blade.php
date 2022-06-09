@extends('layouts.frontbase')

@section('title', 'Shopcart')


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
                        <li class="active">User Shopcart</li>
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
                                    <h2>Siparişi Tamamla</h2>
                                    <p>Enter your credit card informations and make your dream come true</p>
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
                                                <h1>COURSE INFORMATION</h1>
                                                <figure class="mu-latest-course-img">
                                                    <section id="mu-slider">
                                                        <div class="mu-slider-single">
                                                            <div class="mu-slider-img">
                                                                <figure>
                                                                    <img src="{{Storage::url($data->image)}}" alt="img">
                                                                </figure>
                                                            </div>
                                                        </div>
                                                    </section>
                                                </figure>
                                                <div class="mu-latest-course-single-content">
                                                    <h2><a href="{{route('course',['id'=>$data->id])}}">{{$data->title}}</a></h2>
                                                    <h4>Course Information</h4>
                                                    <ul>
                                                        <li> <span>Course Price</span> <span>${{$data->price}}</span></li>
                                                    </ul>
                                                    @if($user->courses->contains('id', $data->id))
                                                    <button class="btn-light" style="color: blue;">Watch Now</button>
                                                    @else
                                                    <form action="{{route('userpanel.storeorder')}}" method="POST" enctype="multipart/form-data">
                                                         @csrf
                                                        <input name="price" value="{{$data->price}}" type="hidden">
                                                        <input name="course_id" value="{{$data->id}}" type="hidden">
                                                    <button type="submit" class="btn-light" style="color: blue;">Buy Now</button>
                                                    </form>
                                                    @endif
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