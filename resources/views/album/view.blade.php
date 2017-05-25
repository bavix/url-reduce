@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{{ $item->title }}</h4>
                </div>

                <div class="panel-body">
                    @if(!empty($item->image))
                        <p class="text-center">
                            <img class="img-thumbnail" src="/upload/{{ $item->image->preview() }}" style="max-width:100%" />
                        </p>
                    @endif
                    {{ $item->description }}
                    @include("gallery.view")
                </div>
            </div>
        </div>
    </div>
@endsection
