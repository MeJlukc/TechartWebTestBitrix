<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);
?>

<?php
if ($arResult['PROPERTIES']['ONLY_AUTH']['VALUE_XML_ID'] == 'Y' && !$USER->IsAuthorized()) { ?>
    <div class="non-auth-user">
        <h2 class="non-auth-user__title">Вы не авторизованы</h2>
        <p class="non-auth-user__text">Авторизуйтесь, чтобы получить доступ к этой странице.</p>
        <a href="/" class="button non-auth-user__button">На главную</a>
    </div>
<?php
} else { ?>

<?=
\TAO::frontend()->renderBlock(
	'common/title',
	[
    'title' => $arResult["NAME"],
	]
)
?>

<?=
\TAO::frontend()->renderBlock(
	'common/detail',
	[
	'date' => $arResult["ACTIVE_FROM"],
    'title' => $arResult["PREVIEW_TEXT"],
    'content' => $arResult["DETAIL_TEXT"],
    'image_path' => $arResult["DETAIL_PICTURE"]["SRC"],
    'categories' => $arResult["CATEGORIES"],
    'href' => $arResult["LIST_PAGE_URL"],
	]
)
?>

<?php
} ?>    