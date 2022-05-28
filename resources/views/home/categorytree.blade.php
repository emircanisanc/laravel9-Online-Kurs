<ul class="sub-menu">
@foreach($children as $subcategory)
    @if(count($subcategory->children))
    <li class="menu-parent"><a href="{{route('categorycourses', ['id'=>$subcategory->id, 'slug'=>$subcategory->title])}}">{{$subcategory->title}}</a>
     @include('home.categorytree', ['children' => $subcategory->children])
    </li>
    @else
    <li><a href="{{route('categorycourses', ['id'=>$subcategory->id, 'slug'=>$subcategory->title])}}">{{$subcategory->title}}</a></li>
    @endif

@endforeach
</ul>