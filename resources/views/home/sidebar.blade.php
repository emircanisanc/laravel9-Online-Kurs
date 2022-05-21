@php
$mainCategories = \App\Http\Controllers\HomeController::maincategorylist()
@endphp
<div class="main-header">
  <div class="container">
    <div class="logo-wrap" itemprop="logo">
      <a class="navbar-brand" href="{{route('home')}}"><i class="fa fa-university"></i><span>UDEMY</span></a>
      <!-- <h1>Education</h1> -->
    </div>
    <div class="nav-wrap">
      <nav class="nav-desktop">
        <ul class="menu-list">
          <li><a href="#">Home</a></li>
          <li class="menu-parent">Categories
            <ul class="sub-menu">
              @foreach($mainCategories as $rs)
              <li class="menu-parent"><a href="{{route('categorycourses', ['id'=>$rs->id, 'slug'=>$rs->title])}}">{{$rs->title}}</a>
              @if(count($rs->children))
              @include('home.categorytree',['children' => $rs->children])
              @endif
              @endforeach
              </li>
            </ul>
          </li>
          <li class="menu-parent">News
            <ul class="sub-menu">
              <li><a href="#">Child</a></li>
              <li><a href="#">Child</a></li>
            </ul>
          </li>
          <li><a href="">About</a></li>
          <li><a href="">Gallery</a></li>
          <li><a href="">Contact</a></li>
          <li>
            <div class="col-d-md-inline-block" style="padding-bottom: 5%;">
              <form class="mu-search-form">
                <input type="search" placeholder="Type Your Keyword(s) & Hit Enter">
              </form>
            </div>
          </li>
        </ul>
      </nav>
      <div id="bar">
        <i class="fas fa-bars"></i>
      </div>
      <div id="close">
        <i class="fas fa-times"></i>
      </div>
    </div>
  </div>
</div>

