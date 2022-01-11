<?php
session_start();
$htmlPage = file_get_contents("html/about_us.html");
require_once('php/full_sec_loader.php');
echo $htmlPage;
?>