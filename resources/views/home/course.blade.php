@extends('layouts.frontbase')

@section('title', 'Course Details')

@section('content')

<!-- Page breadcrumb -->
<section id="mu-page-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mu-page-breadcrumb-area">
                    <h2>Course Detail</h2>
                    <ol class="breadcrumb">
                        <li><a href="#">Home</a></li>
                        <li class="active">Course Detail</li>
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
                                        @include('home.messages')
                                        <div class="mu-latest-course-single">
                                            <figure class="mu-latest-course-img">
                                                <section id="mu-slider">
                                                    <div class="mu-slider-single">
                                                        <div class="mu-slider-img">
                                                            <figure>
                                                                <img src="{{Storage::url($data->image)}}" alt="img">
                                                            </figure>
                                                        </div>
                                                    </div>
                                                    @foreach($data->contents as $content)
                                                    @if ($content->image)
                                                    <div class="mu-slider-single">
                                                        <div class="mu-slider-img">
                                                            <figure>
                                                                <img src="{{Storage::url($content->image)}}" alt="img">
                                                            </figure>
                                                        </div>
                                                    </div>
                                                    @endif
                                                        @foreach($content->images as $galleryPhoto)
                                                        @if ($content->image)
                                                            <div class="mu-slider-single">
                                                                <div class="mu-slider-img">
                                                                    <figure>
                                                                        <img src="{{Storage::url($galleryPhoto->image)}}" alt="img">
                                                                    </figure>
                                                                </div>
                                                            </div>
                                                            @endif
                                                        @endforeach
                                                    @endforeach

                                                </section>
                                                <figcaption class="mu-latest-course-imgcaption">
                                                    <a href="{{route('categorycourses', ['id'=>$data->category_id, 'slug'=>$data->category->title])}}">{{$data->category->title}}</a>
                                                </figcaption>
                                            </figure>
                                            @php
                                            $average = $data->comments->average('rate');
                                            @endphp
                                            <div class="mu-latest-course-single-content">
                                                <h2>{{$data->title}}</h2>
                                                <h4>Course Information</h4>
                                                <ul>
                                                    <li> <span>Course Price</span> <span>${{$data->price}}</span></li>
                                                    <li> <span>Course Rate</span> <span>{{number_format($average, 1)}}</span></li>
                                                    <li> <span>Place</span> <span>California,USA</span></li>
                                                    <li> <span>Total Students</span> <span>800+</span></li>
                                                    <li> <span>Course Duration</span> <span>4 Weeks</span></li>
                                                    <li> <span>Course Start</span> <span>July 25, 2016</span></li>
                                                </ul>
                                                <h3>Description</h3>
                                                <p>{{$data->description}}</p>
                                                <h3>Details</h3>
                                                <blockquote>
                                                    <p>{!! $data->detail !!}</p>
                                                </blockquote>
                                                <h4>Course Outline</h4>
                                                <div class="table-responsive">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th> Title </th>
                                                                <th> Course Time </th>
                                                                <th> Spent Time </th>
                                                                <th> Status </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($data->contents as $content)
                                                            <tr>
                                                                <td> 1. {{$content->title}} </td>
                                                                <td> 15:30 </td>
                                                                <td> 13:80 </td>
                                                                <td> Successful </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
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
                                        <h3>Related Courses</h3>
                                        <div class="mu-related-item-area">
                                            <div id="mu-related-item-slide">
                                                @foreach($data->category->courses as $relatedcourse)
                                                @if($relatedcourse->id != $data->id)
                                                <div class="col-md-6">
                                                    <div class="mu-latest-course-single">
                                                        <figure class="mu-latest-course-img">
                                                            <a href="{{route('course',['id'=>$relatedcourse->id])}}"><img alt="img" src="{{Storage::url($relatedcourse->image)}}" width="350" height="300"></a>
                                                            <figcaption class="mu-latest-course-imgcaption">
                                                                <a href="{{route('categorycourses', ['id'=>$relatedcourse->category_id, 'slug'=>$relatedcourse->category->title])}}">{{$relatedcourse->category->title}}</a>
                                                                @php
                                                                $average = $relatedcourse->comments->average('rate');
                                                                @endphp
                                                                <span><i class="fa fa-clock-o"></i>Rate: {{number_format($average, 1)}} ({{$relatedcourse->comments->count('id')}})</span>
                                                            </figcaption>
                                                        </figure>
                                                        <div class="mu-latest-course-single-content">
                                                            <h4><a href="{{route('course',['id'=>$relatedcourse->id])}}">{{$relatedcourse->title}}</a></h4>
                                                            <p>{{$relatedcourse->keywords}}</p>
                                                            <div class="mu-latest-course-single-contbottom">
                                                                <a href="{{route('course',['id'=>$relatedcourse->id])}}" class="mu-course-details">Details</a>
                                                                <span href="#" class="mu-course-price">${{$relatedcourse->price}}</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end start related course item -->
                            <!-- start blog comment -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="mu-comments-area">
                                        <h3>{{$data->comments->count('id')}} Comments</h3>
                                        <div class="comments">
                                            <ul class="commentlist">
                                                @foreach($commentlist as $rs)
                                                <li>
                                                    <div class="media">
                                                        <div class="media-left">
                                                            <img alt="img" src="assets/img/testimonial-1.png" class="media-object news-img">
                                                        </div>
                                                        <div class="media-body">
                                                            <h3 class="author-name">{{$rs->user->name}}</h3>
                                                            <span class="comments-date">{{$rs->created_at}}</span>
                                                            <h5>Rate : {{$rs->rate}}</h5>
                                                            <h4>{{$rs->subject}}</h4>
                                                            <p>{{$rs->review}}</p>
                                                            <a class="reply-btn" href="#">Reply <span class="fa fa-long-arrow-right"></span></a>
                                                        </div>
                                                    </div>
                                                </li>
                                                @endforeach
                                            </ul>
                                            <!-- comments pagination -->
                                            <nav>
                                                <ul class="pagination comments-pagination">
                                                    <li>
                                                        <a aria-label="Previous" href="#">
                                                            <span class="fa fa-long-arrow-left"></span>
                                                        </a>
                                                    </li>
                                                    <li><a href="#">1</a></li>
                                                    <li><a href="#">2</a></li>
                                                    <li><a href="#">3</a></li>
                                                    <li><a href="#">4</a></li>
                                                    <li><a href="#">5</a></li>
                                                    <li>
                                                        <a aria-label="Next" href="#">
                                                            <span class="fa fa-long-arrow-right"></span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </nav>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end blog comment -->
                            <!-- start respond form -->
                            <div class="row">
                                <div class="col-md-12">
                                    <div id="respond">
                                        <h3 class="reply-title">Leave a Comment</h3>
                                        <form id="commentform" action="{{route('storecomment')}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <input class="input" type="hidden" name="course_id" value="{{$data->id}}" />
                                            <p class="comment-notes">
                                                Required fields are marked <span class="required">*</span>
                                            </p>
                                            <p class="comment-form-author">
                                                <label for="subject">Subject <span class="required">*</span></label>
                                                <input type="text" required="required" size="30" value="" name="subject">
                                            </p>
                                            <p class="comment-form-comment">
                                                <label for="review">Comment<span class="required">*</span></label>
                                                <textarea required="required" aria-required="true" rows="8" cols="45" name="review"></textarea>
                                            </p>
                                            <p class="comment-form-radio">
                                                <label for="subject">Your Rating <span class="required">*</span></label>
                                                <label class="container">
                                                    <input type="radio" name="rate" value="1">
                                                    <span class="checkmark">One</span>
                                                </label>
                                                <label class="container">
                                                    <input type="radio" name="rate" value="2">
                                                    <span class="checkmark">Two</span>
                                                </label>
                                                <label class="container">
                                                    <input type="radio" name="rate" value="3">
                                                    <span class="checkmark">Three</span>
                                                </label>
                                                <label class="container">
                                                    <input type="radio" name="rate" value="4">
                                                    <span class="checkmark">Four</span>
                                                </label>
                                                <label class="container">
                                                    <input type="radio" checked="checked" name="rate" value="5">
                                                    <span class="checkmark">Five</span>
                                                </label>
                                            </p>
                                            @auth
                                            <p class="form-submit">
                                                <input type="submit" value="Post Comment" class="mu-post-btn" name="submit">
                                            </p>
                                            @else
                                            <a href="/login" class="mu-post-btn">For Submit Your Review, Please Login</a>
                                            @endauth
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- end respond form -->
                        </div>
                        <div class="col-md-3">
                            <!-- start sidebar -->
                            <aside class="mu-sidebar">
                                <!-- start single sidebar -->
                                @if(count($data->category->children))
                                <div class="mu-single-sidebar">
                                    <h3>SubCategories</h3>
                                    <ul class="mu-sidebar-catg">
                                        @foreach($data->category->children as $childcategory)
                                        <li><a href="{{route('categorycourses', ['id'=>$childcategory->id, 'slug'=>$childcategory->title])}}">{{$childcategory->title}}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                                @endif
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



<!-- End from blog -->
@endsection