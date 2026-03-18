<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");
$APPLICATION->SetTitle("Галактический вестник")
?><?$APPLICATION->IncludeComponent("bitrix:system.auth.form", "template1", Array(
	"FORGOT_PASSWORD_URL" => "",	// Страница забытого пароля
		"PROFILE_URL" => "",	// Страница профиля
		"REGISTER_URL" => "",	// Страница регистрации
		"SHOW_ERRORS" => "N",	// Показывать ошибки
	),
	false
);?><?$APPLICATION->IncludeComponent("bitrix:main.auth.form", "template1", Array(
	"AUTH_FORGOT_PASSWORD_URL" => "",	// Страница для восстановления пароля
		"AUTH_REGISTER_URL" => "",	// Страница для регистрации
		"AUTH_SUCCESS_URL" => "",	// Страница после успешной авторизации
	),
	false
);?><?php 
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>