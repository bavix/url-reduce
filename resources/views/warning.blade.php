@extends('layout')

@section('title')
    <title>{{ $link->getTitle() ?: $link->hash }} — {{ config('app.name') }}</title>
@endsection

@section('seo')
    @include('noindex')
    <meta property="og:title" content="{{ $link->getTitle() ?: $link->hash }}"/>
    <meta property="og:description" content="{{ $link->getDescription() }}"/>
    <meta property="og:url" content="{{ route('direct', [$link->hash]) }}"/>
    <meta property="og:type" content="website"/>
    <meta property="og:image" content="{{ route('qr', [$link->hash]) }}"/>

    <meta name="twitter:image:src" content="{{ route('qr', [$link->hash]) }}"/>
    <meta name="twitter:site" content="{{ __('blocks.title') }}"/>
    <meta name="twitter:title" content="{{ $link->getTitle() ?: $link->hash }}"/>
    <meta name="twitter:description" content="{{ $link->getDescription() }}"/>
    <meta name="twitter:domain" content="{{ request()->getHost() }}"/>

    <meta name="description" content="{{ $link->getDescription() }}"/>
    <meta name="keywords" content="{{ \implode(',', $link->getTags()) }}"/>
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
                            <img alt="{{ $link->getTitle() }}" src="{{ $link->getIcon() }}" />
                        </figure>

                        <h3>{{ $link->getTitle() ?: __('shorten.warning.empty_title') }}</h3>
                        <p>{{ $link->getDescription() ?: __('shorten.warning.empty_description') }}</p>

                        <div class="tags">
                            @forelse($link->getTags() as $tag)
                                <span class="tag">{{ $tag }}</span>
                            @empty
                                <p>{{ __('shorten.warning.empty_tags') }}</p>
                            @endforelse
                        </div>

                        <a href="{{ $link->url }}" rel="nofollow noreferrer"
                           title="{{ $link->getTitle() }}"
                           class="button is-danger">{{ __('shorten.follow_the_link') }}</a>
                        <a href="/" class="button">{{ __('shorten.cancel') }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('footer')
@endsection
