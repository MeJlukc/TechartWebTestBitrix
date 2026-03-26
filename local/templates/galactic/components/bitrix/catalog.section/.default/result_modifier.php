<? if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

/**
 * @var CBitrixComponentTemplate $this
 * @var CatalogSectionComponent $component
 */

$component = $this->getComponent();
$arParams = $component->applyTemplateModifications();

// 
$allAuthorIds = [];
foreach ($arResult['ITEMS'] as $item) {
    $val = $item['PROPERTIES']['AUTHORS']['VALUE'];
    if (!empty($val)) {
        if (is_array($val)) $allAuthorIds = array_merge($allAuthorIds, $val);
        else $allAuthorIds[] = $val;
    }
}

if (!empty($allAuthorIds)) {
    $allAuthorIds = array_unique($allAuthorIds);

    $res = CIBlockElement::GetList([], ["ID" => $allAuthorIds], false, false, ["ID", "NAME"]);
    $namesMap = [];
    while ($ob = $res->Fetch()) {
        $namesMap[$ob["ID"]] = $ob["NAME"];
    }

    foreach ($arResult['ITEMS'] as $key => $item) {
        $itemAuthorIds = $item['PROPERTIES']['AUTHORS']['VALUE'];
        
        if (!empty($itemAuthorIds)) {
            $currentNames = [];
            $itemAuthorIds = (is_array($itemAuthorIds)) ? $itemAuthorIds : [$itemAuthorIds];
            
            foreach ($itemAuthorIds as $id) {
                if (isset($namesMap[$id])) {
                    $currentNames[] = $namesMap[$id];
                }
            }

            if (!empty($currentNames)) {
                $arResult['ITEMS'][$key]['LABEL'] = true;
                $arResult['ITEMS'][$key]['LABEL_ARRAY_VALUE']['AUTHORS'] = implode(', ', $currentNames);
            }
        }
    }
}

//

foreach ($arResult['ITEMS'] as &$arItem) { 

    if (isset($arItem['PROPERTIES']['BEST_SELLER']) && $arItem['PROPERTIES']['BEST_SELLER']['VALUE'] === 'Да') {
        
        $arItem['PROPERTIES']['BEST_SELLER']['VALUE'] = $arItem['PROPERTIES']['BEST_SELLER']['NAME'];
    }
}
unset($arItem);
