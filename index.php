<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Галактический вестник")
?>

<section class="home-page__container">
    <h1 class="home-page__title">Вы на главной</h1>
    <a href="/news/" class="button home-page__button">К новостям</a>
    <a href="/contacts/" class="button home-page__button">Форма обратной связи</a>
</section>

<?php 
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>