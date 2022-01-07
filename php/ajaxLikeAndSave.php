<?php

require_once('db.php');
use DB\DBAccess;

$db = new DBAccess();

$conn = $db->openDBConnection();

// Read POST data
$data = json_decode(file_get_contents("php://input"));

$username = $data->username;
$article_id = $data->article;
echo($article_id);
$like = $data->like;

if($like) {
   // Insert like
   $query = "INSERT INTO liked_articles(username,article_id) VALUES(\"$username\",$article_id)";
   $conn->executeQuery($query);
} else {
   // Remove like
   $query = "DELETE FROM liked_articles WHERE username=\"$username\" AND article_id=$article_id";
   $conn->executeQuery($query);
}

$db->closeDBConnection();


exit;
