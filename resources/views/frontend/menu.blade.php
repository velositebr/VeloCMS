<ul>
    @foreach($menus as $menu)
        @if($menu->type == "link")
            <li><a target="_blank" href="{{ $menu->link }}">{{ $menu->menu }}</a></li>
        @else
        <li><a href="{{ $menu->slug }}">{{ $menu->menu }}</a></li>
        @endif
    @endforeach

</ul>
