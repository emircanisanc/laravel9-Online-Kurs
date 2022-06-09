@extends('layouts.frontbase')

@section('title', 'User Panel')


@section('content')

<!-- Page breadcrumb -->
<section id="mu-page-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mu-page-breadcrumb-area">
                    <h2>USER PROFILE</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li class="active">User Profile</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End breadcrumb -->

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <!-- Start contact  -->
            <section id="mu-contact">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mu-contact-area">
                                <!-- start contact content -->
                                <div class="mu-contact-content">
                                    <div class="row">
                                        <div class="col-md-2">
                                            <div class="mu-contact-left">
                                                <h1>User Menu</h1>
                                                @include('home.user.usermenu')
                                                
                                            </div>
                                        </div>

                                        <div class="col-md-10">
                                            <div class="mu-contact-right">
                                                <h1>USER INFORMATION</h1>
                                                @include('profile.show')
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end contact content -->
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- End contact  -->

        </div>
    </div>
</div>
@endsection