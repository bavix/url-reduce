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

                    @foreach($item->questions as $index => $question)

                        <div class="form-group">

                            <div class="form-check">
                                <label>{{ $index + 1 }}. {{ $question->question }}</label>
                            </div>

                            @foreach($question->answers as $i => $answer)

                                <div class="form-check col-lg-12">
                                    <label class="form-check-label">
                                        {{$i + 1}}. {{ $answer->answer }}
                                    </label>

                                    @php($progress = round($answer->count / ( $question->count ?:1) * 100, 2))
                                    @php($bg = (isset($result[$question->id]) && (int)$result[$question->id] === $answer->id) ? 'bg-success' : 'bg-info')

                                    <div class="progress">
                                        <div
                                            class="progress-bar {{ $bg }}"
                                            role="progressbar"
                                            style="width: {{ $progress }}%;"
                                            aria-valuenow="{{ $progress }}"
                                            aria-valuemin="0"
                                            aria-valuemax="100">
                                        </div>
                                        <span style="position: absolute; left: 0; right: 0;">
                                            @if($question->count && $answer->count)
                                                Проголосовало {{ $answer->count }} из {{ $question->count }} ({{ $progress }}%)
                                            @else
                                                {{ $progress }}%
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
@endsection
