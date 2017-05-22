@extends('layouts.app')

@section('content')

    <div class="row">

        <div class="col-md-12">

            @foreach($items as $item)

                <div class="card">

                    @if(!empty($item->image))
                        <div class="card-img-top" style="height: 400px; background: url('{{ $item->image->url() }}') center no-repeat"></div>
                    @endif

                    <div class="card-block">
                        <h4 class="card-title">{{ $item->title }}</h4>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $item->category->title }}</h6>
                        <p class="card-text">{{ $item->description }}</p>
                        <a href="/new/{{ $item->id  }}-{{ $item->friendly() }}.html" class="card-link">Читать »</a>
                    </div>

                </div>

            @endforeach

        </div>

        {{ $items->links() }}

    </div>

@endsection
