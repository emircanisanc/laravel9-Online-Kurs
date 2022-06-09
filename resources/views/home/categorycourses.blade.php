@extends('layouts.frontbase')

@section('title', $category->title . ' Courses')

@section('content')

<!-- Page breadcrumb -->
<section id="mu-page-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mu-page-breadcrumb-area">
                    <h2>Course</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li class="active">{{$category->title}}</li>
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
                            <div class="mu-course-container">
                                <div class="row">
                                    @foreach($courselist as $rs)
                                    <div class="col-md-6 col-sm-6">
                                        <div class="mu-latest-course-single">
                                            <figure class="mu-latest-course-img">
                                                <a href="{{route('course',['id'=>$rs->id])}}"><img src="{{Storage::url($rs->image)}}" width="350" height="300" alt="img"></a>
                                                <figcaption class="mu-latest-course-imgcaption">
                                                    <a href="{{route('categorycourses', ['id'=>$category->id, 'slug'=>$category->title])}}">{{$category->title}}</a>
                                                </figcaption>
                                            </figure>
                                            <div class="mu-latest-course-single-content">
                                                <h4><a href="{{route('course',['id'=>$rs->id])}}">{{$rs->title}}</a></h4>
                                                <p>{{$rs->keywords}}</p>
                                                <div class="mu-latest-course-single-contbottom">
                                                    <a class="mu-course-details" href="{{route('course',['id'=>$rs->id])}}">Details</a>
                                                    <span class="mu-course-price" href="#"><a href="{{route('userpanel.shopcart', ['id'=>$rs->id])}}">${{$rs->price}}</a></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach

                                    @if(count($category->children))
                                    @include('home.categorycoursestree',['children' => $category->children])
                                    @endif
                                </div>
                            </div>
                            <!-- end course content container -->
                            <!-- start course pagination -->
                            <div class="mu-pagination">
                                <nav>
                                    <ul class="pagination">
                                        <li>
                                            <a href="#" aria-label="Previous">
                                                <span class="fa fa-angle-left"></span> Prev
                                            </a>
                                        </li>
                                        <li class="active"><a href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">4</a></li>
                                        <li><a href="#">5</a></li>
                                        <li>
                                            <a href="#" aria-label="Next">
                                                Next <span class="fa fa-angle-right"></span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                            <!-- end course pagination -->
                        </div>
                        <div class="col-md-3">
                            <!-- start sidebar -->
                            <aside class="mu-sidebar">
                                <!-- start single sidebar -->
                                @if(count($category->children))
                                <div class="mu-single-sidebar">
                                    <h3>SubCategories</h3>
                                    <ul class="mu-sidebar-catg">
                                        @foreach($category->children as $childcategory)
                                        <li><a href="{{route('categorycourses', ['id'=>$childcategory->id, 'slug'=>$childcategory->title])}}">{{$childcategory->title}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
                                <!-- end single sidebar -->
                                <!-- start single sidebar -->
                                <div class="mu-single-sidebar">
                                    <h3>Tags Cloud</h3>
                                    <div class="tag-cloud">
                                        <p style="font-size: 130%;">{{$category->keywords}}</p>
                                    </div>
                                </div>
                                <!-- end single sidebar -->
                            </aside>
                            <!-- / end sidebar -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@if($category->parent)
@if(count($category->parent->children) > 1)

<!-- Start related categories section -->
<section id="mu-latest-courses">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="mu-latest-courses-area">
          <!-- Start Title -->
          <div class="mu-title">
            <h2>Related Categories</h2>
            <p style="font-size:200%;">{{$category->title}}ne bakanlar bunlara da baktı.</p>
          </div>
          <!-- End Title -->
          <!-- Start related categories content -->
          <div id="mu-latest-course-slide" class="mu-latest-courses-content">
          @foreach($category->parent->children as $rs)
            <div class="col-lg-4 col-md-4 col-xs-12" >
              <div class="mu-latest-course-single">
                <figure class="mu-latest-course-img" style="width: 350; height: 300;">
                  <a href="{{route('categorycourses', ['id'=>$rs->id, 'slug'=>$rs->title])}}"><img src="{{Storage::url($rs->image)}}" width="350" height="300" alt="img" style="width: 350; height: 300;"></a>
                  <figcaption class="mu-latest-course-imgcaption">
                    <span><a href="{{route('categorycourses', ['id'=>$rs->id, 'slug'=>$rs->title])}}">{{$rs->title}}</a></span>
                  </figcaption>
                </figure>
                <div class="mu-latest-mu-latest-courses-content">
                  <p>{{$rs->keywords}}</p>
                  <div class="mu-latest-course-single-contbottom">
                    <a class="mu-course-details" href="{{route('categorycourses', ['id'=>$rs->id, 'slug'=>$rs->title])}}">Details</a>
                  </div>
                </div>
              </div>
            </div>
            @endforeach
          </div>
          <!-- End related categories content -->
        </div>
      </div>
    </div>
  </div>
</section>
<!-- End related categories section -->

@endif
@endif
@endsection