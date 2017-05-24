<div class="form-group {!! !$errors->has($errorKey) ?: 'has-error' !!}">

    <label for="{{$id}}" class="col-sm-2 control-label">{{$label}}</label>

    <div class="col-sm-8">

        @include('admin::form.error')

        <ul id="{{ $id }}" class="lightGallery list-unstyled row">
            @foreach($_pictures as $_picture)
                <li style="padding-right: 1px; padding-left: 0; padding-bottom: 1px" class="col-xs-6 col-sm-4 col-md-3" data-src="/upload/{{ $_picture->src }}">
                    <a href="">
                        <div class="img-responsive" style="width: 100%; height: 150px; background: #9c3328 url(/upload/{{$_picture->src}}) center no-repeat" ></div>
                    </a>
                </li>
            @endforeach
        </ul>

        @include('admin::form.help-block')

    </div>
</div>