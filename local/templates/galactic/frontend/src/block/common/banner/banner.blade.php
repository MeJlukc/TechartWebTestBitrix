<div 
class="{{ $block }}"
style="background: url({{ $background }}) center/100% no-repeat"
>
    <h2 class="{{ $block->elem('title') }}"> {{ $title }}</h2>
    <span class="{{ $block->elem('text') }}"> {!! $text !!}</span>
</div>