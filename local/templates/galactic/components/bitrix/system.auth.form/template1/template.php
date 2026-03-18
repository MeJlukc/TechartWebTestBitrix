<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="auth-container">
    <?php 
	if ($arResult['SHOW_ERRORS'] === 'Y' && $arResult['ERROR']) {?>
        <div class="error-msg"><?ShowMessage($arResult['ERROR_MESSAGE']);?></div>
    <?php
	} ?>

    <?php 
	if($arResult["FORM_TYPE"] == "login") {?>
        
        <form class="auth-form" method="post" action="<?=$arResult["AUTH_URL"]?>">
            <input type="hidden" name="AUTH_FORM" value="Y" />
            <input type="hidden" name="TYPE" value="AUTH" />
            <?if($arResult["BACKURL"] != ''):?>
                <input type="hidden" name="backurl" value="<?=$arResult["BACKURL"]?>" />
            <?endif?>
            <?foreach ($arResult["POST"] as $key => $value):?>
                <input type="hidden" name="<?=$key?>" value="<?=$value?>" />
            <?endforeach?>

            <input type="text" name="USER_LOGIN" placeholder="Логин" required>
            <input type="password" name="USER_PASSWORD" placeholder="Пароль" required>
            
            <button type="submit" name="Login">Войти</button>
        </form>

    <?php
	} else { ?>

        <div class="user-block">
            <p>Вы авторизованы (<?=$arResult["USER_LOGIN"]?>)</p>
            
            <form action="<?=$arResult["AUTH_URL"]?>">
                <?=bitrix_sessid_post()?>
                <input type="hidden" name="logout" value="yes" />
                <input type="submit" name="logout_butt" value="Выйти" />
            </form>
        </div>

    <?php
	} ?>

</div>