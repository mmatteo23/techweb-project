<?php

require_once('db.php');

use DB\DBAccess;

$connection_manager = new DBAccess();
$conn_ok = $connection_manager->openDBConnection();

$id = $_POST['deleteId'];
if($conn_ok){
    $deleteQuery = "DELETE FROM Article WHERE id=".$id;
    $result = $connection_manager->executeQuery($deleteQuery);
}
else
    $result = false;
$connection_manager->closeDBConnection();

echo $result;

?>