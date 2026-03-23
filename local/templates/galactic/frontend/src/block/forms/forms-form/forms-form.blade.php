{!! str_replace('<form', '<form class="' . $block . '"', $form_header) !!}

<h2 class="{{ $block->elem('title') }}">
	{{ $title }}
</h2>

<div class="{{ $block->elem('errors') }}"></div>

@foreach ($fields as $field)
	{!! $field !!}
@endforeach

{!! $form_footer !!}
