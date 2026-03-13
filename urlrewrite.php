<?php
$arUrlRewrite=array (
  0 => 
  array (
    'CONDITION' => '#^/news/([0-9]+)/#',
    'RULE' => 'ID=$1',
    'ID' => 'bitrix:news',
    'PATH' => '/news/detail.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/news/page-([0-9]+)/#',
    'RULE' => 'PAGEN_1=$1',
    'ID' => 'bitrix:news',
    'PATH' => '/news/index.php',
    'SORT' => 100,
  ),
);
