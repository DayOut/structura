@extends('layouts.app')

@section('content')

    <div class="row">

        @if (count($posts) > 0)
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
            @foreach ($posts as $post)
                <div class="col s12 m12">
                    <div class="card hoverable">
                        <div class="card-content white-text">
                            <span class="card-title">{!! $post->post_title  !!} </span>
                                {!! $post->getDescription() !!}

                           <!-- <a class="btn-floating halfway-fab waves-effect waves-light green"><i class="material-icons">edit</i></a>
                            <a class="btn-floating halfway-fab waves-effect waves-light green"><i class="material-icons">edit</i></a>-->
                        </div>
                        <div class="card-action">

                            <div class="row">
                                <div class="col s6 m3">
                                    <a class="waves-effect waves-teal btn-flat" href="{{ url('post/'.$post->post_id) }}">Далее...</a>
                                </div>
                                @auth
                                <div class="col s6 m4">
                                    <a class="waves-effect waves-teal btn orange" href="{{ url('create/'.$post->post_id) }}">Редактировать</a>
                                </div>
                                <div class="col s6 m3">

                                        <form action="{{ url('delete-post/'.$post->post_id) }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn waves-effect waves-light red darken-1" type="submit" name="action">Удалить
                                                <i class="material-icons right">delete</i>
                                            </button>
                                        </form>

                                </div>
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
                {{ $posts->links() }}
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
