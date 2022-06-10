@extends('layouts.frontbase')

@section('title', $user->name)

@section('content')


<!-- Page breadcrumb -->
<section id="mu-page-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mu-page-breadcrumb-area">
                    <h2>User Detail</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li class="active">User Detail</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End breadcrumb -->


<section id="mu-course-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mu-course-content-area">
                    <div class="row">
                        <div class="col-md-9">
                            <!-- start course content container -->
                            <div class="mu-course-container mu-course-details">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mu-latest-course-single">
                                            <figure class="mu-latest-course-img">
                                                <section id="mu-slider">
                                                    <div class="mu-slider-single">
                                                        <div class="mu-slider-img">
                                                            <figure>
                                                            <img src="{{Storage::url($user->image)}}" alt="img">
                                                            </figure>
                                                        </div>
                                                    </div>
                                                </section>
                                            </figure>
                                            @php
                                            $average = 0;
                                            foreach($user->createdCourses as $data)
                                            {
                                                 $average = $average + $data->comments->average('rate');
                                            }
                                               
                                           
                                            @endphp
                                            <div class="mu-latest-course-single-content">
                                                <h2>{{$user->name}}</h2>
                                                <h4>User Information</h4>
                                                <ul>
                                                    <li> <span>User Average Rate</span> <span>{{number_format($average, 1)}}</span></li>
                                                    <li> <span>User Created Course</span> <span>{{count($user->createdCourses)}}+</span></li>
                                                    <li> <span>User Joined At</span> <span>{{$data->created_at}}</span></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end course content container -->
                            <!-- start related course item -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mu-related-item">
                                        <h3>User Created Courses</h3>
                                        <div class="mu-related-item-area">
                                            <div id="mu-related-item-slide">
                                                @foreach($user->createdCourses as $course)
                                                <div class="col-md-6">
                                                    <div class="mu-latest-course-single">
                                                        <figure class="mu-latest-course-img">
                                                            <a href="{{route('course',['id'=>$course->id])}}"><img alt="img" src="{{Storage::url($course->image)}}" width="350" height="300"></a>
                                                            <figcaption class="mu-latest-course-imgcaption">
                                                                <a href="{{route('categorycourses', ['id'=>$course->category_id, 'slug'=>$course->category->title])}}">{{$course->category->title}}</a>
                                                                @php
                                                                $average = $course->comments->average('rate');
                                                                @endphp
                                                                <span><i class="fa fa-clock-o"></i>Rate: {{number_format($average, 1)}} ({{$course->comments->count('id')}})</span>
                                                            </figcaption>
                                                        </figure>
                                                        <div class="mu-latest-course-single-content">
                                                            <h4><a href="{{route('course',['id'=>$course->id])}}">{{$course->title}}</a></h4>
                                                            <p>{{$course->keywords}}</p>
                                                            <div class="mu-latest-course-single-contbottom">
                                                                <a href="{{route('course',['id'=>$course->id])}}" class="mu-course-details">Details</a>
                                                                <span href="#" class="mu-course-price">${{$course->price}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end start related course item -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>


@endsection