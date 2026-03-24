<div class="{{ $block }}">
    <div id="map" class="{{ $block->elem('container') }}"></div>
    <div class="{{ $block->elem('info') }}">
        @foreach ($content as $item)
        <span class="{{ $block->elem('item') }}">{!! $item !!}</span>
        @endforeach
    </div>
</div>