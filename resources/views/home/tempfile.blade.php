@php
$mainCategories = \App\Http\Controllers\HomeController::maincategorylist()
@endphp
<!-- Start menu -->
<section id="mu-menu">
    <nav class="navbar navbar-default" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <!-- FOR MOBILE VIEW COLLAPSED BUTTON -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- LOGO -->
                <!-- TEXT BASED LOGO -->
                <a class="navbar-brand" href="{{route('home')}}"><i class="fa fa-university"></i><span>Varsity</span></a>
                <!-- IMG BASED LOGO  -->
                <!-- <a class="navbar-brand" href="index.html"><img src="{{asset('assets')}}/assets/img/logo.png" alt="logo"></a> -->
            </div>
            <div id="navbar" class="navbar-collapse collapse">
                <ul id="top-menu" class="nav navbar-nav navbar-right main-nav">
                    <li class="active"><a href="index.html">Home</a></li>
                    <!--
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">Categories<span class="fa fa-angle-down"></span></a>
            <ul class="dropdown-menu" role="menu">
            @foreach($mainCategories as $rs)
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">{{$rs->title}}<span class="fa fa-angle-down"></span></a>
            <div class="dropdown-menu">
              <div class="row">
                @if(count($rs->children))
                @include('home.categorytree',['children' => $rs->children])
                @endif
              </div>
            </div>
            </li>
            @endforeach
            </ul>
          </li>
           -->
                    <li class="menu-parent">Courses
                        <ul class="sub-menu">
                            <li><a href="#">Child</a></li>
                            <li><a href="#">Child</a></li>
                            <li class="menu-parent">Child
                                <ul class="sub-menu">
                                    <li><a href="">Grand-child</a></li>
                                    <li><a href="">Grand-child</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>


                    <li class="dropdown">

                        <a href="#" class="tree-toggle">Coderspenio <span class="fa fa-angle-down"></span></a>
                        <ul class="dropdown-menu nav nav-list tree bullets">
                            <li><a href="#">Matematik</a></li>
                            <li><a href="#">CSS Dersleri <span class="badge">42</span></a></li>

                            <li>
                                <a href="#" class="tree-toggle">Bilgisayar <span class="fa fa-angle-down"></span></a>
                                <ul class="dropdown-menu nav nav-list tree bullets">
                                    <li><a href="#">Matematik</a></li>
                                    <li><a href="#">CSS Dersleri <span class="badge">42</span></a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>

                    <li><a href="gallery.html">Gallery</a></li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <span class="fa fa-angle-down"></span></a>
                        <ul class="dropdown-menu" role="menu">



                            <li><a href="blog-archive.html">Blog Archive</a></li>
                            <li><a href="blog-single.html">Blog Single</a></li>
                        </ul>
                    </li>
                    <li><a href="contact.html">Contact</a></li>
                    <li><a href="404.html">404 Page</a></li>
                    <li><a href="#" id="mu-search-icon"><i class="fa fa-search"></i></a></li>
                </ul>

            </div>
            <!--/.nav-collapse -->
        </div>
    </nav>
</section>
<!-- End menu -->
<!-- Start search box -->
<div id="mu-search">
    <div class="mu-search-area">
        <button class="mu-search-close"><span class="fa fa-close"></span></button>
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <form class="mu-search-form">
                        <input type="search" placeholder="Type Your Keyword(s) & Hit Enter">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End search box -->