<?php

require_once('utilityFunctions.php');
require_once('php/db.php');
use DB\DBAccess;

function getTags(){
    $connection_manager = new DBAccess();
    $conn_ok = $connection_manager->openDBConnection();
    
    if($conn_ok){
    // create a connection istance to talk with the db
        $selectQuery = "SELECT * FROM Tag";

        $tags = $connection_manager->executeQuery($selectQuery);
        $connection_manager->closeDBConnection();
        return $tags;
    }
}

function manageTags(array $newTags){
    $connection_manager = new DBAccess();
    $conn_ok = $connection_manager->openDBConnection();
    
    if($conn_ok){

        $selectQuery = "SELECT * FROM Tag";
        $oldTags = $connection_manager->executeQuery($selectQuery);
        if($oldTags!="WrongQuery"){
            foreach($oldTags as $tag){
                if (($key = array_search($tag['name'], $newTags)) !== false) {
                    unset($newTags[$key]);
                }
            }
            if(count($newTags) > 0){
                $insertQuery = "INSERT INTO Tag (name) VALUES";
                foreach($newTags as $tag){
                    $insertQuery .= "('".$tag."'),";
                }
                $insertQuery = trim($insertQuery, ',');
                // echo $insertQuery;
                $connection_manager->executeQuery($insertQuery);
            }
        }
    }
    
    $connection_manager->closeDBConnection();
}

function storeTags(array $newTags){
    // create a connection istance to talk with the db
    $connection_manager = new DBAccess();
    $conn_ok = $connection_manager->openDBConnection();
    
    if($conn_ok){
        $insertQuery = "INSERT INTO Tag (name) VALUES";
        foreach($newTags as $tag){
            $selectQuery .= "('$tag'),";
        }
        $insertQuery = trim($insertQuery, ',');
        // echo $insertQuery;
        
        $connection_manager->executeQuery($insertQuery);
        $connection_manager->closeDBConnection();
    }
}



?>