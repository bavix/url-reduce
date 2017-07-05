<!DOCTYPE html>
<html>
<head>
    <title>{{ $title }}</title>
    <meta charset="utf-8" />

    <link href="{{ asset2('node_modules/bootstrap/dist/css/bootstrap.min.css')  }}" rel="stylesheet"/>

    <style>
        html, body {
            height: 100%;
            width: 100%;
        }

        #be-right-back {
            height: 200px;
            width: 260px;
        }
    </style>
</head>
<body>
<div class="d-flex" style="height: 100%; width: 100%;">
    <div id="be-right-back" class="mx-auto align-self-center">
        <a href="https://bavix.ru/" title="Development and technical support of the website - bavix">
            <img alt="Development and technical support of the website - bavix"
                 title="Development and technical support of the website - bavix"
                 width="100%" height="100%"
                 src="https://ds.bavix.ru/svg/logo.svg" />
        </a>
        @if (isset($description))
            <h4 class="text-center">{{ $description }}</h4>
        @endif
        <h6 class="text-center">{{ $title }}</h6>
    </div>
</div>
</body>
</html>
