<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetPageProperty("title", "Ремонт");
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

<section class="page-in-develop">
    <h1 class="page-in-develop__tile">Страница находится в разработке</h1>
    <a href="/" class="button page-in-develop__button">На главную</a>
</section>

<?php 
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>