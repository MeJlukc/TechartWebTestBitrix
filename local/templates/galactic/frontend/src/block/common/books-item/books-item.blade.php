<div class="{{ $block }}" id="{{ $itemIds['ID'] }}" data-entity="item">

    <a
    class="{{ $block->elem('link') }}" href="/" data-entity="image-wrapper">
        <img 
        class="{{ $block->elem('image') }}"
        src="{{ $item['DETAIL_PICTURE']['SRC'] }}" 
        alt="Book's image"
        >
    </a>

    <div class="{{ $block->elem('info-container') }}">

        <a class="{{ $block->elem('title') }}" href="/">{!! $item['NAME'] !!}</a>
        <div class="{{ $block->elem('price-container') }}" id="{{ $itemIds['PRICE_TOTAL'] }}">{!! $item['ITEM_PRICES'][0]['PRINT_PRICE'] !!}</div>

        <div class="{{ $block->elem('amount-container') }}" data-entity="quantity-block">

            <span class="product-item-amount-field-btn-minus no-select" id="{{ $itemIds['QUANTITY_DOWN'] }}"></span>
            <input class="product-item-amount-field" id="{{ $itemIds['QUANTITY'] }}" type="number"
                name="quantity"
                value="1">
            <span class="product-item-amount-field-btn-plus no-select" id="{{ $itemIds['QUANTITY_UP'] }}"></span>
            <br>
            <span class="{{ $block->elem('amount-measure') }}" id="{{ $itemIds['QUANTITY_MEASURE'] }}">шт
                <span id="{{ $itemIds['QUANTITY_MEASURE'] }}">{{ $item['OFFERS'][$item['OFFERS_SELECTED']] }}</span>
				<span id="{{ $itemIds['PRICE_TOTAL'] }}"></span>
            </span>

        </div>

        <div class="{{ $block->elem('buttons-container') }}">
            <a class="{{ $block->elem('button-to-basket') }}" id="{{ $itemIds['BUY_LINK'] }}" href="javascript:void(0)">
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

<script>
    var {{ $obName }} = new JCCatalogItem({!! CUtil::PhpToJSObject($jsParams, false, true) !!});
</script>