@extends('layouts.app')

@section('content')

    <div class="row">

        @if (count($albums) > 0)
            <!--<div class="col s12 m12">
                <div class="row">
                    <div class="col s12 m12">
                        <div class="card hoverable">
                            <div class="card-content white-text">
                                <div id="vk_post_-159365154_99"></div><script type="text/javascript">
                                    (function(d, s, id) { var js, fjs = d.getElementsByTagName(s)[0]; if (d.getElementById(id)) return; js = d.createElement(s); js.id = id; js.src = "//vk.com/js/api/openapi.js?152"; fjs.parentNode.insertBefore(js, fjs); }(document, 'script', 'vk_openapi_js'));
                                    (function() {
                                        if (!window.VK || !VK.Widgets || !VK.Widgets.Post || !VK.Widgets.Post("vk_post_-159365154_99", -159365154, 99, 'icivgdb4cyl-610GsZ2Q6WjLb-8')) setTimeout(arguments.callee, 50);
                                    }());
                                </script>
                            </div>
                        </div>
                    </div>
                </div>
            </div>-->
            @foreach ($albums as $album)
                <div class="col s6 m4">
                    <div class="card hoverable white-text">
                        <div class="card-image waves-effect waves-block waves-light">
                            <a href="{{url('album/' . $album->album_id)}}"> <img class="activator" src="{{$album->cover}}"></a>
                        </div>
                        <div class="card-content">
                            <span class="card-title activator "><a href="{{url('album/' . $album->album_id)}}"> {{$album->title}}</a><i class="material-icons right">more_vert</i></span>
                            <p></p>
                        </div>
                        <div class="card-reveal grey-text text-darken-4">
                            <span class="card-title ">{{$album->title}}<i class="material-icons right">close</i></span>
                            <p>{{$album->note}}</p>
                        </div>
                    </div>

                </div>
            @endforeach

        @else



            <div class="col s12 m3">
                <div class="row">
                    <div class="col s12 m12">
                        <div class="card blue-grey darken-1">
                            <div class="card-content white-text">
                                <span class="card-title">Список пуст!</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        @endif
    </div>


@endsection
