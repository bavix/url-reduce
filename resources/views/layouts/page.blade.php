<!DOCTYPE html>
<html lang="en" prefix="og: http://ogp.me/ns#">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ $item->title }}</title>

    <!-- Styles -->
    <link href="{{ asset2('https://cdn.bavix.ru/bootstrap/next/dist/css/bootstrap.min.css')  }}" rel="stylesheet"/>
    <link href="{{ asset2('css/blog.css')  }}" rel="stylesheet"/>

    <link rel="apple-touch-icon" sizes="57x57" href="/favicons/apple-icon-57x57.png"/>
    <link rel="apple-touch-icon" sizes="60x60" href="/favicons/apple-icon-60x60.png"/>
    <link rel="apple-touch-icon" sizes="72x72" href="/favicons/apple-icon-72x72.png"/>
    <link rel="apple-touch-icon" sizes="76x76" href="/favicons/apple-icon-76x76.png"/>
    <link rel="apple-touch-icon" sizes="114x114" href="/favicons/apple-icon-114x114.png"/>
    <link rel="apple-touch-icon" sizes="120x120" href="/favicons/apple-icon-120x120.png"/>
    <link rel="apple-touch-icon" sizes="144x144" href="/favicons/apple-icon-144x144.png"/>
    <link rel="apple-touch-icon" sizes="152x152" href="/favicons/apple-icon-152x152.png"/>
    <link rel="apple-touch-icon" sizes="180x180" href="/favicons/apple-icon-180x180.png"/>
    <link rel="icon" type="image/png" sizes="192x192" href="/favicons/android-icon-192x192.png"/>
    <link rel="icon" type="image/png" sizes="32x32" href="/favicons/favicon-32x32.png"/>
    <link rel="icon" type="image/png" sizes="96x96" href="/favicons/favicon-96x96.png"/>
    <link rel="icon" type="image/png" sizes="16x16" href="/favicons/favicon-16x16.png"/>
    <link rel="manifest" href="/favicons/manifest.json">

    <meta name="msapplication-TileColor" content="#ffffff"/>
    <meta name="msapplication-TileImage" content="/favicons/ms-icon-144x144.png"/>
    <meta name="theme-color" content="#ffffff"/>

    <meta property="og:title" content="{{ $item->title }}"/>
    <meta property="og:description" content="{{ $item->description }}"/>
    <meta property="og:url" content="{{ request()->url() }}"/>
    <meta property="og:type" content="website"/>

    <meta name="twitter:site" content="{{ __('blocks.title') }}"/>
    <meta name="twitter:title" content="{{ $item->title }}"/>
    <meta name="twitter:description" content="{{ $item->description }}"/>
    <meta name="twitter:domain" content="{{ request()->getHost() }}"/>

    <meta name="description" content="{{ $item->description }}"/>
    <meta name="keywords" content="{{ keywords($item->title) }}"/>
</head>

<body>

<div class="blog-masthead">
    <div class="container">
        <nav class="nav">
            <a class="nav-link" href="/">Home</a>
            <a class="nav-link active" href="#">Pages</a>
        </nav>
    </div>
</div>

<div class="container">

    <div class="row">

        <div class="col-sm-8 blog-main">

            <div class="blog-post">
                <h2 class="blog-post-title">{{ $item->title }}</h2>
                <p class="blog-post-meta">updated at: {{ $item->updated_at }}</p>

                {!! $item->content !!}

            </div>

        </div>

        <div class="col-sm-3 offset-sm-1 blog-sidebar">
            {{--<div class="sidebar-module sidebar-module-inset">--}}
                {{--<h4>About</h4>--}}
                {{--<p>Etiam porta <em>sem malesuada magna</em> mollis euismod. Cras mattis consectetur purus sit amet fermentum. Aenean lacinia bibendum nulla sed consectetur.</p>--}}
            {{--</div>--}}

            <div class="sidebar-module">
                <h4>Documentations</h4>
                <ol class="list-unstyled">
                    <li><a href="https://docs.ln4.ru/">API</a></li>
                </ol>
            </div>

            <div class="sidebar-module">
                <h4>Technologies</h4>
                <ol class="list-unstyled">
                    <li><a href="/DigOn">DigitalOcean</a></li>
                </ol>
            </div>

            <div class="sidebar-module">
                <h4>Socials</h4>
                <ol class="list-unstyled">
                    <li><a href="/githb">GitHub</a></li>
                    <li><a href="/twitt">Twitter</a></li>
                    <li><a href="/fbook">Facebook</a></li>
                </ol>
            </div>
        </div><!-- /.blog-sidebar -->

    </div><!-- /.row -->

</div><!-- /.container -->

<footer class="blog-footer">
    <p>copyright &copy; <a href="https://bavix.ru/">bavix</a> by <a href="https://babichev.net/">babichev</a>.</p>
</footer>


<script src="{{ asset2('https://cdn.bavix.ru/jquery/latest/dist/jquery.min.js') }}"></script>
<script src="{{ asset2('https://cdn.bavix.ru/popper.js/latest/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset2('https://cdn.bavix.ru/bootstrap/next/dist/js/bootstrap.min.js') }}"></script>
</body>
</html>
