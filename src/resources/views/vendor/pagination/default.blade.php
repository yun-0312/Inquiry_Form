@if ($paginator->hasPages())
<ul class="pagination">
    {{-- Previous Page Link --}}
    @if ($paginator->onFirstPage())
    <li class="pagination__item disabled"><span>&lt;</span></li>
    @else
    <li class="pagination__item">
        <a href="{{ $paginator->previousPageUrl() }}" rel="prev">&lt;</a>
    </li>
    @endif

    {{-- Pagination Elements --}}
    @foreach ($elements as $element)
    {{-- "Three Dots" Separator --}}
    @if (is_string($element))
    <li class="pagination__item disabled"><span>{{ $element }}</span></li>
    @endif

    {{-- Array Of Links --}}
    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <li class="pagination__item active"><span>{{ $page }}</span></li>
    @else
    <li class="pagination__item"><a href="{{ $url }}">{{ $page }}</a></li>
    @endif
    @endforeach
    @endif
    @endforeach

    {{-- Next Page Link --}}
    @if ($paginator->hasMorePages())
    <li class="pagination__item">
        <a href="{{ $paginator->nextPageUrl() }}" rel="next">&gt;</a>
    </li>
    @else
    <li class="pagination__item disabled"><span>&gt;</span></li>
    @endif
</ul>
@endif