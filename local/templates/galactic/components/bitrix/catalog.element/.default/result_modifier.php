<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();
    
/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogElementComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

// 

$arResult['AUTHORS_NAMES'] = [];

$authorIds = (is_array($arResult['PROPERTIES']['AUTHORS']['VALUE'])) 
    ? $arResult['PROPERTIES']['AUTHORS']['VALUE'] 
    : [$arResult['PROPERTIES']['AUTHORS']['VALUE']];

if (!empty($authorIds)) {
    $res = CIBlockElement::GetList([], ["ID" => $authorIds], false, false, ["ID", "NAME"]);
    while ($ob = $res->Fetch()) {
        $arResult['AUTHORS_NAMES'][] = $ob["NAME"];
    }
}

$authorsString = implode(', ', $arResult['AUTHORS_NAMES']);
$arResult['LABEL_ARRAY_VALUE']['AUTHORS'] = $authorsString;
