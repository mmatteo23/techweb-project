<?php

$htmlPage = file_get_contents("html/error.html");

//header footer and dynamic navbar all at once (^^^ sostituisce il commento qua sopra ^^^)
require_once('php/full_sec_loader.php');

//str_replace finale col conenuto specifico della pagina
echo str_replace("<error/>", $errorMessage, $htmlPage);
?>