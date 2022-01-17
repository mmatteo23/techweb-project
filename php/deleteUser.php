<?php

require_once('db.php');

use DB\DBAccess;

$connection_manager = new DBAccess();
$conn_ok = $connection_manager->openDBConnection();

session_start();

$username = $_SESSION['username'];
if($conn_ok && isset($username) && $username!=''){
    $deleteQuery = "DELETE FROM Person WHERE username='".$username."'";
    $result = $connection_manager->executeQuery($deleteQuery);
}
$connection_manager->closeDBConnection();
session_destroy();
header("location: ../index.php");

?>