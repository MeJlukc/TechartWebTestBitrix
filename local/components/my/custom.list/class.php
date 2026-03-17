<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>

<?php

use Bitrix\Main\Loader;

Loader::includeModule("iblock");

class UserCardComponent extends CBitrixComponent
{

    public function onPrepareComponentParams($arParams)
    {
        $arParams['IBLOCK_ID'] ??= 1;
        $arParams['IBLOCK_TYPE'] ??= 'news';

        $arParams['ITEMS_COUNT'] ??= 20;

        $arParams['FIELD_CODE'] ??= Array(0 => 'ID', 1 => 'NAME', 2 => 'PREVIEW_TEXT',);
        $arParams['PROPERTY_CODE'] ??= Array();

        $arParams['FILTER_NAME'] ??= 'arrFilter';

        $arParams['SORT_BY1'] ??= 'ACTIVE_FROM';
        $arParams['SORT_ORDER1'] ??= 'DESC';
        
        return $arParams;
    }

    public function executeComponent()
    {
        if ($this->startResultCache())
        {
            $this->initResult();
            
            if (empty($this->arResult))
            {
                $this->abortResultCache();
                ShowError('Информация не найдена');
                
                return;
            }
            
            $this->includeComponentTemplate();
        }
    }

    private function getFilter(): array
    {
        $filter = [
            'IBLOCK_ID' => $this->arParams['IBLOCK_ID'],
            'IBLOCK_TYPE' => $this->arParams['IBLOCK_TYPE'],
            'ACTIVE' => 'Y'
        ];

        $filterName = $this->arParams['FILTER_NAME'];

        if (!empty($filterName) && isset($GLOBALS[$filterName]) && is_array($GLOBALS[$filterName]))
        {
            $filter = array_merge($filter, $GLOBALS[$filterName]);
        }

        return $filter;
    }

    private function getFields()
    {
        $fieldsDefault = Array(
            'ID', 
            'NAME',
            'ACTIVE', 
            'PREVIEW_TEXT', 
            'PREVIEW_PICTURE', 
            'ACTIVE_FROM',
            'DETAIL_TEXT',
            'DETAIL_PICTURE',
        );

        if (!empty($this->arParams['FIELD_CODE']))
        {
            $fields = array_merge($fieldsDefault, $this->arParams['FIELD_CODE']);
        }

        return $fields;
    }

    private function getSort(): array
    {
        return [
            $this->arParams['SORT_BY1'] => $this->arParams['SORT_ORDER1']
        ];
    }

    private function initResult(): void
    {
        $items = [];

        $elements = CIBlockElement::getList(
            $this->getSort(),
            $this->getFilter(),
            false,
            [
                'nTopCount' => $this->arParams['ITEMS_COUNT'],
            ],
            $this->getFields(),
        );

        while ($obElement = $elements->getNextElement())
        {
            $item = $obElement->getFields();

            $item['PROPERTIES'] = $obElement->GetProperties();

            $items[] = $item;
        }

        if (empty($items))
        {
            return;
        }

        $this->arResult = [
            'ITEMS' => $items,
        ];
        
    }
}
?>