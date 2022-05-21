<!-- START SIDEBAR -->
<nav class="navbar-default navbar-side" role="navigation">
    <div class="sidebar-collapse">
        <ul class="nav" id="main-menu">
            <li>
                <div class="user-img-div">
                    <img src="{{asset('assets')}}/adminassets/img/user.png" class="img-thumbnail" />

                    <div class="inner-text">
                        Jhon Deo Alex
                        <br />
                        <small>Last Login : 2 Weeks Ago </small>
                    </div>
                </div>

            </li>


            <li>
                <a href="{{route('admin.index')}}"><ion-icon name="home-outline"></ion-icon> Dashboard</a>
            </li>

            <li>
                <a href="#"><i class="fa fa-yelp "></i>Extra Pages <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="invoice.html"><i class="fa fa-coffee"></i>Invoice</a>
                    </li>
                    <li>
                        <a href="pricing.html"><i class="fa fa-flash "></i>Pricing</a>
                    </li>
                    <li>
                        <a href="component.html"><i class="fa fa-key "></i>Components</a>
                    </li>
                    <li>
                        <a href="social.html"><i class="fa fa-send "></i>Social</a>
                    </li>

                    <li>
                        <a href="message-task.html"><i class="fa fa-recycle "></i>Messages & Tasks</a>
                    </li>


                </ul>
            </li>
            <li>
                <a href="table.html"><ion-icon name="albums-outline"></ion-icon> Data Tables </a>

            </li>
            <li>
                <a href="#"><ion-icon name="document-outline"></ion-icon> Category <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="{{route('admin.category.index')}}"><ion-icon name="copy-outline"></ion-icon> Categories </a>
                    </li>
                    <li>
                        <a href="{{route('admin.category.create')}}"><ion-icon name="duplicate-outline"></ion-icon> Create Category</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="#"><ion-icon name="document-outline"></ion-icon> Course <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">

                    <li>
                        <a href="{{route('admin.course.index')}}"><ion-icon name="copy-outline"></ion-icon> Courses </a>
                    </li>
                    <li>
                        <a href="{{route('admin.course.create')}}"><ion-icon name="duplicate-outline"></ion-icon> Create Course</a>
                    </li>

                </ul>
            </li>
            <li>
                <a href="/admin/comments"><ion-icon name="chatbox-ellipses-outline"></ion-icon> Comments</a>
            </li>
            <li>
                <a href="/admin/faq"><i class="fa fa-sign-in "></i> FAQ</a>
            </li>
            <li>
                <a href="/admin/messages"><ion-icon name="mail-outline"></ion-icon> Messages</a>
            </li>
            <li>
                <a href="/admin/user"><ion-icon name="person-circle-outline"></ion-icon> Users</a>
            </li>
            <li>
                <a href="/admin/social"><ion-icon name="earth-outline"></ion-icon> Social</a>
            </li>
            <li>
                <a href="/admin/setting"><ion-icon name="construct-outline"></ion-icon> Settings</a>
            </li>
            <li>
                <a href="#"><i class="fa fa-sitemap "></i>Multilevel Link <span class="fa arrow"></span></a>
                <ul class="nav nav-second-level">
                    <li>
                        <a href="#"><i class="fa fa-bicycle "></i>Second Level Link</a>
                    </li>
                    <li>
                        <a href="#"><i class="fa fa-flask "></i>Second Level Link</a>
                    </li>
                    <li>
                        <a href="#">Second Level Link<span class="fa arrow"></span></a>
                        <ul class="nav nav-third-level">
                            <li>
                                <a href="#"><i class="fa fa-plus "></i>Third Level Link</a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-comments-o "></i>Third Level Link</a>
                            </li>

                        </ul>

                    </li>
                </ul>
            </li>

            <li>
                <a class="active-menu" href="blank.html"><i class="fa fa-square-o "></i>Blank Page</a>
            </li>
        </ul>
    </div>

</nav>
<!-- END SIDEBAR-->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>