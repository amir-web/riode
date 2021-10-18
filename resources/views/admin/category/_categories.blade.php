@foreach($admin_categories as $categoryItem)
    <option value="{{$categoryItem->id ?? ''}}"
            @isset($admin_category->id)
            @if($admin_category->parent_id == $categoryItem->id)
            selected=""
            @endif
            @if($admin_category->id == $categoryItem->id)
            disabled=""
        @endif
        @endisset
    >
        {{$delimiter ?? ''}}{{$categoryItem->title ?? ''}}
    </option>
    @isset($categoryItem->children)
        @include('admin.category._categories', [
            'admin_categories' => $categoryItem->children,
            'delimiter' => ' - ' . $delimiter,
        ])
    @endisset
@endforeach
