@foreach($items as $menu_item)
    <p><a href="{{ $menu_item->link() }}">{{ $menu_item->title }}</a></p>
@endforeach