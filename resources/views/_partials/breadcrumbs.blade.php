@php($route = request()->route()->getName())

@if (isset( $item ))
    {!! Breadcrumbs::render( $route, $item ) !!}
@else
    {!! Breadcrumbs::render( $route ) !!}
@endif
