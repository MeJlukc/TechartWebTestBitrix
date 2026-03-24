<div class="{{ $block }}">

    <div class="{{ $block->elem('switcher') }}">
        @foreach ($content as $key => $value)
        <button 
            class="{{ $block->elem('switcher-button')->mod(['active' => $key == 'tula']) }}" 
            data-key="{{ $key }}"
            data-coordinates="{{ json_encode($value['coordinates']) }}"
            data-title="{{ $value['title'] }}"
            data-description="{{ json_encode($value['description']) }}"
        >
            {{ $value['title'] }}
        </button>
        @endforeach
    </div>

    <div id="map" class="{{ $block->elem('container') }}"></div>

    <div class="{{ $block->elem('info') }}">
        @foreach ($content as $key => $value)
        <div 
            class="{{ $block->elem('item')->mod(['active' => $key == 'tula']) }}" 
            data-key="{{ $key }}"
        >
            <h3 class="{{ $block->elem('title') }}">{{ $value['title']}}</h3>
            <span class="{{ $block->elem('description') }}">{!! join('<br>', $value['description']) !!}</span>
        </div>
        @endforeach
    </div>

</div>