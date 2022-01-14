<?php
echo("CIAO");
require_once('db.php');
use DB\DBAccess;

$db = new DBAccess();

$conn = $db->openDBConnection();

// Read POST data
$data = json_decode(file_get_contents("php://input"));

if ($connection) {
   $username = $data->username;
   $article_id = $data->article;
   $like = $data->like;
   
   if($like) {
      // Insert like
      $query = "INSERT INTO liked_articles(username,article_id) VALUES(\"$username\",$article_id)";
      echo("AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA");
      $db->executeQuery($query);
   } else {
      // Remove like
      $query = "DELETE FROM liked_articles WHERE username=\"$username\" AND article_id=$article_id";
      echo("AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA");
      $db->executeQuery($query);
   }
   
   $db->closeDBConnection();
} else {
   echo("Something went wrong while loading the page, try again or contact us.");
}



exit;
?>