<?php

require_once('utilityFunctions.php');
require_once('php/db.php');
use DB\DBAccess;

function getTags(){
    // create a connection istance to talk with the db
    $connection_manager = new DBAccess();
    $conn_ok = $connection_manager->openDBConnection();
    
    if($conn_ok){
        $selectQuery = "SELECT * FROM Tag";

        $tags = $connection_manager->executeQuery($selectQuery);
        $connection_manager->closeDBConnection();
        return $tags;
    }
}

function manageTags(array $newTags){
    $oldTags = getTags();

    foreach($oldTags as $tag){
        if(in_array($tag['name'],$newTags)){
            unset($newTags[array_search($tag['name'], $newTags)]);
        }
    }

    if(count($newTags) > 0){
        storeTags($newTags);
    }
}

function storeTags(array $newTags){
    // create a connection istance to talk with the db
    $connection_manager = new DBAccess();
    $conn_ok = $connection_manager->openDBConnection();
    
    if($conn_ok){

        $selectQuery = "INSERT INTO Tag (name) VALUES";
        foreach($newTags as $tag){
            $selectQuery .= "('$tag'),";
        }
        $selectQuery = trim($selectQuery, ',');

        echo $selectQuery;

        $connection_manager->executeQuery($selectQuery);
        $connection_manager->closeDBConnection();
    }
}



?>