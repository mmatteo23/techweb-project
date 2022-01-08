<?php

require_once("php/validSession.php");

// paginate the content
// page structure
$htmlPage = file_get_contents("html/write_article.html");

//header footer and dynamic navbar all at once (^^^ sostituisce il commento qua sopra ^^^)
require_once('php/full_sec_loader.php');

echo $htmlPage;

?>