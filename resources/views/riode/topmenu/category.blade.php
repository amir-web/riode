<ul class="widget-body filter-items search-ul">
    @foreach ($categories as $category)
        @if($category->parent_id == 0)
            @include('riode.topmenu._catmenu', $category)
        @endif
    @endforeach
</ul>
