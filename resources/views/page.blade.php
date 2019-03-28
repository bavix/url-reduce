@extends('layout')

@section('title')
    <title>{{ $page->title }} — {{ config('app.name') }}</title>
@endsection

@section('seo')
    <meta name="description" content="{{ $page->description }}" />
    <meta name="keywords" content="{{ __('shorten.keywords') }}" />

    <meta property="og:title" content="{{ $page->title }} — {{ config('app.name') }}" />
    <meta property="og:description" content="{{ $page->description }}" />
    <meta property="og:url" content="{{ route('page', [$page->friendly_url]) }}" />
    <meta property="og:type" content="website" />
    <meta name="twitter:site" content="{{ config('app.name') }}" />
    <meta name="twitter:title" content="{{ $page->title }} — {{ config('app.name') }}" />
    <meta name="twitter:description" content="{{ $page->description }}" />
    <meta name="twitter:domain" content="{{ request()->getHttpHost() }}" />
@endsection

@section('content')
    <section class="hero is-medium is-info is-bold">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">{{ $page->title }}</h1>
                <p class="subtitle">{{ $page->description }}</p>
                @include('nav')
            </div>
        </div>
    </section>

    <section class="hero">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div class="column content is-9">{!! $page->content !!}</div>
                </div>
            </div>
        </div>
    </section>

    @include('footer')
@endsection
