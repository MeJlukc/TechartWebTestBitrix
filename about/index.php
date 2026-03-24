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
    'content' => [
        'tula' => [
            'title' => 'Офис в Туле',
            'description' => ['300041, г. Тула, ул. Ф. Смирнова ул., д. 28, оф. 601-602, 701, 703-707, 712', 'Тел. / Факс: (4872) 250-450, 57-05-01'],
            'coordinates' => [37.584685, 54.200802],
        ],
        'moscow' => [
            'title' => 'Офис в Москве',
            'description' => ['115230, г. Москва, Варшавское шоссе, д. 47, к. 4, оф. 1224 (12 этаж).', 'Тел. / Факс: (495) 933-62-10'],
            'coordinates' => [37.630113, 55.679103],
        ]
    ]
]
)
?>

<?php 
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>