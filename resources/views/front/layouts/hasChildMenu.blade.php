<li class="has-children">
<a href="#about-section" class="nav-link">{{$menu->menu_name}}</a>
<ul class="dropdown arrow-top">
    @foreach($menu->childs as $child)
    @if(count($child->childs))
        @include('front.layouts.hasChildMenu', ['menu'=> $child])
    @else
        <li><a href="#" class="nav-link">{{$child->menu_name}}</a></li>
    @endif
    @endforeach
    
</ul>
</li>