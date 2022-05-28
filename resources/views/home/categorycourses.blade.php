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
                                                    <span class="mu-course-price" href="#">${{$rs->price}}</span>
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
                                <div class="mu-single-sidebar">
                                    <h3>SubCategories</h3>
                                    <ul class="mu-sidebar-catg">
                                    @if(count($category->children))
                                        @foreach($category->children as $childcategory)
                                        <li><a href="{{route('categorycourses', ['id'=>$childcategory->id, 'slug'=>$childcategory->title])}}">{{$childcategory->title}}</a></li>
                                        @endforeach
                                    @endif
                                    </ul>
                                </div>
                                <!-- end single sidebar -->
                                <!-- start single sidebar -->
                                <div class="mu-single-sidebar">
                                    <h3>Popular Course</h3>
                                    <div class="mu-sidebar-popular-courses">
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="assets/img/courses/1.jpg" alt="img">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading"><a href="#">Medical Science</a></h4>
                                                <span class="popular-course-price">$200.00</span>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="assets/img/courses/2.jpg" alt="img">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading"><a href="#">Web Design</a></h4>
                                                <span class="popular-course-price">$250.00</span>
                                            </div>
                                        </div>
                                        <div class="media">
                                            <div class="media-left">
                                                <a href="#">
                                                    <img class="media-object" src="assets/img/courses/3.jpg" alt="img">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <h4 class="media-heading"><a href="#">Health & Sports</a></h4>
                                                <span class="popular-course-price">$90.00</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end single sidebar -->
                                <!-- start single sidebar -->
                                <div class="mu-single-sidebar">
                                    <h3>Tags Cloud</h3>
                                    <div class="tag-cloud">
                                        <a href="#">Health</a>
                                        <a href="#">Science</a>
                                        <a href="#">Sports</a>
                                        <a href="#">Mathematics</a>
                                        <a href="#">Web Design</a>
                                        <a href="#">Admission</a>
                                        <a href="#">History</a>
                                        <a href="#">Environment</a>
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


@endsection