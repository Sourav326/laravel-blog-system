
@if ($paginator->hasPages())
    <div class="py-6">
        @if ($paginator->onFirstPage())
            <span class="py-3 px-4 bg-lime-200" disabled aria-hidden="true">&laquo;</span>
        @else
            <a class="py-3 px-4 bg-lime-200" href="{{ $paginator->previousPageUrl() }}" rel="prev" aria-label="@lang('pagination.previous')">&laquo;</a>
        @endif
        @foreach ($elements as $element)
            {{-- "Three Dots" Separator --}}
            @if (is_string($element))
                <span class="">{{ $element }}</span>
            @endif

            {{-- Array Of Links --}}
            @if (is_array($element))
                @foreach ($element as $page => $url)
                    @if ($page == $paginator->currentPage())
                        <span class="bg-lime-400 text-green py-3 px-4 bg-lime-200">{{ $page }}</span>
                    @else
                        <a class="py-3 px-4 bg-lime-200" href="{{ $url }}" rel="prev">{{ $page }}</a>
                    @endif
                @endforeach
            @endif
        @endforeach

        @if ($paginator->hasMorePages())
            <a href="{{ $paginator->nextPageUrl() }}" class="py-3 px-4 bg-lime-200" rel="next" aria-label="@lang('pagination.next')">&raquo;</a>
        @else
            <span class="py-3 px-4 bg-lime-200" disabled aria-hidden="true">&raquo;</span>
        @endif
    </div>
@endif