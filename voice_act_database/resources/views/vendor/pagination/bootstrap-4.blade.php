@if ($paginator->hasPages())
    {{-- Previous Page Link --}}
    <!-- 1ページ目のページャー表示処理（<<） -->
    @if ($paginator->onFirstPage())
        <li aria-disabled="true" aria-label="@lang('pagination.previous')">
            <span aria-hidden="true">前へ</span>
        </li>
    @else
        <li class="page-item">
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                <span aria-hidden="true">前へ</span>
            </a>
        </li>
    @endif

    {{-- Pagination Elements --}}
    <!-- ページャー表示処理 -->
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
        @endif

        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                @if ($page == $paginator->currentPage())
                    <li class="active"><a>{{ $page }}</a></li>
                @else
                    <li><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    <!-- 最終ページのページャー表示処理（>>） -->
    @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                <span aria-hidden="true">次へ</span>
            </a>
        </li>
    @else
        <li aria-disabled="true" aria-label="@lang('pagination.next')">
            <span aria-hidden="true">次へ</span>
        </li>
    @endif
@endif
