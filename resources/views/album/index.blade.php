@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-md-12">

            @foreach($items as $item)

                <div class="card">

                    @if($item->image_id)
                        <div class="card-img-top" style="height: 411px; background: url(/upload/{{ $item->image->preview() }}) center no-repeat"></div>
                    @endif

                    <div class="card-block">
                        <a href="{{ $item->url() }}" title="{{ $item->title }}">
                            <h4 class="card-title">{{ $item->title }}</h4>
                        </a>

                        <p class="card-text">{{ $item->description }}</p>
                        <a href="{{ $item->url() }}" class="card-link">Подробнее »</a>
                    </div>

                </div>

            @endforeach

        </div>

        <div class="col-md-12">
            {{ $items->links('pagination::bootstrap-4') }}
        </div>

    </div>

@endsection