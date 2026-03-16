<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>

<?php

use Bitrix\Main\Loader;

Loader::includeModule("iblock");

class UserCardComponent extends CBitrixComponent
{
    /**
     * Подготавливаем входные параметры
     *
     * @param array $arParams
     *
     * @return array
     */
    public function onPrepareComponentParams($arParams)
    {
        $arParams['IBLOCK_ID'] ??= 1;
        $arParams['IBLOCK_TYPE'] ??= 'news';
        $arParams['ITEMS_COUNT'] ??= 20;
        $arParams['FIELD_CODE'] ??= Array(0 => 'ID', 1 => 'NAME', 2 => 'PREVIEW_TEXT',);
        
        return $arParams;
    }
    /**
     * Основной метод выполнения компонента
     *
     * @return void
     */
    public function executeComponent()
    {
        // Кешируем результат, чтобы не делать постоянные запросы к базе
        if ($this->startResultCache())
        {
            $this->initResult();
            
            // Если ничего не найдено, отменяем кеширование
            if (empty($this->arResult))
            {
                $this->abortResultCache();
                ShowError('Информации не найдено');
                
                return;
            }
            
            $this->includeComponentTemplate();
        }
    }
    /**
     * Инициализируем результат
     *
     * @return void
     */
    private function initResult(): void
    {
        $iBlockID = (int)$this->arParams['IBLOCK_ID'];
        $itemsLimit = (int)$this->arParams['ITEMS_COUNT'];
        $fields = $this->arParams['FIELD_CODE'];

        if ($iBlockID < 1 || $itemsLimit < 0)
        {
            return;
        }
        
        $elements = \Bitrix\Iblock\ElementTable::getList([
        'select' => [...$fields],
        'filter' => ['IBLOCK_ID' => $iBlockID, 'ACTIVE' => 'Y'],
        'limit' => $itemsLimit,
        ])->fetchAll();

        if (empty($elements))
        {
            return;
        }

        $this->arResult = [
            'ITEMS' => $elements,
        ];
        
    }
}
?>