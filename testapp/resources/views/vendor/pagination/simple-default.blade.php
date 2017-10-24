<!-- 複数のページがあるかどうか -->
@if ($paginator->hasPages())
    <ul class="pagination">
        {{-- Previous Page Link --}}
        <!-- 最初のページを表示しているかどうか -->
        @if ($paginator->onFirstPage())
            <li class="disabled"><span>@lang('pagination.previous')</span></li>
        @else
            <!-- 現在のページより先にページがあればtrueなければfalse -->
            <li><a href="{{ $paginator->previousPageUrl() }}" rel="prev">@lang('pagination.previous')</a></li>
        @endif

        {{-- Next Page Link --}}
        <!--  -->
        @if ($paginator->hasMorePages())
            <!--  -->
            <li><a href="{{ $paginator->nextPageUrl() }}" rel="next">@lang('pagination.next')</a></li>
        @else
            <li class="disabled"><span>@lang('pagination.next')</span></li>
        @endif
    </ul>
@endif
