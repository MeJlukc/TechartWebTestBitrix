<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");

// 1. НАСТРОЙКИ ДРУГОЙ БД
$host = 'localhost';
$user = 'root';
$pass = 'root';
$dbname = 'workspace__test';

$remoteDb = new mysqli($host, $user, $pass, $dbname);

if ($remoteDb->connect_error) {
    die("Ошибка подключения к старой БД: " . $remoteDb->connect_error);
}

// 2. НАСТРОЙКИ БИТРИКСА
$IBLOCK_ID = 1; 
$IMAGES_PATH = "/bitrix/templates/galactic/images/"; 

// Получаем элементы из Битрикса
$rsElements = CIBlockElement::GetList([], ["IBLOCK_ID" => $IBLOCK_ID], false, false, ["ID", "NAME", "EXTERNAL_ID"]);

while($arElement = $rsElements->Fetch()) {
    $oldId = $arElement["EXTERNAL_ID"]; // Это наш "ключ" для поиска в старой базе
    
    if (!$oldId) continue;

    // 3. ИЩЕМ НАЗВАНИЕ КАРТИНКИ В ДРУГОЙ БД
    // Предположим, таблица называется 'news', а колонка с именем файла - 'image'
    $query = "SELECT image FROM news WHERE id = " . intval($oldId);
    $result = $remoteDb->query($query);
    
    if ($row = $result->fetch_assoc()) {
        $fileName = $row['image']; // Например: 'photo_test.jpg'
        $fullPath = $_SERVER["DOCUMENT_ROOT"] . $IMAGES_PATH . $fileName;

        if (file_exists($fullPath)) {
            // 4. ПРИВЯЗЫВАЕМ ФАЙЛ К НОВОСТИ
            $el = new CIBlockElement;
            $res = $el->Update($arElement["ID"], [
                "PREVIEW_PICTURE" => CFile::MakeFileArray($fullPath)
            ]);

            if ($res) {
                echo "<span style='color:green;'>ОК:</span> Файл $fileName привязан к новости {$arElement['NAME']}<br>";
            }
        } else {
            echo "<span style='color:red;'>Файл не найден на диске:</span> $fullPath<br>";
        }
    }
}

$remoteDb->close();
echo "<br>Завершено!";
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
?>