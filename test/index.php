<?php
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");
$APPLICATION->SetTitle("Галактический вестник")
?>
<?php
if (!$USER->IsAuthorized()) {
   echo 'non authorized user';
}
?>
<?php 
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");
?>