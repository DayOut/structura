@extends('layouts.app')

@section('content')

    <div class="row">



                <div class="col s12 m12">
                    <div class="card hoverable">
                        <div class="card-content white-text">
                            <span class="card-title">{!! $post->post_title  !!} </span>
                            <p>
                                {!! $post->post_content !!}
                            </p>
                        </div>
                        <div class="card-action">

                            <div class="row">
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

    </div>


@endsection
