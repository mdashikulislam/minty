@if ($paginator->hasPages())
    <nav>
        <ul class="pagination pagination-rounded mt-3">
            {{-- Previous Page Link --}}
            @if ($paginator->onFirstPage())
                <li class="page-item paginate_button disabled" aria-disabled="true" aria-label="@lang('pagination.previous')">
                    <span class="page-link" aria-hidden="true"><i class="mdi mdi-chevron-left"></i></span>
                </li>
            @else
                <li class="page-item paginate_button">
                    <a class="page-link" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')"><i class="mdi mdi-chevron-left"></i></a>
                </li>
            @endif

            {{-- Pagination Elements --}}
            @foreach ($elements as $element)
                {{-- "Three Dots" Separator --}}
                @if (is_string($element))
                    <li class="page-item paginate_button disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
                @endif

                {{-- Array Of Links --}}
                @if (is_array($element))
                    @foreach ($element as $page => $url)
                        @if ($page == $paginator->currentPage())
                            <li class="page-item paginate_button active" aria-current="page"><span class="page-link">{{ $page }}</span></li>
                        @else
                            <li class="page-item paginate_button"><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                        @endif
                    @endforeach
                @endif
            @endforeach

            {{-- Next Page Link --}}
            @if ($paginator->hasMorePages())
                <li class="page-item paginate_button">
                    <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')"><i class="mdi mdi-chevron-right"></i></a>
                </li>
            @else
                <li class="page-item paginate_button disabled" aria-disabled="true" aria-label="@lang('pagination.next')">
                    <span class="page-link" aria-hidden="true"><i class="mdi mdi-chevron-right"></i></span>
                </li>
            @endif
        </ul>
    </nav>
@endif
