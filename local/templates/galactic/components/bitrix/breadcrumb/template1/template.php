<?php
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();


?>

<?php
return \TAO::frontend()->renderBlock(
	'common/breadcrumbs',
	[
    'arResult' => $arResult,
	]
);

?>
