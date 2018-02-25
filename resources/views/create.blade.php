@extends('layouts.app')

@section('content')

    <div class="row">
        <div class="col s12 m12">
            <div class="card">
                <form action="{{ url('create-post') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="card-content white-text">
                        <span class="card-title"><h3> Создать пост:</h3></span>

                            <div class="input-field">
                                <input id="post_title" name="post_title" type="text" data-length="255">
                                <label for="post_title">Заголовок</label>
                            </div>


                            <div class="input-field">
                                <textarea id="post_content"  name="post_content" class="materialize-textarea"></textarea>
                                <label for="post_content">Пост</label>
                            </div>

                    </div>

                    <div class="card-action">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Сохранить
                            <i class="material-icons right">save</i>
                        </button>

                    </div>

                </form>
            </div>
        </div>

    </div>


@endsection
