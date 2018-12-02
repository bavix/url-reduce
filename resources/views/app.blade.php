<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}"/>
</head>
<body>

<section id="app" class="hero is-primary is-fullheight">
    <navbar></navbar>
    <div class="hero-body">
        <div class="container">
            <div class="columns is-centered">
                <div class="has-text-centered column is-6">
                    <h1 class="title is-1">URL Shortener</h1>
                    <h2 class="subtitle animated fadeIn">To reduce the reference!</h2>
                    <shorten-form></shorten-form>
                    <shorten-info></shorten-info>
                    <copyright></copyright>
                </div>
                <div class="column is-3">
                    <live></live>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
