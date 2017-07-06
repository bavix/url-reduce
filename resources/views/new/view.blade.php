@extends('layouts.app')

@section('content')
    <article class="row">
        <div class="col-md-12">
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h1>{{ $item->title }}</h1>
                </div>

                <div class="panel-body">

                    @if(!empty($item->image))
                        <p class="text-center">
                            <img src="/upload/{{ $item->image->preview() }}" style="max-width:100%" />
                        </p>
                    @endif

                    @if (isset($item->content))
                        {!! $item->content !!}
                    @else
                        <p class="card-text">{{ $item->description }}</p>
                    @endif

                    @include("gallery.view")

                    <hr class="if-visually" />

                    <span class="if-visually float-right badge badge-default">
                        <small>Просмотров: {{ \App\Models\TrackerModel::visits() }}</small>
                    </span>

                    <span class="if-visually badge badge-primary">
                        @php($carbon = \Laravelrus\LocalizedCarbon\LocalizedCarbon::createFromFormat('Y-m-d H:i:s', $item->updated_at))
                        @php($local = \Laravelrus\LocalizedCarbon\LocalizedCarbon::instance($carbon))
                        <small>Обновлено: {{ $local->diffForHumans() }}</small>
                    </span>
                </div>

            </div>
        </div>
    </article>
@endsection
