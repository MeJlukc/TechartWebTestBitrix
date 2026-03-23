<label class="{{ $block }}">
    <span class="{{ $block->elem('label-text') }}">
        {{ $label }}
        @if ($isRequired)
            <span class="star-required">*</span>
        @endif
    </span>
    <select name="form_text_{{ $select_id }}" id="form_text_QUESTION_THEME">
        <option value="">Выберите вариант</option>
        @foreach ($options as $option)
            <option value="{{ $option['NAME'] }}">{{ $option['NAME'] }}</option>
        @endforeach
    </select>
</label>