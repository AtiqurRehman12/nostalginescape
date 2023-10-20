<nav aria-label="pagination" class="pagination">
    @if ($paginator->onFirstPage())
        <span class="pagination-btn disabled" aria-label="previous page">
            <ion-icon name="arrow-back" aria-hidden="true"></ion-icon>
        </span>
    @else
        <a href="{{ $paginator->previousPageUrl() }}" class="pagination-btn" aria-label="previous page">
            <ion-icon name="arrow-back" aria-hidden="true"></ion-icon>
        </a>
    @endif

    @php
    $page = $paginator->currentPage();
    @endphp

    @for ($i = 1; $i <= $paginator->lastPage(); $i++)
        @if ($i == $page)
            <span class="pagination-btn current">{{ $i }}</span>
        @else
            <a href="{{ $paginator->url($i) }}" class="pagination-btn">{{ $i }}</a>
        @endif
    @endfor

    @if ($paginator->hasMorePages())
        <a href="{{ $paginator->nextPageUrl() }}" class="pagination-btn" aria-label="next page">
            <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
        </a>
    @else
        <span class="pagination-btn disabled" aria-label="next page">
            <ion-icon name="arrow-forward" aria-hidden="true"></ion-icon>
        </span>
    @endif
</nav>
