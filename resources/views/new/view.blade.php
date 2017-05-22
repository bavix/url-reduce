@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{{ $item->title }}</h4>
                </div>

                <div class="panel-body">
                    {!! $item->content !!}
                </div>
            </div>
        </div>
    </div>
@endsection
