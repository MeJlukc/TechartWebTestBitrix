<?php
$arUrlRewrite=array (
  0 => 
  array (
    'CONDITION' => '#^/news/category-([a-zA-Z0-9_-]+)/page-([0-9]+)#',
    'RULE' => 'CATEGORY_CODE=$1&PAGEN_1=$2',
    'ID' => 'bitrix:news',
    'PATH' => '/news/index.php',
    'SORT' => 100,
  ),
  1 => 
  array (
    'CONDITION' => '#^/news/category-([a-zA-Z0-9_-]+)/#',
    'RULE' => 'CATEGORY_CODE=$1',
    'ID' => 'bitrix:news',
    'PATH' => '/news/index.php',
    'SORT' => 100,
  ),
  2 => 
  array (
    'CONDITION' => '#^/news/page-([0-9]+)/#',
    'RULE' => 'PAGEN_1=$1',
    'ID' => 'bitrix:news',
    'PATH' => '/news/index.php',
    'SORT' => 100,
  ),
  3 => 
  array (
    'CONDITION' => '#^/news/([0-9]+)/#',
    'RULE' => 'ID=$1',
    'ID' => 'bitrix:news',
    'PATH' => '/news/detail.php',
    'SORT' => 100,
  ),
);
