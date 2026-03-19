<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$this->setFrameMode(true);
?>
	<?=
	\TAO::frontend()->renderBlock(
	'common/title',
	[
	'title' => $arResult['TITLE'],
	]
	)
	?>

	<?=
	\TAO::frontend()->renderBlock(
	'common/list',
	[
	'arResult' => $arResult,
	]
	)
	?>

<?php
if($arParams["DISPLAY_BOTTOM_PAGER"]) {
	echo $arResult["NAV_STRING"];
}
?>

</div>
