<div class="{{ $block }}">
    <div class="{{ $block->elem('info-container') }}">
        <span class="{{ $block->elem('date') }}">{{ $date }}</span>
        <h2 class="{{ $block->elem('title') }}">
            {!! $title !!}
        </h2>
        <span class="{{ $block->elem('content') }}">
            {!! $content !!}
        </span>
        {!!
            $renderer->renderBlock(
                'common/tags', 
                [
                'content' => $categories,
                ],
            )
        !!}
        {!!
            $renderer->renderBlock(
                'common/button', 
                [
                'content' => 'Назад к новостям',
                'path' => $href,
                ],
            )
        !!}
    </div>
    <div class="{{ $block->elem('image-container') }}">
        <img 
        class="{{ $block->elem('image') }}"
        src="{!! $image_path !!}" 
        alt="Detail image"
        >
    </div>
</div>