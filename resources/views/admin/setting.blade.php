@extends('layouts.adminbase')

@section('title', 'Admin Panel')
@section('head')
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
@endsection
@section('content')

<div id="page-wrapper">
    <div id="page-inner">
        <div class="col-xl-6 row-cols-xl-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Settings
                </div>
                <div class="panel-body">
                    <form role="form" action="{{route('admin.setting.update')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <ul class="nav nav-pills">
                            <li class="active"><a href="#general-pills" data-toggle="tab">Home</a>
                            </li>
                            <li class=""><a href="#smtpemail-pills" data-toggle="tab">Smtp Email</a>
                            </li>
                            <li class=""><a href="#socialmedia-pills" data-toggle="tab">Social Media</a>
                            </li>
                            <li class=""><a href="#aboutus-pills" data-toggle="tab">About Us</a>
                            </li>
                            <li class=""><a href="#contact-pills" data-toggle="tab">Contact Page</a>
                            </li>
                            <li class=""><a href="#references-pills" data-toggle="tab">References</a>
                            </li>
                        </ul>

                        <div class="tab-content">
                            <div class="tab-pane fade active in" id="general-pills">
                                <div class="form-group" hidden>
                                    <label>Id</label>
                                    <input class="form-control" name="id" value="{{$data->id}}" type="text">
                                </div>
                                <div class="form-group">
                                    <label>Title</label>
                                    <input class="form-control" name="title" value="{{$data->title}}" type="text">
                                </div>

                                <div class="form-group">
                                    <label>Keywords</label>
                                    <input class="form-control" name="keywords" value="{{$data->keywords}}" type="text">
                                </div>

                                <div class="form-group">
                                    <label>Description</label>
                                    <input class="form-control" name="description" value="{{$data->description}}" type="text">
                                </div>

                                <div class="form-group">
                                    <label>Company</label>
                                    <input class="form-control" name="company" value="{{$data->company}}" type="text">
                                </div>

                                <div class="form-group">
                                    <label>Address</label>
                                    <input class="form-control" name="address" value="{{$data->address}}" type="text">
                                </div>

                                <div class="form-group">
                                    <label>Phone</label>
                                    <input class="form-control" name="phone" value="{{$data->phone}}" type="number">
                                </div>

                                <div class="form-group">
                                    <label>E-mail</label>
                                    <input class="form-control" name="email" value="{{$data->email}}" type="email">
                                </div>

                                <div class="form-group">
                                    <label>Status</label>
                                    <select class="form-control" name="status">
                                        <option selected>{{$data->status}}</option>
                                        <option>True</option>
                                        <option>False</option>
                                    </select>
                                </div>
                                <div class="form-group" enctype="multipart/form-data">
                                    <label for="exampleInputFile">Icon</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" name="icon">
                                            <label class="custom-file-label" for="exampleInputFile">Choose Icon File</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="smtpemail-pills">
                                <div class="form-group">
                                    <label>Smtp Server</label>
                                    <input class="form-control" name="smtpserver" value="{{$data->smtpserver}}" type="text">
                                </div>

                                <div class="form-group">
                                    <label>Smtp Email</label>
                                    <input class="form-control" name="smtpemail" value="{{$data->smtpemail}}" type="email">
                                </div>

                                <div class="form-group">
                                    <label>Smtp Password</label>
                                    <input class="form-control" name="smtppassword" value="{{$data->smtppassword}}" type="text">
                                </div>

                                <div class="form-group">
                                    <label>Smtp Port</label>
                                    <input class="form-control" name="smtpport" value="{{$data->smtpport}}" type="number">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="socialmedia-pills">
                                <div class="form-group">
                                    <label>Fax</label>
                                    <input class="form-control" name="fax" value="{{$data->fax}}" type="text">
                                </div>

                                <div class="form-group">
                                    <label>Facebook</label>
                                    <input class="form-control" name="facebook" value="{{$data->facebook}}" type="text">
                                </div>

                                <div class="form-group">
                                    <label>Instagram</label>
                                    <input class="form-control" name="instagram" value="{{$data->instagram}}" type="text">
                                </div>

                                <div class="form-group">
                                    <label>Twitter</label>
                                    <input class="form-control" name="twitter" value="{{$data->twitter}}" type="text">
                                </div>

                                <div class="form-group">
                                    <label>Youtube</label>
                                    <input class="form-control" name="youtube" value="{{$data->youtube}}" type="text">
                                </div>
                            </div>
                            <div class="tab-pane fade" id="aboutus-pills">
                                <div class="form-group">
                                    <label>About Us</label>
                                    <textarea class="form-control" id="aboutus" name="aboutus" type="text">{!! $data->aboutus !!}</textarea>
                                    <script>
                                        ClassicEditor
                                            .create(document.querySelector('#aboutus'))
                                            .then(editor => {
                                                console.log(editor);
                                            })
                                            .catch(error => {
                                                console.error(error);
                                            });
                                    </script>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="contact-pills">
                                <div class="form-group">
                                    <label>Contact Page</label>
                                    <textarea class="form-control" id="contact" name="contact" type="text">{!! $data->contact !!}</textarea>
                                    <script>
                                        ClassicEditor
                                            .create(document.querySelector('#contact'))
                                            .then(editor => {
                                                console.log(editor);
                                            })
                                            .catch(error => {
                                                console.error(error);
                                            });
                                    </script>
                                </div>
                            </div>
                            <div class="tab-pane fade" id="references-pills">
                                <div class="form-group">
                                    <label>References</label>
                                    <textarea class="form-control" id="references" name="references" type="text">{!! $data->references !!}</textarea>
                                    <script>
                                        ClassicEditor
                                            .create(document.querySelector('#references'))
                                            .then(editor => {
                                                console.log(editor);
                                            })
                                            .catch(error => {
                                                console.error(error);
                                            });
                                    </script>
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-info">Update All Settings</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection