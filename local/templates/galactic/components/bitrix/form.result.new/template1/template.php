<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?php 
if ($arResult["isFormNote"] == "Y") {
?>

<div class="feedback-success">
	<h2 class="feedback-success__title">Спасибо!</h2>
	<p class="feedback-success__text">Форма успешно отправлена.</p>
	<a href="/" class="button feedback-success__button">На главную</a>
</div>

<?php
} else {
?>

<?=
\TAO::frontend()->renderBlock(
	'forms/forms-form',
	[
	'title' => "Форма обратной связи",
	'form_header' => $arResult["FORM_HEADER"],
	'form_footer' => $arResult["FORM_FOOTER"],
	'fields' => $arResult["CUSTOM_FIELDS"],
	'have_errors' => $arResult["isFormErrors"],
	'error_messages' => $arResult["FORM_ERRORS_TEXT"],
	]
)
?>

<?
}
