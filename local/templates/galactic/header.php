<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$APPLICATION->ShowTitle()?></title>
    <link rel="stylesheet" href="<?=SITE_TEMPLATE_PATH?>/styles.css">
    <?$APPLICATION->ShowHead();?>
</head>
<body>
    <div id="panel"><?$APPLICATION->ShowPanel();?></div>
    <header class="header">
        <a href="/" class="header__container header__link">
            <img src="<?=SITE_TEMPLATE_PATH?>/images/logo.svg" alt="Logo" class="header__logo">
            <p class="header__title">Галактический<br>
                вестник
            </p>
        </a>
    </header>
    