<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404 Not Found");
?>

<section class="not-found">
	<div class="not-found__container">
		<h1 class="not-found__title">Упс..</h1>
		<p class="not-found__text">Такой страницы не найдено:(</p>
		<a href="/" class="button not-found__button">На главную</a>
	</div>
</section>

<?php 
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>