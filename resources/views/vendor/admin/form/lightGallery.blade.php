<div class="form-group {!! !$errors->has($errorKey) ?: 'has-error' !!}">

    <label for="{{$id}}" class="col-sm-2 control-label">{{$label}}</label>

    <div class="col-sm-8">

        @include('admin::form.error')

        <ul id="{{ $id }}" class="lightGallery list-unstyled row">
            @foreach($_pictures as $_picture)
                <li style="padding-right: 1px; padding-left: 0; padding-bottom: 1px"
                    class="col-xs-6 col-sm-4 col-md-3"
                    data-token="{{ csrf_token() }}"
                    data-url="{{ route('lg.trash', [], false) }}"
                    data-src="/upload/{{ $_picture->src }}"
                    data-model="{{ \get_class($_picture->pivot->parent) }}"
                    data-item="{{ $_picture->pivot->parent->id }}"
                    data-image="{{ $_picture->id }}">

                    <a href="#">
                        <img width="100%" height="100%" class="img-responsive" src="/upload/{{ $_picture->thumbs() }}" />
                    </a>
                </li>
            @endforeach
        </ul>

        @include('admin::form.help-block')

    </div>
</div>
