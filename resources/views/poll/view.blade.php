@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h4>{{ $item->title }}</h4>
                </div>

                <div class="panel-body">

                    {!! $item->content  !!}

                    <form id="poll" method="post" data-count="{{ $item->questions()->count() }}">

                        {{ csrf_field() }}

                        @foreach($item->questions as $index => $question)

                            <div class="form-group">

                                <div class="form-check">
                                    <label>{{ $index + 1 }}. {{ $question->question }}</label>
                                </div>

                                @foreach($question->answers as $answer)
                                    <div class="form-check col-lg-12">
                                        <label class="form-check-label">
                                            <input
                                                class="form-check-input"
                                                type="radio"
                                                name="questions[{{ $question->id }}]"
                                                value="{{ $answer->id }}"
                                            />
                                            {{ $answer->answer }}
                                        </label>
                                    </div>
                                @endforeach

                            </div>
                        @endforeach

                        <button type="submit" disabled class="btn btn-secondary">Отправить</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
