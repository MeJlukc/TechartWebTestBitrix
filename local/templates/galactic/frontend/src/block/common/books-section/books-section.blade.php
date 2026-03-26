<div class="{{ $block }}">
    <div class=" {{ $block->elem('list') }}">
        @foreach ($arResult["ITEMS"] as $arItem)
            {!! $renderer->renderBlock('common/books-item', ['item' => $arItem]) !!}
        @endforeach
    </div>
</div>