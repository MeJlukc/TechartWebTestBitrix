<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
\TAO::frontendCss('forms');
\TAO::frontendJs('forms');
?>

<?php
$APPLICATION->setTitle("Форма обратной связи");

$APPLICATION->IncludeComponent(
    "bitrix:form.result.new", 
    "template1", 
    Array(
	    "CACHE_TIME" => "3600",
		"IGNORE_CUSTOM_TEMPLATE" => "N",
		"LIST_URL" => "",
		"SEF_FOLDER" => "/",
		"SEF_MODE" => "N",
		"SUCCESS_URL" => "",
		"USE_EXTENDED_ERRORS" => "Y",
		"VARIABLE_ALIASES" => "",
		"WEB_FORM_ID" => "1",
	),
	false
);
?>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>