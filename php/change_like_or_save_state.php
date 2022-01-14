<?php
    
require_once('db.php');

use DB\DBAccess;

$db = new DBAccess();

$connection = $db->openDBConnection();
echo $_POST['username'];
if($connection){
    $username = $_POST['username'];
    $articleId = $_POST['articleId'];
    $newState = $_POST['newState'];
    $table = $_POST['table'];
    if($table=="like"){
        if($newState==1){
            $db->LikeArticle($username, $articleId);
        }
        else{
            $db->UnlikeArticle($username, $articleId);
        }
    }
    else{
        if($newState){
            $db->SaveArticle($username, $articleId);
        }
        else{
            $db->UnsaveArticle($username, $articleId);
        }
    }
}
?>