<div class="form-group {!! !$errors->has($errorKey) ?: 'has-error' !!}">

    <label for="{{$id}}" class="col-sm-2 control-label">{{$label}}</label>

    <div class="col-sm-8">

        @include('admin::form.error')

        <ul id="{{ $id }}" class="lightGallery list-unstyled row">
            @foreach($_pictures as $_picture)
                <li style="padding-right: 1px; padding-left: 0; padding-bottom: 1px"
                    class="col-xs-4 col-sm-3 col-md-2"
                    data-token="{{ csrf_token() }}"
                    data-url="{{ route('lg.trash', [], false) }}"
                    data-src="/upload/{{ $_picture->src }}"
                    data-model="{{ \get_class($_picture->pivot->parent) }}"
                    data-item="{{ $_picture->pivot->parent->id }}"
                    data-image="{{ $_picture->id }}">

                    <a href="#">
                        <img class="img-responsive" src="/upload/{{ $_picture->thumbs() }}"
                             style="object-position: center; object-fit: none" width="100%" height="100%" />
                    </a>
                </li>
            @endforeach
        </ul>

        @include('admin::form.help-block')

    </div>
</div>
