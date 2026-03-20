<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

$this->setFrameMode(true);
?>

<?=
\TAO::frontend()->renderBlock(
'common/banner',
[
'title' => $arResult["BANNER_INFO"]['TITLE'],
'text' => $arResult["BANNER_INFO"]['TEXT'],
'background' => $arResult["BANNER_INFO"]['BACKGROUND'],
]
)
?>
