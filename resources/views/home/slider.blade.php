<!-- Start Slider -->
<section id="mu-slider">
  <!-- Start single slider item -->
  @foreach($sliderdata as $rs)
  <div class="mu-slider-single">
    <div class="mu-slider-img">
      <figure>
        @if ($rs->image)
        <img src="{{Storage::url($rs->image)}}" alt="img">
        @endif
      </figure>
    </div>
    <div class="mu-slider-content">
      <h1>{{$rs->title}}</h1>
      <span></span>
      <h4>{{$rs->keywords}}</h4>
      <p>{{$rs->description}}</p>
      <a href="{{route('categorycourses', ['id'=>$rs->id, 'slug'=>$rs->title])}}" class="mu-read-more-btn">Find Courses</a>
    </div>
  </div>
  @endforeach
</section>
<!-- End Slider -->