<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>

<?php

use Bitrix\Main\Loader;

Loader::includeModule("iblock");

class CustomListComponent extends CBitrixComponent
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

        $arParams["MESSAGE_404"] ??= '';
        $arParams["SET_STATUS_404"] ??= 'Y';
        $arParams["SHOW_404"] ??= 'Y';
        $arParams["FILE_404"] ??= '';

        $arParams["SET_TITLE"] ??= 'Y';

        $arParams["ACTIVE_DATE_FORMAT"] ??= 'd.m.Y';
        
        return $arParams;
    }


    public function executeComponent()
    {
        if ($this->startResultCache(false, [$this->getFilter()])) 
        {
            $this->initResult(); 
            
            if (empty($this->arResult['ITEMS']))
            {
                $this->abortResultCache();
                Iblock\Component\Tools::process404(
                    trim($arParams["MESSAGE_404"]) ?: GetMessage("T_NEWS_NEWS_NA")
                    ,true
                    ,$arParams["SET_STATUS_404"] === "Y"
                    ,$arParams["SHOW_404"] === "Y"
                    ,$arParams["FILE_404"]
                );

                return;
            }
            
            $this->includeComponentTemplate();
        }
    }

    private function getFilter()
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
            'IBLOCK_ID',
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
                'nPageSize' => $this->arParams['ITEMS_COUNT'],
                'bSaveSession' => false,
            ],
            $this->getFields(),
        );

        $this->arResult["NAV_STRING"] = $elements->GetPageNavStringEx(
            $navComponentObject, 
            "",
            "",
            false 
        );

        while ($obElement = $elements->getNextElement())
        {
            $item = $obElement->getFields();

            $item['PROPERTIES'] = $obElement->GetProperties();

            $item["PREVIEW_PICTURE"] = CFile::GetFileArray($item["PREVIEW_PICTURE"]);
            $item["DETAIL_PICTURE"] = CFile::GetFileArray($item["DETAIL_PICTURE"]);
            
            $item["DISPLAY_ACTIVE_FROM"] = CIBlockFormatProperties::DateFormat(
                $this->arParams["ACTIVE_DATE_FORMAT"], 
                MakeTimeStamp($item["ACTIVE_FROM"], CSite::GetDateFormat("FULL"))
            );

            $items[] = $item;
        }

        if (empty($items))
        {
            return;
        }
        
        if ($this->arParams['SET_TITLE'] === 'Y')
        {
            $this->arResult['NAME'] = "Cписок";
        }

        $this->arResult['ITEMS'] = $items;
    }
}
?>