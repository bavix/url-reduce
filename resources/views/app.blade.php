@extends('layout')

@section('title')
    <title>{{ config('app.name') }} — {{ __('shorten.describe') }}</title>
@endsection

@section('seo')
    <meta name="description" content="{{ __('shorten.description') }}" />
    <meta name="keywords" content="{{ __('shorten.keywords') }}" />

    <meta property="og:title" content="{{ config('app.name') }} — {{ __('shorten.describe') }}" />
    <meta property="og:description" content="{{ __('shorten.description') }}" />
    <meta property="og:url" content="{{ request()->getSchemeAndHttpHost() }}" />
    <meta property="og:type" content="website" />
    <meta name="twitter:site" content="{{ config('app.name') }}" />
    <meta name="twitter:title" content="{{ config('app.name') }} — {{ __('shorten.describe') }}" />
    <meta name="twitter:description" content="{{ __('shorten.description') }}" />
    <meta name="twitter:domain" content="{{ request()->getHttpHost() }}" />
@endsection

@section('content')
    <section id="app" class="hero is-primary is-fullheight">
        <navbar></navbar>
        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div class="has-text-centered column is-6">
                        <h1 class="title is-1">{{ config('app.name') }}</h1>
                        <h2 class="subtitle animated fadeIn">{{ __('shorten.describe') }}</h2>
                        <shorten-form></shorten-form>
                        <shorten-info></shorten-info>
                        <copyright></copyright>
                    </div>
                    <div class="column is-3">
                        <live :count="{{ $count }}"></live>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="{{ asset('js/app.bundle.js') }}"></script>
@endsection
