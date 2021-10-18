@if ($paginator->hasPages())
    <nav class="toolbox toolbox-pagination">
        <p class="show-info"></p>
        <ul class="pagination">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item disabled">
                    <a class="page-link page-link-prev" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous" tabindex="-1" aria-disabled="true">
                        <i class="d-icon-arrow-left"></i>Prev
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link page-link-prev" href="{{ $paginator->previousPageUrl() }}" aria-label="Previous" tabindex="-1" aria-disabled="true">
                        <i class="d-icon-arrow-left"></i>Prev
                    </a>
                </li>
            @endif
            {{--<li class="page-item disabled">
                <a class="page-link page-link-prev" href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                    <i class="d-icon-arrow-left"></i>Prev
                </a>
            </li>--}}
            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    {{--<li class="disabled" aria-disabled="true"><span>{{ $element }}</span></li>--}}
                    <li class="page-item active" aria-current="page"><a class="page-link">{{ $element }}</a></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item active" aria-current="page"><a class="page-link">{{ $page }}</a></li>
                            {{--<li class="active" aria-current="page"><span>{{ $page }}</span></li>--}}
                        @else
                            {{--<li><a href="{{ $url }}">{{ $page }}</a></li>--}}
                            <li class="page-item"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach
            {{--<li class="page-item active" aria-current="page"><a class="page-link" href="#">1</a>
            </li>
            <li class="page-item"><a class="page-link" href="#">2</a></li>
            <li class="page-item"><a class="page-link" href="#">3</a></li>
            <li class="page-item page-item-dots"><a class="page-link" href="#">6</a></li>--}}
            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item">
                    <a class="page-link page-link-next" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                        Next<i class="d-icon-arrow-right"></i>
                    </a>
                </li>
            @else
                <li class="page-item">
                    <a class="page-link page-link-next" href="{{ $paginator->nextPageUrl() }}" aria-label="Next">
                        Next<i class="d-icon-arrow-right"></i>
                    </a>
                </li>
            @endif
            {{--<li class="page-item">
                <a class="page-link page-link-next" href="#" aria-label="Next">
                    Next<i class="d-icon-arrow-right"></i>
                </a>
            </li>--}}
        </ul>
    </nav>
@endif
