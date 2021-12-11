<?php

require_once('db.php');
use DB\DBAccess;

// prendere il risultato dal DB
$db = new DBAccess();

$connection = $db->openDBConnection();

// impaginarlo

$paginaHTML = file_get_contents("index.html");

echo "Ti amo Daniloooo";

?>