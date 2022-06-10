<!-- Start footer -->
<footer id="mu-footer">
  <!-- start footer top -->
  <div class="mu-footer-top">
    <div class="container">
      <div class="mu-footer-top-area">
        <div class="row">
          <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="mu-footer-widget">
              <h4>Information</h4>
              <ul>
                <li><a href="{{route('about')}}">About Us</a></li>
                <li><a href="">Course</a></li>
                <li><a href="">Event</a></li>
                <li><a href="">Sitemap</a></li>
                <li><a href="">Term Of Use</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="mu-footer-widget">
              <h4>Student Help</h4>
              <ul>
                <li><a href="">Get Started</a></li>
                <li><a href="{{route('faq')}}">My Questions</a></li>
                <li><a href="#mu-latest-courses">Latest Course</a></li>
                <li><a href="{{route('contact')}}">Contact</a></li>
                <li><a href="{{route('home')}}">Home</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="mu-footer-widget">

            </div>
          </div>
          <div class="col-lg-3 col-md-3 col-sm-3">
            <div class="mu-footer-widget">
              <h4>Contact</h4>
              <address>
                <p>{{$setting->address}}</p>
                <p>Phone: {{$setting->phone}} </p>
                <p>Website: www.markups.io</p>
                <p><a href="mailto:{{$setting->email}}" style="color: white;">Email: {{$setting->email}}</a></p>
              </address>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end footer top -->
  <!-- start footer bottom -->
  <div class="mu-footer-bottom">
    <div class="container">
      <div class="mu-footer-bottom-area">
        <p>&copy; All Right Reserved. Designed by <a href="http://www.markups.io/" rel="nofollow">MarkUps.io</a></p>
      </div>
    </div>
  </div>
  <!-- end footer bottom -->
</footer>
<!-- End footer -->