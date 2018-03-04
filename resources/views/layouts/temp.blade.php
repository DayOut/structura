<div class="section no-pad-bot" id="index-banner">
    <div class="container">
        <br><br>
        <h1 class="header center orange-text">Starter Template</h1>
        <div class="row center">
            <h5 class="header col s12 light">A modern responsive front-end framework based on Material Design</h5>
        </div>
        <div class="row center">
            <a href="http://materializecss.com/getting-started.html" id="download-button" class="btn-large waves-effect waves-light orange">Get Started</a>
        </div>
        <br><br>

    </div>
</div>


<div class="container">
    <div class="section">

        <!--   Icon Section   -->
        <div class="row">
            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center light-blue-text"><i class="material-icons">flash_on</i></h2>
                    <h5 class="center">Speeds up development</h5>

                    <p class="light">We did most of the heavy lifting for you to provide a default stylings that incorporate our custom components. Additionally, we refined animations and transitions to provide a smoother experience for developers.</p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center light-blue-text"><i class="material-icons">group</i></h2>
                    <h5 class="center">User Experience Focused</h5>

                    <p class="light">By utilizing elements and principles of Material Design, we were able to create a framework that incorporates components and animations that provide more feedback to users. Additionally, a single underlying responsive system across all platforms allow for a more unified user experience.</p>
                </div>
            </div>

            <div class="col s12 m4">
                <div class="icon-block">
                    <h2 class="center light-blue-text"><i class="material-icons">settings</i></h2>
                    <h5 class="center">Easy to work with</h5>

                    <p class="light">We have provided detailed documentation as well as specific code examples to help new users get started. We are also always open to feedback and can answer any questions a user may have about Materialize.</p>
                </div>
            </div>
        </div>

    </div>
    <br><br>
</div>


/-----------------------------------------------------------------------------------------------------------------------
{!! nl2br($post->post_content) !!}

//from albums
<div class="card hoverable">
    <div class="card-content white-text">
        <span class="card-title">{!! $album->title  !!} </span>
    {!! $album->note !!}

    <!-- <a class="btn-floating halfway-fab waves-effect waves-light green"><i class="material-icons">edit</i></a>
                            <a class="btn-floating halfway-fab waves-effect waves-light green"><i class="material-icons">edit</i></a>-->
    </div>
    <div class="card-action">

        <div class="row">
            <div class="col s6 m3">
                <a class="waves-effect waves-teal btn-flat" href="{{ url('post/'.$album->album_id) }}">Далее...</a>
            </div>
            @auth
                <div class="col s6 m4">
                    <a class="waves-effect waves-teal btn orange" href="{{ url('create/'.$album->album_id) }}">Редактировать</a>
                </div>
                <div class="col s6 m3">

                    <form action="{{ url('delete-post/'.$album->album_id) }}" method="POST">
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

/-----------------------------------------------------------------------------------------------------------------------
<div class="form-group row">
    <label for="email" class="col-sm-4 col-form-label text-md-right">E-Mail Address</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}"
               name="email" value="{{ old('email') }}" required autofocus>

        @if ($errors->has('email'))
            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
        @endif
    </div>
</div>

<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">Password</label>

    <div class="col-md-6">
        <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}"
               name="password" required>

        @if ($errors->has('password'))
            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
        @endif
    </div>
</div>