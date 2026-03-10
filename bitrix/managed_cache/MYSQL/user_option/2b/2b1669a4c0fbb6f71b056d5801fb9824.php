<?
if($INCLUDE_FROM_CACHE!='Y')return false;
$datecreate = '001773131393';
$dateexpire = '001773134993';
$ser_content = 'a:2:{s:7:"CONTENT";s:0:"";s:4:"VARS";a:1:{s:6:"query1";s:484:"CModule::IncludeModule("iblock");
$IBLOCK_ID = 1; // ЗАМЕНИТЕ НА ID ВАШЕГО ИНФОБЛОКА

$res = CIBlockElement::GetList(Array(), Array("IBLOCK_ID" => $IBLOCK_ID), false, false, Array("ID"));
while($el = $res->Fetch()) {
    $be = new CIBlockElement;
    $be->Update($el["ID"], Array(
        "PREVIEW_TEXT_TYPE" => "html",
        "DETAIL_TEXT_TYPE" => "html"
    ));
}
echo "Готово! Тип текста изменен для всех элементов.";";}}';
return true;
?>