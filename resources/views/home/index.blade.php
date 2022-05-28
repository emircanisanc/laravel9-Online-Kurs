@extends('layouts.frontbase')

@section('title', $setting->title)
@section('description', $setting->description)
@section('keywords', $setting->keywords)
@section('icon', Storage::url($setting->image))

@section('content')
@include('home.slider')
<!-- Start service  -->
<section id="mu-service">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="mu-service-area">
          <!-- Start single service -->
          <div class="mu-service-single">
            <span class="fa fa-book"></span>
            <h3>Learn Online</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima officiis, deleniti dolorem exercitationem praesentium, est!</p>
          </div>
          <!-- Start single service -->
          <!-- Start single service -->
          <div class="mu-service-single">
            <span class="fa fa-users"></span>
            <h3>Expert Teachers</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima officiis, deleniti dolorem exercitationem praesentium, est!</p>
          </div>
          <!-- Start single service -->
          <!-- Start single service -->
          <div class="mu-service-single">
            <span class="fa fa-table"></span>
            <h3>Best Classrooms</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima officiis, deleniti dolorem exercitationem praesentium, est!</p>
          </div>
          <!-- Start single service -->
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End service  -->




<!-- Start features section -->
<section id="mu-features">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="mu-features-area">
          <!-- Start Title -->
          <div class="mu-title">
            <h2>Most Popular Categories</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio ipsa ea maxime mollitia, vitae voluptates, quod at, saepe reprehenderit totam aliquam architecto fugiat sunt animi!</p>
          </div>
          <!-- End Title -->
          <!-- Start features content -->
          <div class="mu-features-content">
            <div class="row">
              @foreach($popularcategories as $rs)
              <div class="col-lg-4 col-md-4  col-sm-6">
                <div class="mu-single-feature">
                  <span class="fa fa-book"></span>
                  <h4>{{$rs->title}}</h4>
                  <p>{{$rs->keywords}}</p>
                  <a href="{{route('categorycourses', ['id'=>$rs->id, 'slug'=>$rs->title])}}">Find Related Courses</a>
                </div>
              </div>
              @endforeach
            </div>
          </div>
          <!-- End features content -->
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End features section -->

<!-- Start latest course section -->
<section id="mu-latest-courses">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="mu-latest-courses-area">
          <!-- Start Title -->
          <div class="mu-title">
            <h2>Latest Courses</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Distinctio ipsa ea maxime mollitia, vitae voluptates, quod at, saepe reprehenderit totam aliquam architecto fugiat sunt animi!</p>
          </div>
          <!-- End Title -->
          <!-- Start latest course content -->
          <div id="mu-latest-course-slide" class="mu-latest-courses-content">
            @foreach($courses as $rs)
            @php
              $average = $rs->comments->average('rate');
            @endphp
            <div class="col-lg-4 col-md-4 col-xs-12" >
              <div class="mu-latest-course-single">
                <figure class="mu-latest-course-img" style="width: 350; height: 300;">
                  <a href="{{route('course',['id'=>$rs->id])}}"><img src="{{Storage::url($rs->image)}}" width="350" height="300" alt="img" style="width: 350; height: 300;"></a>
                  <figcaption class="mu-latest-course-imgcaption">
                    <a href="#">{{\App\Models\Category:: find($rs->category_id)->title}}</a>
                    <span><i class="fa fa-star"></i>Rate: {{number_format($average, 1)}} ({{$rs->comments->count('id')}})</span>
                  </figcaption>
                </figure>
                <div class="mu-latest-course-single-content">
                  <h5><a href="{{route('course',['id'=>$rs->id])}}">{{$rs->title}}</a></h5>
                  <p>{{$rs->keywords}}</p>
                  <div class="mu-latest-course-single-contbottom">
                    <a class="mu-course-details" href="{{route('course',['id'=>$rs->id])}}">Details</a>
                    <span class="mu-course-price" href="#">${{$rs->price}}</span>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <!-- End latest course content -->
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End latest course section -->

<!-- Start testimonial -->
<section id="mu-testimonial">
  <div class="container">
    <div class="row">
      <div class="col-md-12">
        <div class="mu-testimonial-area">
          <div id="mu-testimonial-slide" class="mu-testimonial-content">
            <!-- start testimonial single item -->
            @foreach($popularComments as $popularComment)
            <div class="mu-testimonial-item">
              <div class="mu-testimonial-quote">
              
                <blockquote>
                <p style="color: salmon;">{{$popularComment->course->title}}</p>
                  <p>{{$popularComment->review}}</p>
                </blockquote>
              </div>
              <div class="mu-testimonial-img">
                <img src="{{asset('assets')}}/assets/img/testimonial-1.png" alt="img">
              </div>
              <div class="mu-testimonial-info">
                <h4>{{$popularComment->user->name}}</h4>
                <span>Happy Student</span>
              </div>
            </div>
            @endforeach
            <!-- end testimonial single item -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End testimonial -->








@endsection