<label class="{{ $block }}">
    <span class="{{ $block->elem('label-text') }}">
        {{ $label }}
        @if ($isRequired)
            <span class="star-required">*</span>
        @endif
    </span>
    {!! $textarea_field !!}
</label>