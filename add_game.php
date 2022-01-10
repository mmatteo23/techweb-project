<?php

session_start(); //verificare che utente sia admin

require_once("php/validSession.php");
require_once("php/ArticleController.php");
require_once("php/GameController.php");

$htmlPage = file_get_contents("html/add_game.html");

?>