<div class="form-group {!! !$errors->has($errorKey) ?: 'has-error' !!}">

    <label for="{{$id}}" class="col-sm-2 control-label">{{$label}}</label>

    <div class="col-sm-8">

        @include('admin::form.error')

        <ul id="{{ $id }}" class="list-unstyled row">
            @foreach($_documents as $_document)
                <li>
                    <!-- edit name & remove from cms -->
                    <a href="/upload/{{ $_document->src }}" download="{{ $_document->title ? : basename($_document->src) }}">
                        {{ $_document->name ? : basename($_document->src) }}
                    </a>
                </li>
            @endforeach
        </ul>

        @include('admin::form.help-block')

    </div>
</div>