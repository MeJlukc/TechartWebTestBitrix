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
    <script src="https://api-maps.yandex.ru/v3/?apikey=99aebbf7-de9b-4688-a7a4-a76c2099d423&lang=ru_RU"></script>
    <script>
        initMap();

        async function initMap() {
            await ymaps3.ready;

            const {YMap, YMapDefaultSchemeLayer, YMapDefaultFeaturesLayer} = ymaps3;
            const {YMapDefaultMarker} = await ymaps3.import('@yandex/ymaps3-markers@0.0.1');

            const map = new YMap(
                document.getElementById('map'),
                {
                    location: {
                        center: [37.584685, 54.200802],
                        zoom: 15
                    }
                }
            );

            map.addChild(new YMapDefaultSchemeLayer());

            map.addChild(new YMapDefaultFeaturesLayer());

            const marker = new YMapDefaultMarker({
                coordinates: [37.584685, 54.200802],
                title: 'Techart',
                subtitle: '',
                color: 'red',

                popup: {
                    content: '<span>300041, г. Тула, ул. Ф. Смирнова ул., д. 28, оф. 601-602, 701, 703-707, 712 <br> Тел. / Факс: (4872) 250-450, 57-05-01</span>',
                    position: 'right',
                    hideOnClose: true
                }
            });

            map.addChild(marker);
        }
    </script>
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