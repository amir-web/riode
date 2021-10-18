<li>
    <a href="{{route('store.category', ['url' => $category->slug])}}">
        @if(\Illuminate\Support\Facades\App::getLocale() == 'ru')
            {{$category->ru_title}}
        @elseif(\Illuminate\Support\Facades\App::getLocale() == 'en')
            {{$category->en_title}}
        @else
            {{$category->title}}
        @endif
    </a>
    @if ($category->children->count() > 0)
        <ul>
            @foreach($category->children as $category)

                @include('riode.topmenu._catmenu', $category)

            @endforeach
        </ul>

    @endif
</li>
