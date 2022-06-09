<header id="mu-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="mu-header-area">
          <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <div class="mu-header-top-left">
                <div class="mu-top-email">
                  <i class="fa fa-envelope"></i>
                  <span><a href="mailto:{{$setting->email}}">{{$setting->email}}</a></span>
                </div>
                <div class="mu-top-phone">
                  <i class="fa fa-phone"></i>
                  <span>{{$setting->phone}}</span>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6">
              <div class="mu-header-top-right">
                <nav>
                  <ul class="mu-top-social-nav">
                    <li><a href="{{$setting->facebook}}"><span class="fa fa-facebook"></span></a></li>
                    <li><a href="{{$setting->twitter}}"><span class="fa fa-twitter"></span></a></li>
                    <li><a href="{{$setting->instagram}}"><span class="fa fa-instagram"></span></a></li>
                    <li><a href="{{$setting->youtube}}"><span class="fa fa-youtube"></span></a></li>
                    @auth
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{Auth::user()->name}} <span class="fa fa-angle-down"></span></a>
                      <ul class="dropdown-menu" role="menu">
                        <li><a href="{{route('userpanel.index')}}">My Profile</a></li>
                        <li><a href="/logoutuser">Logout</a></li>
                        <li><a href="{{route('userpanel.orders')}}">My Orders</a></li>
                        <li><a href="{{route('userpanel.createdcourses')}}">Created Courses</a></li>
                        <li><a href="{{route('userpanel.courses')}}">My Courses</a></li>
                        <li><a href="{{route('userpanel.comments')}}">My Reviews</a></li>
                      </ul>
                    </li>
                    @else
                    <li><a href="/loginuser">Login</a>/<a href="{{route('registeruser')}}">Join</a></li>
                    @endauth
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>
<!-- End header  -->