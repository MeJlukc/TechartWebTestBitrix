<ul class="{{ $block }}">

    @if ($navPageNum > 1)
        <li class="{{ $block->elem('item')->mod(['before' => $navPageNum > 1]) }}">
            <a
            class="{{ $block->elem('link-button')->mod(['before' => $navPageNum > 1]) }}" 
            href="{{ $basePath }}page-{{ $navPageNum - 1 }}/{{ $queryString }}"
            >
                <span class="{{ $block->elem('arrow')->mod(['before' => $navPageNum > 1]) }}"></span>
            </a>
        </li>
    @endif

    @for ($i = $startPageValue; $i <= $endPageValue; $i++)
        <li class="{{ $block->elem('item')->mod(['active' => $i == $navPageNum]) }}">
            <a 
            class="{{ $block->elem('link-button') }}"
            href="{{ $basePath }}page-{{ $i }}/{{ $queryString }}">
                {{ $i }}
            </a>
        </li>
    @endfor

    @if ($navPageNum < $navPageCount)
        <li class="{{ $block->elem('item')->mod(['next' => $navPageNum < $navPageCount]) }}">
            <a
            class="{{ $block->elem('link-button')->mod(['next' => $navPageNum < $navPageCount]) }}" 
            href="{{ $basePath }}page-{{ $navPageNum + 1 }}/{{ $queryString }}"
            >
                <span class="{{ $block->elem('arrow')->mod(['next' => $navPageNum < $navPageCount]) }}"></span>
            </a>
        </li>
    @endif

</ul>
