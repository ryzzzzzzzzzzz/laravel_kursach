@if ($paginator->hasPages())
    <nav class="pagination" aria-label="Навигация по страницам">
        @if ($paginator->onFirstPage())
            <span class="pagination-button pagination-button-disabled">
                « Previous
            </span>
        @else
            <a
                href="{{ $paginator->previousPageUrl() }}"
                class="pagination-button"
            >
                « Previous
            </a>
        @endif

        @foreach ($elements as $element)
            @if (is_string($element))
                <span class="pagination-ellipsis">
                    {{ $element }}
                </span>
            @endif

            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span
                            class="pagination-button pagination-button-current"
                            aria-current="page"
                        >
                            {{ $page }}
                        </span>
                    @else
                        <a
                            href="{{ $url }}"
                            class="pagination-button"
                        >
                            {{ $page }}
                        </a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a
                href="{{ $paginator->nextPageUrl() }}"
                class="pagination-button"
            >
                Next »
            </a>
        @else
            <span class="pagination-button pagination-button-disabled">
                Next »
            </span>
        @endif
    </nav>
@endif