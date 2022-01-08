<?php

require_once("../php/validSession.php");

if($_SERVER['REQUEST_METHOD'] == "POST"){
    
    $title = $_POST['title'];
    $subtitle = $_POST['subtitle'];
    $minutes = $_POST['minutes'];
    $content = $_POST['articleContent'];

    echo $content . "prova";

}


?>