<div class="col-md-12">
    <ul class="lightGallery list-unstyled row">
        @foreach($item->gallery as $_picture)
            <li style="padding-right: 1px; padding-left: 0; padding-bottom: 1px" class="col-xs-6 col-sm-4 col-md-3" data-src="/upload/{{ $_picture->src }}">
                <a href="">
                    <div class="img-responsive" style="width: 100%; height: 150px; background: #3d6277 url(/upload/{{$_picture->src}}) center no-repeat" ></div>
                </a>
            </li>
        @endforeach
    </ul>
</div>
