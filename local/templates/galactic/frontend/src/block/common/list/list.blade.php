    @if (!empty($arResult['ITEMS']))
        <div class="{{ $block }}">
            @foreach ($arResult['CUSTOM_ITEMS'] as $arItem)

                @php
                echo \TAO::frontend()->renderBlock(
                    'common/card',
                    [
                        'date' => $arItem['DATE'],
                        'title' => $arItem['TITLE'],
                        'text' => $arItem['TEXT'],
                        'link' => $arItem['DETAIL_PAGE_LINK']
                    ]
                )
                @endphp

            @endforeach
        </div>
    @else
        <div class="{{ $block->elem('empty') }}">
            <h2 class="{{ $block->elem('empty__title') }}">
                По вашему запросу ничего не найдено
            </h2>
            <p class="{{ $block->elem('empty__text') }}">
                Попробуйте изменить фильтры запроса или вернитесь на главную.
            </p>
            <a
            class="{{ $block->elem('empty__button') }}"
            href="/"
            >
                На главную
            </a>
        </div>
    @endif