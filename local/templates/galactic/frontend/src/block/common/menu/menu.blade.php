<ul class="{{ $block->elem('list') }}">

    @php
    $isUlOpen = false;
    $previousLevel = 0;
    @endphp

    @foreach($arResult as $arItem)

        @if ($arItem['DEPTH_LEVEL'] == 1)
            
            @if ($isUlOpen)
                </ul></li>

                @php
                $isUlOpen = false
                @endphp

            @elseif ($previousLevel == 1)
                </li>

            @endif

            <li 
            class="{{ $block->elem('item')->mod(['active' => $arItem['SELECTED']]) }}"
            >
                <a class="{{ $block->elem('link') }}" href="{{ $arItem['LINK'] }}">
                    {{ $arItem['TEXT'] }}
                </a>
                
                @if ($arItem['IS_PARENT'])
                    <ul class="{{ $block->elem('sub-list') }}">

                    @php
                    $isUlOpen = true
                    @endphp

                @endif

        @else
            <li class="{{ $block->elem('sub-item')->mod(['active' => $arItem['SELECTED']]) }}">
                <a class="{{ $block->elem('sub-link') }}" href="{{ $arItem['LINK'] }}">
                    {{ $arItem["TEXT"] }}
                </a>
            </li>
        @endif

        @php
        $previousLevel = $arItem["DEPTH_LEVEL"]
        @endphp

    @endforeach

    @if ($isUlOpen)
        </ul></li>
    @else
        </li>
    @endif

</ul>