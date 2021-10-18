<li>
    <a href="{{route('store.category',['url' => $category->slug])}}">{{$category->title}}</a>
    @if ($category->children->count() > 0)
        <ul>
            @foreach($category->children as $category)

                @include('riode.topmenu._menu', $category)

            @endforeach
        </ul>

    @endif
</li>
