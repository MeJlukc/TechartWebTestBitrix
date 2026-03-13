<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if(CModule::IncludeModule("iblock"))
{

    $res = CIBlockElement::GetList(
        Array("NAME" => "ASC"), 
        Array("IBLOCK_ID" => 5, "ACTIVE" => "Y"), 
        false, 
        false, 
        Array("NAME", "CODE")
    );

    $aMenuLinksExt = array();
    while ($arItem = $res->GetNext())
    {
        $aMenuLinksExt[] = Array(
            $arItem["NAME"],
            "/news/" . "category-" . $arItem["CODE"] . "/",
            Array(),
            Array(
                "FROM_IBLOCK" => "Y",
                "DEPTH_LEVEL" => "2",
            ),
            ""
        );
    }

    $aMenuLinks = $aMenuLinksExt;
}
?>
