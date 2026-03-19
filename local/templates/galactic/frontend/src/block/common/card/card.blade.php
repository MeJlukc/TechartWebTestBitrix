<div class="{{ $block }}">
    <span class="{{ $block->elem('date') }}">
        {{ $date }}
    </span>
    <h2 class="{{ $block->elem('title') }}">
        {{ $title }}
    </h2>
    <span class="{{ $block->elem('text') }}">
        {!! $text !!}
    </span>
    <a
    class="{{ $block->elem('link-button') }}"
    href="/{{ $link }}"
    >
    Подробнее
    </a>
</div>