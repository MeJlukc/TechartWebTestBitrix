<div class="{{ $block }}" id="{{ $itemIds['ID'] }}" data-entity="item">

    <a
    class="{{ $block->elem('link') }}" href="{{ $item['DETAIL_PAGE_URL'] }}" data-entity="image-wrapper">
        <img 
        class="{{ $block->elem('image') }}"
        src="{{ $photo }}" 
        alt="Book's image"
        >
    </a>

    <div class="{{ $block->elem('info-container') }}">

        <a class="{{ $block->elem('title') }}" href="{{ $item['DETAIL_PAGE_URL'] }}">{!! $item['NAME'] !!}</a>
        
        <div class="{{ $block->elem('price-container') }}" data-entity="price-block">
            <span class="product-item-price-old" id="{{ $itemIds['PRICE_OLD'] }}" style="display: none;"></span>
            
            <span class="product-item-price-current" id="{{ $itemIds['PRICE'] }}">
                {!! $item['ITEM_PRICES'][0]['PRINT_PRICE'] !!}
            </span>
        </div>        

        <div class="{{ $block->elem('amount-container') }}" data-entity="quantity-block">
            <div class="product-item-amount-field-container">
                <span class="product-item-amount-field-btn-minus no-select" id="{{ $itemIds['QUANTITY_DOWN'] }}"></span>
                
                <input class="product-item-amount-field" id="{{ $itemIds['QUANTITY'] }}" type="number"
                    name="{{ $arParams['PRODUCT_QUANTITY_VARIABLE'] }}"
                    value="{{ $item['ITEM_PRICES'][0]['MIN_QUANTITY'] }}">
                    
                <span class="product-item-amount-field-btn-plus no-select" id="{{ $itemIds['QUANTITY_UP'] }}"></span>
                
                <span class="product-item-amount-description-container">
                    <span id="{{ $itemIds['QUANTITY_MEASURE'] }}">{{ $item['ITEM_MEASURE']['TITLE'] }}</span>
                    <span id="{{ $itemIds['PRICE_TOTAL'] }}"></span>
                </span>
            </div>
        </div>

        <div class="{{ $block->elem('buttons-container') }}" data-entity="buttons-container">
            <div id="{{ $itemIds['BASKET_ACTIONS'] }}" class="product-item-button-container">
                <a class="{{ $block->elem('button-to-basket') }}" 
                id="{{ $itemIds['BUY_LINK'] }}" 
                href="javascript:void(0)" 
                rel="nofollow">
                    В корзину
                </a>
            </div>
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
