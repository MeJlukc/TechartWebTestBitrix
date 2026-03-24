<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "О компании");
$APPLICATION->SetTitle("");
?>

<?=
\TAO::frontend()->renderBlock(
'common/title',
[
'title' => $APPLICATION->GetPageProperty("title"),
]
)
?>

<?=
\TAO::frontend()->renderBlock(
'common/map',
[
    'content' => ['300041, г. Тула, ул. Ф. Смирнова ул., д. 28, оф. 601-602, 701, 703-707, 712', 'Тел. / Факс: (4872) 250-450, 57-05-01'],
]
)
?>

<?php 
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>