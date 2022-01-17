<?php
require_once('db.php');
use DB\DBAccess;

$db = new DBAccess();

$connection = $db->openDBConnection();

if ($connection) {
   $username = $_POST['username'];
   if($_POST['type'] == 'Grant ADMIN privileges')
      $query = "UPDATE Person SET role = 1 WHERE username = '$username'";
   else
   $query = "UPDATE Person SET role = 2 WHERE username = '$username'";
   $db->executeQuery($query);
   $db->closeDBConnection();
} else {
   echo("Something went wrong while loading the page, try again or contact us.");
}
exit;
?>
