<?php

$allArticles = Articles::getAllArticles();
$allCategories = Categories::getAllCategories();


$lastArticle = Articles::getLastArticles();
$lastArticleLeft = Articles::getLastArticles(5);
$lastArticleRight = Articles::getLastArticles(1);
