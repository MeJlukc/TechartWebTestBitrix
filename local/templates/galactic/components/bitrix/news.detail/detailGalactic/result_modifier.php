<?php
foreach ($arResult["DISPLAY_PROPERTIES"]["NEWS_CATEGORIES"]["LINK_ELEMENT_VALUE"] as $category) {
    $categoryCode = $category["CODE"];
    $categoryName = $category["NAME"];
    $res[] = "<a href=\"/news/category-$categoryCode/\">$categoryName</a>";
}

$categories = join(", ", $res);

$arResult["CATEGORIES"] = $categories;