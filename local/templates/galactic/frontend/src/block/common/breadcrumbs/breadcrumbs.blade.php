<div class="{{ $block }}">
    <span>
        @foreach ($arResult as $index => $arItem)
            @if ($index == 0)
                <a class="{{ $block->elem('root') }}" href="{{ $arItem['LINK'] }}">{{ $arItem['TITLE'] }}</a> 
            @elseif (($index + 1) == count($arResult))
                / <span class="{{ $block->elem('current-element') }}">{{ $arItem['TITLE'] }}</span>
            @else
                / <a class="{{ $block->elem('root') }}" href="{{ $arItem['LINK'] }}">{{ $arItem['TITLE'] }}</a> 
            @endif
        @endforeach
    </span>
</div>