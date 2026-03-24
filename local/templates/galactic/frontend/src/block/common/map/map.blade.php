<div class="{{ $block }}">

    <div class="{{ $block->elem('switcher') }}" data-content="{{ json_encode($content) }}">
        <button class="{{ $block->elem('switcher-button') }}" data-city="tula">Тула</button>
        <button class="{{ $block->elem('switcher-button') }}" data-city="moscow">Москва</button>
    </div>

    <div id="map" class="{{ $block->elem('container') }}"></div>

    <div class="{{ $block->elem('info') }}">
        <h3 class="{{ $block->elem('title') }}"></h3>
        <span class="{{ $block->elem('description') }}"></span>
    </div>

</div>