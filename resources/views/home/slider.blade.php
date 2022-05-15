<!-- Start Slider -->
<section id="mu-slider">
    <!-- Start single slider item -->
    @foreach($sliderdata as $rs)
    <div class="mu-slider-single">
      <div class="mu-slider-img">
        <figure>
          <img src="{{Storage::url($rs->image)}}" alt="img">
        </figure>
      </div>
      <div class="mu-slider-content">
        <h4>{{$rs->title}}</h4>
        <span></span>
        <h2>{{$rs->keywords}}</h2>
        <p>{{$rs->description}}</p>
        <a href="#" class="mu-read-more-btn">Read More</a>
      </div>
    </div>
    @endforeach
  </section>
  <!-- End Slider -->
  
