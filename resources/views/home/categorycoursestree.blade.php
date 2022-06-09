@csrf
@foreach($children as $subcategory)

@php
$courses = DB::table('courses')->where('category_id', $subcategory->id)->get();
@endphp

@if(count($courses))
    @foreach($courses as $rs)
    <div class="col-md-6 col-sm-6">
        <div class="mu-latest-course-single">
            <figure class="mu-latest-course-img">
                <a href="{{route('course',['id'=>$rs->id])}}"><img src="{{Storage::url($rs->image)}}" width="350" height="300" alt="img"></a>
                <figcaption class="mu-latest-course-imgcaption">
                    <a href="{{route('categorycourses', ['id'=>$subcategory->id, 'slug'=>$subcategory->title])}}">{{$subcategory->title}}</a>
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
@endif
@if($subcategory->children)
    @include('home.categorycoursestree', ['children' => $subcategory->children])
@endif
@endforeach