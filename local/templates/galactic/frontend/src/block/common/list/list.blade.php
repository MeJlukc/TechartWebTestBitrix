<div class="{{ $block }}">
    @if (!empty($arResult['ITEMS']))
        @foreach ($arResult['ITEMS'] as $arItem)

            @php
            echo \TAO::frontend()->renderBlock(
                'common/card',
                [
                    'date' => $arItem['ACTIVE_FROM'],
                    'title' => $arItem['NAME'],
                    'text' => $arItem['PREVIEW_TEXT'],
                    'link' => $arItem['ID']
                ]
            )
            @endphp

        @endforeach
    @else
        <div>empty</div>
    @endif
</div>