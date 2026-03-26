<div class="{{ $block }}">

    <a
    class="{{ $block->elem('link') }}" href="/">
        <img 
        class="{{ $block->elem('image') }}"
        src="{{ $item['DETAIL_PICTURE']['SRC'] }}" 
        alt="Book's image"
        >
    </a>

    <div class="{{ $block->elem('info-container') }}">

        <a class="{{ $block->elem('title') }}" href="/">{!! $item['NAME'] !!}</a>
        <div class="{{ $block->elem('price-container') }}">{!! $item['ITEM_PRICES'][0]['PRINT_PRICE'] !!}</div>
        <div class="{{ $block->elem('amount-container') }}">
            <button class="{{ $block->elem('amount-changer')->mod('down') }}">-</button>
            <input class="{{ $block->elem('amount') }}" type="number" value="1">
            <button class="{{ $block->elem('amount-changer')->mod('up') }}">+</button>
            <br>
            <span class="{{ $block->elem('amount-measure') }}">шт</span>
        </div>

        <div class="{{ $block->elem('buttons-container') }}">
            <a class="{{ $block->elem('button-to-basket') }}" href="">
                В корзину
            </a>
        </div>

        <div class="{{ $block->elem('tags-container') }}">

            @if(!empty($item['LABEL_ARRAY_VALUE']['AUTHORS']))
                <span class="{{ $block->elem('tag') }}">{{ $item['LABEL_ARRAY_VALUE']['AUTHORS'] }}</span>
            @endif

            @foreach ($item['PROPERTIES'] as $key => $property)

                @if (!empty($property['VALUE'] && $key !== 'AUTHORS'))
                    @if (is_array($property['VALUE']))
                        <span class="{{ $block->elem('tag') }}">{!! implode(' / ', $property['VALUE']) !!}</span>
                    @else
                        <span class="{{ $block->elem('tag') }}">{{ $property['VALUE'] }}</span>
                    @endif
                @endif

            @endforeach

        </div>

    </div>

</div>