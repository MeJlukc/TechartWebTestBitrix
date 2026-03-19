<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

\TAO::frontendCss('index');
\TAO::frontendJs('index');
?>

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
    
    <?php
    ob_start();
    $APPLICATION->IncludeComponent("bitrix:menu", "horizontal_multilevel1", Array(
        "ROOT_MENU_TYPE" => "top",
        "MAX_LEVEL" => "2",
        "CHILD_MENU_TYPE" => "left",
        "USE_EXT" => "Y",		
        ),
        false
    );
    $menu = ob_get_clean();

    ob_start();
    $APPLICATION->IncludeComponent("bitrix:system.auth.form", "template1", Array(
    "FORGOT_PASSWORD_URL" => "",
        "PROFILE_URL" => "",
        "REGISTER_URL" => "",
        "SHOW_ERRORS" => "Y",
    ),
    false
    );
    $auth = ob_get_clean();
    ?>

    <?=
    \TAO::frontend()->renderBlock(
        'common/header',
        ["menu" => $menu, "auth" => $auth]
    )
    ?>