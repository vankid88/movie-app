@if ($paginator->hasPages())
<nav class="blog-pagination justify-content-center d-flex">
    <ul class="pagination">
        {{-- Previous Page Link --}}
        <li class="page-item">
            <a class="page-link" aria-lable="Previous" @if (!$paginator->onFirstPage()) href="{{ $paginator->previousPageUrl() }}" @endif rel="prev">
                <span aria-hidden="true">First</span>
            </a>
        </li>
        {{-- Pagination Elements --}}
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <li class="page-item"><a class="page-link">{{ $element }}</a></li>
            @endif
            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url) 
                    <li class="page-item  @if($page == $paginator->currentPage()) active @endif">
                        <a @if ($page != $paginator->currentPage()) href="{{ $url }}" @endif class="page-link">@if($page < 10)0 @endif {{$page }}</a>
                    </li>
                @endforeach
            @endif
        @endforeach
        {{-- Next Page Link --}}
        <li class="page-item">
            <a class="page-link" aria-lable="Next" @if ($paginator->hasMorePages()) href="{{ $paginator->nextPageUrl() }}" @endif rel="next">
                <span aria-hidden="true">Last</span>
            </a>
        </li>
    </ul>
</nav>
@endif