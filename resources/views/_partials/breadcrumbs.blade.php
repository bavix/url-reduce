@php($route = request()->route()->getName())

@if ($route)
    @if (isset( $item ))
        {!! Breadcrumbs::render( $route, $item ) !!}
    @else
        {!! Breadcrumbs::render( $route ) !!}
    @endif
@endif
