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
                            <img class="img-thumbnail" src="/upload/{{ $item->image->preview() }}" style="max-width:100%" />
                        </p>
                    @endif

                    @if (isset($item->content))
                        {!! $item->content !!}
                    @else
                        <p class="card-text">{{ $item->description }}</p>
                    @endif

                    @include("gallery.view")

                </div>

            </div>
        </div>
    </article>
@endsection
