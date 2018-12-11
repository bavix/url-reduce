@extends('layout')

@section('title')
    <title>{{ $link->getTitle() ?: $link->hash }} — {{ config('app.name') }}</title>
@endsection

@section('seo')
    @include('noindex')
    {{--<meta name="description" content="{{ $link->description }}" />--}}
    {{--<meta name="keywords" content="{{ __('shorten.keywords') }}" />--}}

    {{--<meta property="og:title" content="{{ $link->title }} — {{ config('app.name') }}" />--}}
    {{--<meta property="og:description" content="{{ $link->description }}" />--}}
    {{--<meta property="og:url" content="{{ route('page', [$link->friendly_url]) }}" />--}}
    {{--<meta property="og:type" content="website" />--}}
    {{--<meta name="twitter:site" content="{{ config('app.name') }}" />--}}
    {{--<meta name="twitter:title" content="{{ $link->title }} — {{ config('app.name') }}" />--}}
    {{--<meta name="twitter:description" content="{{ $link->description }}" />--}}
    {{--<meta name="twitter:domain" content="{{ request()->getHttpHost() }}" />--}}

    {{--<meta property="og:title" content="{{ $item->parameters['title'] ?? $item->hash }}"/>--}}
    {{--<meta property="og:description" content="{{ $item->parameters['description'] ?? '' }}"/>--}}
    {{--<meta property="og:url" content="{{ request()->url() }}"/>--}}
    {{--<meta property="og:type" content="website"/>--}}
    {{--<meta property="og:image" content="https://{{ request()->getHost() }}/qr/{{ $item->hash }}"/>--}}

    {{--<meta name="twitter:image:src" content="https://{{ request()->getHost() }}/qr/{{ $item->hash }}"/>--}}
    {{--<meta name="twitter:site" content="{{ __('blocks.title') }}"/>--}}
    {{--<meta name="twitter:title" content="{{ $item->parameters['title'] ?? $item->hash }}"/>--}}
    {{--<meta name="twitter:description" content="{{ $item->parameters['description'] ?? '' }}"/>--}}
    {{--<meta name="twitter:domain" content="{{ request()->getHost() }}"/>--}}

    {{--<meta name="description" content="{{ $item->parameters['description'] ?? '' }}"/>--}}
    {{--<meta name="keywords" content="{{ keywords($item->parameters['title'] ?? 'URL Shortener', $item->parameters['tags'] ?? []) }}"/>--}}
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
