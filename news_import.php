<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/prolog_before.php");
CModule::IncludeModule("iblock");

// --- БЛОК 1: ПОДКЛЮЧЕНИЕ К ВАШЕЙ БД ---
$host = 'localhost';
$user = 'root';
$pass = 'root';
$dbname = 'workspace__test';

$link = mysqli_connect($host, $user, $pass, $dbname);

if (!$link) {
    die("Ошибка подключения: " . mysqli_connect_error());
}

// --- БЛОК 2: НАСТРОЙКИ БИТРИКСА ---
$el = new CIBlockElement;
$iblock_id = 1; 
$images_path = $_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/galactic/images";

// --- БЛОК 3: ЗАПРОС К ТАБЛИЦЕ ---
// Указываем вашу таблицу (например, 'news_table')
$sql = "SELECT * FROM news";
$result = mysqli_query($link, $sql);

// --- БЛОК 4: ЦИКЛ ОБРАБОТКИ ---
while ($row = mysqli_fetch_assoc($result)) {
    
    $bitrixDate = CDatabase::FormatDate(
        $row['date'], 
        "YYYY-MM-DD HH:MI:SS", 
        CSite::GetDateFormat("FULL")
    );

    // Подготовка картинки
    $arImage = false;
    $full_path = $images_path . $row['image_file'];
    if (!empty($row['image_file']) && file_exists($full_path)) {
        $arImage = CFile::MakeFileArray($full_path);
    }

    $arFields = [
        "IBLOCK_ID"       => $iblock_id,
        "NAME"            => $row['title'],
        "ACTIVE"          => "Y",
        "DATE_ACTIVE_FROM"=> $bitrixDate,
        "PREVIEW_TEXT"    => $row['announce'],
        "DETAIL_TEXT"     => $row['content'],
        "PREVIEW_PICTURE" => $arImage,
        "DETAIL_PICTURE"  => $arImage,
        "XML_ID"          => $row['id'], 
    ];

    // Проверка и сохранение (как в предыдущем примере)
    $res = CIBlockElement::GetList([], ["IBLOCK_ID" => $iblock_id, "XML_ID" => $row['id']], false, false, ["ID"]);
    if ($existingItem = $res->Fetch()) {
        $el->Update($existingItem["ID"], $arFields);
        echo "Обновлена новость ID: {$row['id']}<br>";
    } else {
        if ($newID = $el->Add($arFields)) {
            echo "Добавлена новость ID: {$row['id']} (Битрикс ID: $newID)<br>";
        } else {
            echo "Ошибка: " . $el->LAST_ERROR . "<br>";
        }
    }
}

mysqli_close($link); // Закрываем соединение
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/main/include/epilog_after.php");
