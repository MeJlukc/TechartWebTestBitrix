<label class="{{ $block }}">
    {!! $checkbox_field !!}
    @if ($isRequired)
        <span class="star-required">*</span>
    @endif
</label>