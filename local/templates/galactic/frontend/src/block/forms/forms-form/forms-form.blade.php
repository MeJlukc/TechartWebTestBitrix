{!! str_replace('<form', '<form class="' . $block . '"', $form_header) !!}

<h2 class="{{ $block->elem('title') }}">
	{{ $title }}
</h2>

@if ($arResult["isFormErrors"])
	{!! $arResult["FORM_ERRORS_TEXT"] !!}
@endif

<?=
\TAO::frontend()->renderBlock(
	'forms/forms-input',
	[
	'label' => "Введите имя",
	'input_field' => $arResult["QUESTIONS"]["USER_NAME"]["HTML_CODE"],
	'isRequired' => $arResult["QUESTIONS"]["QUESTION_THEME"]["REQUIRED"] == "Y" ? true : null,
	'arResult' => $arResult,
	]
)
?>

<?=
\TAO::frontend()->renderBlock(
	'forms/forms-input',
	[
	'label' => "Введите email",
	'input_field' => $arResult["QUESTIONS"]["USER_EMAIL"]["HTML_CODE"],
	'isRequired' => $arResult["QUESTIONS"]["QUESTION_THEME"]["REQUIRED"] == "Y" ? true : null,
	'arResult' => $arResult,
	]
)
?>

<?=
\TAO::frontend()->renderBlock(
	'forms/forms-textarea',
	[
	'label' => "Ваше сообщение",
	'textarea_field' => $arResult["QUESTIONS"]["USER_MESSAGE"]["HTML_CODE"],
	'isRequired' => $arResult["QUESTIONS"]["QUESTION_THEME"]["REQUIRED"] == "Y" ? true : null,
	'arResult' => $arResult,
	]
)
?>

<?=
\TAO::frontend()->renderBlock(
	'forms/forms-select',
	[
	'label' => "По какой теме ваш вопрос",
	'select_id' => $arResult["QUESTIONS"]["QUESTION_THEME"]["STRUCTURE"][0]["ID"],
	'options' => $arResult["CATEGORIES_LIST"],
	'isRequired' => $arResult["QUESTIONS"]["QUESTION_THEME"]["REQUIRED"] == "Y" ? true : null,
	'arResult' => $arResult,
	]
)
?>

<?=
\TAO::frontend()->renderBlock(
	'forms/forms-checkbox',
	[
	'checkbox_field' => $arResult["QUESTIONS"]["PROCESSING_POLICY"]["HTML_CODE"],
	'isRequired' => $arResult["QUESTIONS"]["QUESTION_THEME"]["REQUIRED"] == "Y" ? true : null,
	'arResult' => $arResult,
	]
)
?>

<?=
\TAO::frontend()->renderBlock(
	'forms/forms-submit',
	[
	'value' => "Отправить",
	]
)
?>

{!! $form_footer !!}
