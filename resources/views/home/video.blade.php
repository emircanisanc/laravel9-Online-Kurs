@extends('layouts.videobase')

@section('title', $contents[0]->course->title)

@section('content')
<style>
    video {
        width: 800px;
        height: 400px;
    }

    #playlist {
        width: 400px;
        margin: 0;
        padding: 0;
        list-style: none;
    }

    a {
        text-decoration: none;
    }

    .activev a {
        color: #5db0e6;
        text-decoration: none;
    }

    li a {
        color: #eeeedd;
        background: #333;
        padding: 12px;
        display: block;
    }

    li a:hover {
        text-decoration: none;
    }
</style>

<!-- Page breadcrumb -->
<section id="mu-page-breadcrumb">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mu-page-breadcrumb-area">
                    <h2>Course Page</h2>
                    <ol class="breadcrumb">
                        <li><a href="{{route('home')}}">Home</a></li>
                        <li class="active">{{$contents[0]->course->title}} </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End breadcrumb -->


<section id="mu-course-content">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mu-course-content-area">
                    <div class="row">
                        <div class="col-md-9">
                            <video id="videoplaylist" preload="auto" tabindex="0" controls="">
                                <source src="{{Storage::url($contents[0]->file)}}">
                            </video>


                        </div>
                        <div class="col-md-3">
                            <!-- start sidebar -->
                            <aside class="mu-sidebar">
                                <!-- start single sidebar -->
                                <h3>Videos</h3>
                                <ul id="playlist">
                                    @foreach($contents as $content)
                                    @if($loop->index == 0)
                                    <li class="activev">
                                        <a href="{{Storage::url($content->file)}}">
                                            @if ($content->image)
                                            <img src="{{Storage::url($content->image)}}" alt="img" height="50px">
                                            @else
                                            <img src="#" alt="img" height="50px">
                                            @endif
                                            {{$content->title}}
                                        </a>
                                    </li>
                                    @else
                                    <li>
                                        <a href="{{Storage::url($content->file)}}">
                                            @if ($content->image)
                                            <img src="{{Storage::url($content->image)}}" alt="img" height="50px">
                                            @else
                                            <img src="#" alt="img" height="50px">
                                            @endif
                                            {{$content->title}}
                                        </a>
                                    </li>
                                    @endif
                                    @endforeach
                                </ul>
                                <!-- end single sidebar -->
                            </aside>
                            <!-- / end sidebar -->

                        </div>

                    </div>
                </div>
            </div>
        </div>
</section>

<script>
    init();

    function init() {
        var videoplaylist = document.getElementById('videoplaylist');
        var playlist = document.getElementById('playlist');
        var tracks = playlist.getElementsByTagName('a');
        videoplaylist.volume = 0.70;
        videoplaylist.play();

        for (var track in tracks) {
            var link = tracks[track];
            if (typeof link === "function" || typeof link === "number") continue;

            link.addEventListener('click', function(e) {
                e.preventDefault();
                var song = this.getAttribute('href');
                run(song, videoplaylist, this);
            });
        }

        videoplaylist.addEventListener('ended', function(e) {
            for (var track in tracks) {
                var link = tracks[track];
                var nextTrack = parseInt(track) + 1;
                if (typeof link === "function" || typeof link === "number") continue;
                if (!this.src) this.src = tracks[0];
                if (track == (tracks.length - 1)) nextTrack = 0;
                console.log(nextTrack);
                if (link.getAttribute('href') === this.src) {
                    var nextLink = tracks[nextTrack];
                    run(nextLink.getAttribute('href'), videoplaylist, nextLink);
                    break;
                }
            }
        });
    }

    function run(song, videoplaylist, link) {
        var parent = link.parentElement;

        //quitar el active de todos los elementos de la lista
        var items = parent.parentElement.getElementsByTagName('li');
        for (var item in items) {
            if (items[item].classList)
                items[item].classList.remove("activev");
        }

        //agregar active a este elemento
        parent.classList.add("activev");

        //tocar la cancion
        videoplaylist.src = song;
        videoplaylist.load();
        videoplaylist.play();
    }
</script>

@endsection