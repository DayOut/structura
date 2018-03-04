@extends('layouts.app')

@section('content')
    <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
    <div class="row">
        <div class="col s12 m12">
            <div class="card">
                <form action="{{ url('create-post') }}" method="POST">
                    {{ csrf_field() }}
                    <div class="card-content white-text">
                        <span class="card-title"><h3> Создать пост:</h3></span>

                            <div class="input-field">
                                <input id="post_title" name="post_title" type="text" data-length="255" value="{{ $post->post_title }}">
                                <label for="post_title">Заголовок</label>
                            </div>


                            <div class="input-field">
                                <!-- TODO Сделать загрузку файлов на сервер через CKFinder. Возможно придется делать CKEditor не через CDN, а нормально установить его в public и там нормально интегрировать -->
                                <textarea name="post_content"> {{ $post->post_content }} </textarea>
                                <script>
                                    CKEDITOR.replace( 'post_content' );
                                </script>
                                <!--<textarea id="post_content"  name="post_content" class="materialize-textarea"></textarea>-->

                            </div>
                        <script>
                            // Replace the <textarea id="editor1"> with a CKEditor
                            // instance, using default configuration.
                            CKEDITOR.replace( 'editor1' );
                        </script>

                    </div>

                    <div class="card-action">
                        <button class="btn waves-effect waves-light" type="submit" name="action">Сохранить
                            <i class="material-icons right">save</i>
                        </button>

                    </div>
                    <input name="id" value = "{{$post->post_id}}" type="text" style="visibility:hidden;">
                </form>
            </div>
        </div>

    </div>


@endsection
