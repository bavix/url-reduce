@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{{ $item->title }}</h4>
                </div>

                <div class="panel-body">

                    {{ $item->description }}

                    <form method="post">

                        @foreach($item->questions as $index => $question)
                            <p>{{ $index + 1 }}. {{ $question->question }}</p>

                            @foreach($question->answers as $answer)
                                <input type="radio" name="questions[{{ $question->id }}]" value="{{ $answer->id }}" /> {{ $answer->answer }} <br />
                            @endforeach
                        @endforeach

                        <button type="submit">Отправить</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
