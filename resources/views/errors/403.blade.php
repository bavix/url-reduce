@php($title = __('bavix.http.403'))
@if(!empty($exception))
    @php($_title = $exception->getMessage())
    @if (!empty($_title))
        @php($title = $_title)
    @endif
@endif

@include('_partials.error', [
    'title' => $title,
    'description' => 'bavix.ru',
    'toMainPage'=> true
])
