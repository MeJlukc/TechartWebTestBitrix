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

<div id="map" style="width: auto; height: 50vh; margin-inline: 10.42vw"></div>

<span style="margin: 30px 10.42vw">
    300041, г. Тула, ул. Ф. Смирнова ул., д. 28, оф. 601-602, 701, 703-707, 712 <br>
    Тел. / Факс: (4872) 250-450, 57-05-01
</span>

<?php 
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>