@if ($paginator->hasPages())
    {{-- Previous Page Link --}}
    <!-- 1ページ目のページャー表示処理（<<） -->
    @if ($paginator->onFirstPage())
        <li aria-disabled="true" aria-label="@lang('pagination.previous')">
            <span aria-hidden="true">«</span>
        </li>
    @else
        <li class="page-item">
            <a href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">
                <span aria-hidden="true">«</span>
            </a>
        </li>
    @endif

    {{-- Pagination Elements --}}
    <!-- ページャー表示処理 -->
    <?php
        $for_loop = 0;
        $element_count = 0;
        $count = 0;
        $arrDots = array();
        $arrEscape = array();
        //3点リーダーの数をカウントする。（2つ以上なら中間にカレントページが存在するはず）
        foreach($elements as $element){
            if(is_string($element)){
                $count++ ;
                $element_count++ ;
                $arrDots[] = $count;
                continue;
            }
            foreach($element as $el){
                $count++ ;
            }
        }
        foreach($arrDots as $dots){
            $arrEscape[] = $dots -1;
            $arrEscape[] = $dots +1;
        }
    ?>
    @foreach ($elements as $element)
        {{-- "Three Dots" Separator --}}
        @if (is_string($element))
            <?php 
            $for_loop++; 
            ?>
            <li class="page-item disabled" aria-disabled="true"><span class="page-link">{{ $element }}</span></li>
        @endif
        {{-- Array Of Links --}}
        @if (is_array($element))
            @foreach ($element as $page => $url)
                <?php 
                $for_loop++; 
                $output = true;
                if(in_array($for_loop,$arrEscape)){
                    $output = false;
                }
                ?>
                @if ($output)
                    @if ($page == $paginator->currentPage())
                        <li class="active"><a>{{ $page }}</a></li>
                    @else
                        <li><a class="page-link" href="{{ $url }}">{{ $page }}</a></li>
                    @endif
                @endif
            @endforeach
        @endif
    @endforeach

    {{-- Next Page Link --}}
    <!-- 最終ページのページャー表示処理（>>） -->
    @if ($paginator->hasMorePages())
        <li class="page-item">
            <a class="page-link" href="{{ $paginator->nextPageUrl() }}" rel="next" aria-label="@lang('pagination.next')">
                <span aria-hidden="true">»</span>
            </a>
        </li>
    @else
        <li aria-disabled="true" aria-label="@lang('pagination.next')">
            <span aria-hidden="true">»</span>
        </li>
    @endif
@endif
