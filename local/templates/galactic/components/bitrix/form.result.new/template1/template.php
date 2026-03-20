<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?php 
if ($arResult["isFormNote"] == "Y") {
?>

<div class="feedback-success">
	<h2 class="feedback-success__title">Спасибо!</h2>
	<p class="feedback-success__text">Форма успешно отправлена</p>
	<a href="/" class="button feedback-success__button">На главную</a>
</div>

<?php
} else {
?>

<?=$arResult["FORM_HEADER"]?>
<div class="feedback-form">
	<h2 class="feedback-form__title">Форма обратной связи</h2>

	<div class="error-group">
		<?php 
		if ($arResult["isFormErrors"] == "Y") {
			echo $arResult["FORM_ERRORS_TEXT"];
		} 
		?>
	</div>

	<div class="input-group">
        <label>
			<span class="label-text">
				Ваше имя<?=($arResult["QUESTIONS"]["QUESTION_THEME"]["REQUIRED"] == "Y" ? '<span class="star">*</span>' : '')?>
			</span>
			<?=$arResult["QUESTIONS"]["USER_NAME"]["HTML_CODE"]?>	
		</label>
    </div>

	<div class="input-group">
        <label>
			<span class="label-text">
				Ваш email<?=($arResult["QUESTIONS"]["QUESTION_THEME"]["REQUIRED"] == "Y" ? '<span class="star">*</span>' : '')?>
			</span>
			<?=$arResult["QUESTIONS"]["USER_EMAIL"]["HTML_CODE"]?>
		</label>
    </div>

	<div class="textarea-group">
        <label>
			<span class="label-text">
				Ваше сообщение<?=($arResult["QUESTIONS"]["QUESTION_THEME"]["REQUIRED"] == "Y" ? '<span class="star">*</span>' : '')?>
			</span>
			<?=$arResult["QUESTIONS"]["USER_MESSAGE"]["HTML_CODE"]?>
		</label>
    </div>

	<div class="select-group">
		<label>
			<span class="label-text">
				По какой теме ваш вопрос<?=($arResult["QUESTIONS"]["QUESTION_THEME"]["REQUIRED"] == "Y" ? '<span class="star">*</span>' : '')?>
			</span>
			<?php
			$answerId = $arResult["QUESTIONS"]["QUESTION_THEME"]["STRUCTURE"][0]["ID"];
			?>
			<select name="form_text_<?=$answerId?>" id="form_text_QUESTION_THEME">
				<option value="" selected>Выберите тему</option>
				<?php
				foreach ($arResult["CATEGORIES_LIST"] as $category) {
				?>
				<option value="<?=$category["NAME"]?>"><?=$category["NAME"]?></option>
				<?php
				} ?>
			</select>
			
		</label>
	</div>

	<div class="checkbox-group">
		<label>
			<input type="checkbox">
			Я подтвержаю свое согласие с политикой обработки персональных данных.
		</label>
	</div>

	<div class="submit-group">
		<input 
		class="button feedback-form__button"
		type="submit" name="web_form_submit" value="Отправить"></input>
	</div>

</div>
<?=$arResult["FORM_FOOTER"]?>
<?
}
