<?php

require_once("php/validSession.php");
require_once("php/ArticleController.php");
require_once("php/loadArticles.php");
require_once("php/GameController.php");
require_once("php/utilityFunctions.php");

$articles = getArticles($_SESSION['username']);

$content = '';
if($articles && count($articles) > 0){
    $content = loadArticles($articles);
}

?>