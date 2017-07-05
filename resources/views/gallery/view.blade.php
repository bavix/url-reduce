<div class="col-md-12">
    <ul class="lightGallery list-unstyled row">
        @foreach($item->gallery as $_picture)
            <li style="padding-right: 1px; padding-left: 0; padding-bottom: 1px" class="col-xs-4 col-sm-3 col-md-2" data-src="/upload/{{ $_picture->fullHD() }}">
                <a href="#">
                    <img class="img-responsive" src="/upload/{{ $_picture->thumbs() }}"
                        style="object-position: center; object-fit: none"
                        width="100%" height="110px" />
                </a>
            </li>
        @endforeach
    </ul>
</div>
