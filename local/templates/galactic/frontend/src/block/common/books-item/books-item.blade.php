<div class="{{ $block }} product-item">

    @if ($itemHasDetailUrl)
        <a 
        class="{{ $block->elem('image-wrapper') }} product-item-image-wrapper" 
        href="{{ $item['DETAIL_PAGE_URL'] }}" 
        title="{{ $imgTitle }}"
		data-entity="image-wrapper">
    @else
        <span class="{{ $block->elem('image-wrapper') }} product-item-image-wrapper" data-entity="image-wrapper">
    @endif

        <span class="{{ $block->elem('image-slider-slide-container') }}product-item-image-slider-slide-container slide" id="{{ $itemIds['PICT_SLIDER'] }}">
        </span>
        <span class="{{ $block->elem('image-original') }} product-item-image-original" id="{{ $itemIds['PICT'] }}"
            style="background-image: url('{{ $item['PREVIEW_PICTURE']['SRC'] }}'); {!! ($showSlider ? 'display: none;' : '') !!}">
        </span>

        @if ($item['SECOND_PICT'])
            @php
                $bgImage = !empty($item['PREVIEW_PICTURE_SECOND']) ? $item['PREVIEW_PICTURE_SECOND']['SRC'] : $item['PREVIEW_PICTURE']['SRC'];
            @endphp
            <span class="{{ $block->elem('image-alternative') }} product-item-image-alternative" id="{{ $itemIds['SECOND_PICT'] }}"
                style="background-image: url('{!! $bgImage !!}'); {!! ($showSlider ? 'display: none;' : '')!!}">
            </span>
        @endif

        @if ($item['LABEL'])
            <div class="{{ $block->elem('tags') }} product-item-label-text {{ $labelPositionClass }}" id="{{ $itemIds['STICKER_ID'] }}">
                @if (!empty($item['LABEL_ARRAY_VALUE']))
                    @foreach ($item['LABEL_ARRAY_VALUE'] as $code => $value)
                        <div{!! (!isset($item['LABEL_PROP_MOBILE'][$code]) ? ' class="hidden-xs"' : '')!!}>
                            <span title="{{ $value }}">{{ $value }}</span>
                        </div>
                    @endforeach
                @endif
            </div>
        @endif

	@if ($itemHasDetailUrl)
	</a>
	@else
	</span>
	@endif

	<div class="{{ $block->elem('image-title') }}">
		@if ($itemHasDetailUrl)
		<a class="{{ $block->elem('image-title') }}" href="{{ $item['DETAIL_PAGE_URL'] }}" title="{{ $productTitle }}">
		@endif
		{!! $productTitle !!}
		@if ($itemHasDetailUrl)
		</a>
		@endif
	</div>

    <div class="{{ $block->elem('price-container') }}" data-entity="price-block">
        <span class="{{ $block->elem('price-old') }}" id="{{ $itemIds['PRICE_OLD'] }}" style="display: none;"></span>

        <span class="{{ $block->elem('price-current') }}" id="{{ $itemIds['PRICE'] }}">
            {!! $item['ITEM_PRICES'][0]['PRINT_PRICE'] !!}
        </span>
    </div>     

    <div class="{{ $block->elem('info-container')->mod('hidden') }}" data-entity="quantity-block">
        <div class="{{ $block->elem('amount') }}">
            <div class="{{ $block->elem('amount-container') }}">
                <span class="{{ $block->elem('amount-field-btn')->mod('minus') }} no-select" id="{{ $itemIds['QUANTITY_DOWN'] }}">-</span>
                
                <input class="{{ $block->elem('amount-field') }} product-item-amount-field" id="{{ $itemIds['QUANTITY'] }}" type="number"
                    name="{{ $arParams['PRODUCT_QUANTITY_VARIABLE'] }}"
                    value="{!! $measureRatio !!}">
                    
                <span class="{{ $block->elem('amount-field-btn')->mod('plus') }} no-select" id="{{ $itemIds['QUANTITY_UP'] }}">+</span>
                
                <br>

                <span class="{{ $block->elem('amount-description-container') }}">
                    <span id="{{ $itemIds['QUANTITY_MEASURE'] }}">{{ $item['ITEM_MEASURE']['TITLE'] }}</span>
                    <span id="{{ $itemIds['PRICE_TOTAL'] }}"></span>
                </span>
            </div>
        </div>
    </div>

    <div class="{{ $block->elem('info-container')->mod('hidden') }}" data-entity="buttons-block">
        @if ($actualItem['CAN_BUY'])
            <div class="{{ $block->elem('button-container') }} product-item-button-container" id="{{ $itemIds['BASKET_ACTIONS'] }}">
                <a class="{{ $block->elem('button') }} btn btn-default {{ $buttonSizeClass }}" id="{{ $itemIds['BUY_LINK'] }}"
                    href="javascript:void(0)" rel="nofollow">
                    {!! ($arParams['ADD_TO_BASKET_ACTION'] === 'BUY' ? $arParams['MESS_BTN_BUY'] : $arParams['MESS_BTN_ADD_TO_BASKET']) !!}
                </a>
            </div>
        @else
            <div>net knopka</div>
        @endif
    </div>

@if ($arParams['ADD_PROPERTIES_TO_BASKET'] === 'Y' && !empty($item['PRODUCT_PROPERTIES']))
	<div id="{{ $itemIds['BASKET_PROP_DIV'] }}" style="display: none;">
		@if (!empty($item['PRODUCT_PROPERTIES_FILL']))
			@foreach ($item['PRODUCT_PROPERTIES_FILL'] as $propID => $propInfo)
				<input type="hidden" name="{{ $arParams['PRODUCT_PROPS_VARIABLE'] }}[{!! $propID !!}]"
					value="{!! htmlspecialcharsbx($propInfo['ID']) !!}">
				@php
                    unset($item['PRODUCT_PROPERTIES'][$propID]);
                @endphp
			@endforeach
		@endif
	</div>
@endif

</div>
