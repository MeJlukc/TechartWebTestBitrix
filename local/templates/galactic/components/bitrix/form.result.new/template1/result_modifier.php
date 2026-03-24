<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

CModule::IncludeModule("iblock");

$arResult["CATEGORIES_LIST"] = [];

$res = CIBlockElement::GetList(
    Array("NAME" => "ASC"), 
    Array("IBLOCK_ID" => 5, "ACTIVE" => "Y"), 
    false, 
    false, 
    Array("NAME")
);

while ($arItem = $res->GetNext()) {
    array_push($arResult["CATEGORIES_LIST"], Array("NAME" => $arItem["NAME"]));
}

//
$arResult["CUSTOM_FIELDS"] = [];

$arResult["CUSTOM_FIELDS"]["NAME"] = \TAO::frontend()->renderBlock(
	'forms/forms-input',
	[
	'label' => "Введите имя",
	'input_field' => $arResult["QUESTIONS"]["USER_NAME"]["HTML_CODE"],
	'isRequired' => $arResult["QUESTIONS"]["USER_NAME"]["REQUIRED"] == "Y" ? true : null,
	'arResult' => $arResult,
	]
);

$arResult["CUSTOM_FIELDS"]["EMAIL"] = \TAO::frontend()->renderBlock(
	'forms/forms-input',
	[
	'label' => "Введите email",
	'input_field' => $arResult["QUESTIONS"]["USER_EMAIL"]["HTML_CODE"],
	'isRequired' => $arResult["QUESTIONS"]["USER_EMAIL"]["REQUIRED"] == "Y" ? true : null,
	'arResult' => $arResult,
	]
);

$arResult["CUSTOM_FIELDS"]["PHONE"] = \TAO::frontend()->renderBlock(
	'forms/forms-input',
	[
	'label' => "Введите номер телефона",
	'input_field' => $arResult["QUESTIONS"]["PHONE_NUMBER"]["HTML_CODE"],
	'isRequired' => $arResult["QUESTIONS"]["PHONE_NUMBER"]["REQUIRED"] == "Y" ? true : null,
	'arResult' => $arResult,
	]
);

$arResult["CUSTOM_FIELDS"]["MESSAGE"] = \TAO::frontend()->renderBlock(
	'forms/forms-textarea',
	[
	'label' => "Ваше сообщение",
	'textarea_field' => $arResult["QUESTIONS"]["USER_MESSAGE"]["HTML_CODE"],
	'isRequired' => $arResult["QUESTIONS"]["USER_MESSAGE"]["REQUIRED"] == "Y" ? true : null,
	'arResult' => $arResult,
	]
);

$arResult["CUSTOM_FIELDS"]["CATEGORY"] = \TAO::frontend()->renderBlock(
	'forms/forms-select',
	[
	'label' => "По какой теме ваш вопрос",
	'select_id' => $arResult["QUESTIONS"]["QUESTION_THEME"]["STRUCTURE"][0]["ID"],
	'options' => $arResult["CATEGORIES_LIST"],
	'isRequired' => $arResult["QUESTIONS"]["QUESTION_THEME"]["REQUIRED"] == "Y" ? true : null,
	'arResult' => $arResult,
	]
);

$arResult["CUSTOM_FIELDS"]["PROCESSING_POLICY"] = \TAO::frontend()->renderBlock(
	'forms/forms-checkbox',
	[
	'checkbox_field' => $arResult["QUESTIONS"]["PROCESSING_POLICY"]["HTML_CODE"],
	'isRequired' => $arResult["QUESTIONS"]["PROCESSING_POLICY"]["REQUIRED"] == "Y" ? true : null,
	'arResult' => $arResult,
	]
);

$arResult["CUSTOM_FIELDS"]["SUBMIT"] = \TAO::frontend()->renderBlock(
	'forms/forms-submit',
	[
	'value' => "Отправить",
	]
);
