@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-md-12">

            @foreach($items as $item)

                <section class="card">

                    @if(!empty($item->image))
                        <div class="card-img-top" style="height: 411px; background: url(/upload/{{ $item->image }}) center no-repeat"></div>
                    @endif

                    <div class="card-block">
                        <a href="{{ $item->url() }}" title="{{ $item->title }}">
                            <h4 class="card-title">{{ $item->title }}</h4>
                        </a>

                        <a href="{{ $item->url() }}" class="card-link">Подробнее »</a>
                    </div>

                </section>

            @endforeach

        </div>

        <div class="col-md-12">
            {{ $items->links('pagination::bootstrap-4') }}
        </div>

    </div>

@endsection
