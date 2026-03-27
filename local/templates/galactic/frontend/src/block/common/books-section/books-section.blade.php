<div class="{{ $block }}">
    <div class=" {{ $block->elem('list') }}">
        @foreach ($items as $item)
            {!! $renderer->renderBlock(
                'common/books-item', 
                [
                    'item' => $item,
                    'itemIds' => $item['ITEM_IDS'],
                    'jsParams' => $item['JS_PARAMS'],
                    'obName' => $item['OB_NAME']
                ]
            ) !!}
        @endforeach
    </div>
</div>