@extends('layouts.frontbase')

@section('title', 'Create Content')
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>

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
                        <li class="active">Create Content</li>
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
                                    <h2>KURSLARIM</h2>
                                    <p>Buradan dilediğiniz gibi bir kursunuzu yönetebilirsiniz.</p>
                                </div>
                                <!-- end title -->
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
                                                <div class="panel-heading">
                                                    ADD CONTENT
                                                </div>
                                                <div class="panel-body">
                                                    <form role="form" action="{{route('userpanel.contentstore')}}" method="POST" enctype="multipart/form-data">
                                                        @csrf

                                                        <input class="input" type="hidden" name="course_id" value="{{$data}}" />

                                                        <div class="form-group">
                                                            <label>Title</label>
                                                            <input class="form-control" name="title" type="text">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Keywords</label>
                                                            <input class="form-control" name="keywords" type="text">
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Description</label>
                                                            <input class="form-control" name="description" type="text">
                                                        </div>

                                                        <div class="form-group" enctype="multipart/form-data">
                                                            <label for="exampleInputFile">Image</label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" name="image">
                                                                    <label class="custom-file-label" for="exampleInputFile">Choose Image File</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Details</label>
                                                            <textarea class="form-control" id="detail" name="detail" type="text"></textarea>
                                                            <script>
                                                                ClassicEditor
                                                                    .create(document.querySelector('#detail'))
                                                                    .then(editor => {
                                                                        console.log(editor);
                                                                    })
                                                                    .catch(error => {
                                                                        console.error(error);
                                                                    });
                                                            </script>
                                                        </div>

                                                        <div class="form-group" enctype="multipart/form-data">
                                                            <label for="exampleInputFile">File</label>
                                                            <div class="input-group">
                                                                <div class="custom-file">
                                                                    <input type="file" class="custom-file-input" name="file">
                                                                    <label class="custom-file-label" for="exampleInputFile">Choose File</label>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <div class="form-group">
                                                            <label>Videolink</label>
                                                            <input class="form-control" name="videolink" type="text">
                                                        </div>


                                                        <button type="submit" class="btn btn-info">Save</button>

                                                    </form>
                                                </div>
                                            </div>
                                        </div>
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