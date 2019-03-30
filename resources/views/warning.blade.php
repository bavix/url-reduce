@extends('layout')

@section('title')
    <title>{{ $link->title ?: $link->hash }} — {{ config('app.name') }}</title>
@endsection

@section('seo')
    @include('noindex')
    <meta property="og:title" content="{{ $link->title ?: $link->hash }}"/>
    <meta property="og:description" content="{{ $link->description }}"/>
    <meta property="og:url" content="{{ route('direct', [$link->hash]) }}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:image" content="{{ route('qr', [$link->hash]) }}"/>

    <meta name="twitter:image:src" content="{{ route('qr', [$link->hash]) }}"/>
    <meta name="twitter:site" content="{{ config('app.name') }}"/>
    <meta name="twitter:title" content="{{ $link->title ?: $link->hash }}"/>
    <meta name="twitter:description" content="{{ $link->description }}"/>
    <meta name="twitter:domain" content="{{ request()->getHost() }}"/>

    <meta name="description" content="{{ $link->description }}"/>
    <meta name="keywords" content="{{ \implode(',', $link->tags) }}"/>
@endsection

@section('content')
    <section class="hero is-medium is-warning is-bold">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">{{ config('app.name') }}</h1>
                <p class="subtitle">{{ __('shorten.warning.subtitle') }}</p>
                @include('nav')
            </div>
        </div>
    </section>

    <section class="hero is-medium">
        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                    <div class="column content is-9">
                        <figure class="image is-64x64 is-pulled-right">
                            <img alt="{{ $link->title }}" src="{{ $link->icon }}" />
                        </figure>

                        <h3>{{ $link->title ?: __('shorten.warning.empty_title') }}</h3>
                        <p>{{ $link->description ?: __('shorten.warning.empty_description') }}</p>

                        <div class="tags">
                            @forelse($link->tags as $tag)
                                <span class="tag">{{ $tag }}</span>
                            @empty
                                <p>{{ __('shorten.warning.empty_tags') }}</p>
                            @endforelse
                        </div>

                        <div class="buttons">
                            <a href="{{ $link->url }}" rel="nofollow noreferrer"
                               title="{{ $link->title }}"
                               class="button is-danger">{{ __('shorten.follow_the_link') }}</a>
                            <a href="/" class="button">{{ __('shorten.cancel') }}</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('footer')
@endsection
