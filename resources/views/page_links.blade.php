@if ($paginator->hasPages())
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    @else
        <li class="page-nav__item">
            <a href="{{ $paginator->previousPageUrl() }}"
               rel="prev"
               aria-label="@lang('pagination.previous')"
               class="page-nav__item__link">
                <i class="fa fa-angle-double-left"></i>
            </a>
        </li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <li class="page-nav__item" aria-disabled="true"><a class="page-nav__item__link">{{ $element }}</a></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="page-nav__item page-nav__item__link--active" aria-current="page">
                        <a class="page-nav__item__link" style="color: #d28324;">{{ $page }}</a>
                    </li>
                @else
                    <li class="page-nav__item">
                        <a class="page-nav__item__link" href="{{ $url }}" class="page-nav__item__link">{{ $page }}</a>
                    </li>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
        <li class="page-nav__item">
            <a href="{{ $paginator->nextPageUrl() }}" class="page-nav__item__link" rel="next"
               aria-label="@lang('pagination.next')">
                <i class="fa fa-angle-double-right"></i>
            </a>
        </li>
    @else

    @endif
@endif
