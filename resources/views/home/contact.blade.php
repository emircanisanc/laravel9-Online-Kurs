@extends('layouts.frontbase')

@section('title', 'Contact | '. $setting->title)
@section('description', $setting->description)
@section('keywords', $setting->keywords)
@section('icon', Storage::url($setting->image))

@section('content')

<!-- Page breadcrumb -->
<section id="mu-page-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mu-page-breadcrumb-area">
                    <h2>Course</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li class="active">Contact</li>
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
                                <!-- start title -->
                                <div class="mu-title">
                                    <h2>Get in Touch</h2>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maiores ut laboriosam corporis doloribus, officia, accusamus illo nam tempore totam alias!</p>
                                </div>
                                <!-- end title -->
                                <!-- start contact content -->
                                <div class="mu-contact-content">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mu-contact-left">
                                                <h1>CONTACT FORM</h1>
                                                @include('home.messages')
                                                <form class="contactform" action="{{route('storemessage')}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <p class="comment-form-author">
                                                        <label for="author">Name <span class="required">*</span></label>
                                                        <input type="text" required="required" size="30" value="" name="name">
                                                    </p>
                                                    <p class="comment-form-email">
                                                        <label for="email">Email <span class="required">*</span></label>
                                                        <input type="email" required="required" aria-required="true" value="" name="email">
                                                    </p>
                                                    <p class="comment-form-url">
                                                        <label for="subject">Subject</label>
                                                        <input type="text" name="subject">
                                                    </p>
                                                    <p class="comment-form-url">
                                                        <label for="subject">Phone</label>
                                                        <input type="number" name="phone">
                                                    </p>
                                                    <p class="comment-form-comment">
                                                        <label for="comment">Message<span class="required">*</span></label>
                                                        <textarea required="required" aria-required="true" rows="8" cols="45" name="message"></textarea>
                                                    </p>
                                                    <p class="form-submit">
                                                        <input type="submit" value="Send Message" class="mu-post-btn" name="submit">
                                                    </p>
                                                </form>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="mu-contact-right">
                                                <h1>CONTACT INFORMATION</h1>
                                                {!! $setting->contact !!}
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