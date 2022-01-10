<?php

require_once('utilityFunctions.php');
require_once('php/db.php');
use DB\DBAccess;

function getGames(bool $name = TRUE, bool $description = TRUE, bool $release_date = TRUE, bool $developer = TRUE, bool $game_img = TRUE){
    // create a connection istance to talk with the db
    $connection_manager = new DBAccess();
    $conn_ok = $connection_manager->openDBConnection();

    if($conn_ok){

        // CREATE THE QUERY
        $selectQuery = "SELECT id";
        // SELECT parameters
        if($name) $selectQuery .= ", name";
        if($description) $selectQuery .= ", description";
        if($release_date) $selectQuery .= ", release_date";
        if($developer) $selectQuery .= ", developer";
        if($game_img) $selectQuery .= ", game_img";

        $selectQuery .= " FROM Game ORDER BY name";
        
        // LAUNCH THE QUERY
        $queryResults = $connection_manager->executeQuery($selectQuery);

        return $queryResults;
    }
}

?>