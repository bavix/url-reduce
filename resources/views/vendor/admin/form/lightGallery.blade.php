<div class="form-group {!! !$errors->has($errorKey) ?: 'has-error' !!}">

    <label for="{{$id}}" class="col-sm-2 control-label">{{$label}}</label>

    <div class="col-sm-8">

        @include('admin::form.error')

        <ul id="{{ $id }}" class="lightGallery list-unstyled row">
            @foreach($_pictures as $_picture)
                <li style="padding-right: 1px; padding-left: 0; padding-bottom: 1px" class="col-xs-6 col-sm-4 col-md-3" data-src="/upload/{{ $_picture->src }}">
                    <a href="">
                        <img width="100%" height="100%" class="img-responsive" src="/upload/{{ $_picture->thumbs() }}" />
                    </a>
                </li>
            @endforeach
        </ul>

        @include('admin::form.help-block')

    </div>
</div>