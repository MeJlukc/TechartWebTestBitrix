{!! str_replace('<form', '<form class="' . $block . '"', $form_header) !!}

<h2 class="{{ $block->elem('title') }}">
	{{ $title }}
</h2>

@if ($have_errors)
	{!! $error_messages !!}
@endif

@foreach ($fields as $field)
	{!! $field !!}
@endforeach

{!! $form_footer !!}
