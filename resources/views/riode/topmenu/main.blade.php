<ul class="menu justify-content-center">
    @foreach ($categories as $category)
        @if($category->parent_id == 0)
            @include('riode.topmenu._menu', $category)
        @endif
    @endforeach
</ul>

