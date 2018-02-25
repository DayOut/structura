@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col s12 m12">
            <div class="card">
                <div class="card-content white-text">
                    <span class="card-title"><h3> Текущие задачи:</h3></span>
                </div>
            </div>
        </div>
        @if (count($posts) > 0)
            @foreach ($posts as $post)
                <div class="col s12 m12">
                    <div class="card hoverable">
                        <div class="card-content white-text">
                            <span class="card-title">{{ $post->post_title }}</span>
                            <p>{{$post->getDescription()}}</p>
                            @auth
                            <a class="btn-floating halfway-fab waves-effect waves-light orange" href="{{url('create', $post->post_id)}}"><i class="material-icons">edit</i></a>
                            @endauth
                           <!-- <a class="btn-floating halfway-fab waves-effect waves-light green"><i class="material-icons">edit</i></a>
                            <a class="btn-floating halfway-fab waves-effect waves-light green"><i class="material-icons">edit</i></a>-->
                        </div>
                        <div class="card-action">
                            <a href="{{ url('post/'.$post->post_id) }}">Открыть полностью</a>
                            @auth
                            <form action="{{ url('delete-post/'.$post->id) }}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE') }}
                                <a href="#">Удалить</a>
                            </form>
                             @endauth
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
