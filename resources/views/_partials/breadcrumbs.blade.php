@php($route = request()->route())

@if ($route)
    @php($name = $route->getName())
    @if (isset( $item ))
        {!! Breadcrumbs::render( $name, $item ) !!}
    @else
        {!! Breadcrumbs::render( $name ) !!}
    @endif
@endif
