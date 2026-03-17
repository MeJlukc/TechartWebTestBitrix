<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>

<?php
$arComponentParameters = [
    'GROUPS' => [
        'USER_CARD' => [
            'NAME' => 'Параметры списка пользователя',
        ],
    ],
    'PARAMETERS' => [
        'IBLOCK_ID' => [
            'NAME' => 'Идентификатор информационного блока',
            'TYPE' => 'NUMBER',
            'PARENT' => 'USER_CARD',
        ],
        'IBLOCK_TYPE' => [
            'NAME' => 'Тип информационного блока',
            'TYPE' => 'STRING',
            'PARENT' => 'USER_CARD',
        ],
        'FIELD_CODE' => [
            'NAME' => 'Вовзращаемые поля элемента',
            'TYPE' => 'LIST',
            'PARENT' => 'USER_CARD',
        ],
        'SHOW_404' => [
            'NAME' => 'Показывать страницу 404',
            'TYPE' => 'CHECKBOX',
            'DEFAULT' => 'Y',
            'PARENT' => 'USER_CARD',
        ],
        'FILE_404' => [
            'NAME' => 'Расположение страницы 404',
            'TYPE' => 'FILE',
            'DEFAULT' => '/404.php',
            'PARENT' => 'USER_CARD',
        ],
        'ITEMS_COUNT' => [
            'NAME' => 'Количество элементов списка на одной странице',
            'TYPE' => 'NUMBER',
            'DEFAULT' => '4',
            'PARENT' => 'USER_CARD',
        ],
        'FILTER_NAME' => [
            'NAME' => 'Название переменной с фильтром',
            'TYPE' => 'STRING',
            'PARENT' => 'USER_CARD',
        ],
        'SET_TITLE' => [
            'NAME' => 'Устаналивать заголовок страницы',
            'TYPE' => 'CHECKBOX',
            'DEFAULT' => 'Y',
            'PARENT' => 'USER_CARD',
        ],
    ],
];
?>
