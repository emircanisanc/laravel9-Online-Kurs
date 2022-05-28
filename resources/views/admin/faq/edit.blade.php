@extends('layouts.adminbase')

@section('title', 'Edit FAQ')
@section('head')
<script src="https://cdn.ckeditor.com/ckeditor5/34.0.0/classic/ckeditor.js"></script>
@endsection
@section('content')

<div id="page-wrapper">
    <div id="page-inner">
        <div class="col-md-6 col-sm-6 col-xs-12">
            <div class="panel panel-info">
                <div class="panel-heading">
                    EDIT FAQ
                </div>
                <div class="panel-body">
                    <form role="form" action="{{route('admin.faq.update', ['id'=>$data->id])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Question</label>
                            <input class="form-control" name="question" value="{{$data->question}}" type="text">
                        </div>

                        <div class="form-group">
                            <label>Answer</label>
                            <textarea class="form-control" id="answer" name="answer" type="text">{!! $data->answer !!}</textarea>
                            <script>
                                ClassicEditor
                                    .create(document.querySelector('#answer'))
                                    .then(editor => {
                                        console.log(editor);
                                    })
                                    .catch(error => {
                                        console.error(error);
                                    });
                            </script>
                        </div>

                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option selected>{{$data->status}}</option>
                                <option>True</option>
                                <option>False</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-info">Create FAQ</button>

                    </form>
                </div>
            </div>
        </div>
        <!-- /. PAGE INNER  -->
    </div>


    @endsection