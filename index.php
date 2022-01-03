<?php

require_once('php/db.php');
use DB\DBAccess;

// prendere il risultato dal DB
$db = new DBAccess();

$connection = $db->openDBConnection();

// impaginarlo

$paginaHTML = file_get_contents("html/home.html");

echo $paginaHTML;

?>