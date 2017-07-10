@foreach($css as $c)
    <link rel="stylesheet" href="{{ asset2("$c") }}">
@endforeach