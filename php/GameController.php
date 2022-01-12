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

function getGenres() {
    $connection_manager = new DBAccess();
    $conn_ok = $connection_manager->openDBConnection();

    if($conn_ok) {
        $query = "SELECT id, name FROM Genre";
        $queryResults = $connection_manager->executeQuery($query);
        return $queryResults;
    }
}

function gameValidator($name, $description, $release_date, $developer, $game_img){
    $errors = "";

    if($name == '')
        $errors .= buildError('Name is required');

    if($description == '')
        $errors .= buildError('Description is required');

    if($release_date == '')
        $errors .= buildError('Release date is required');
    
    if($developer == '')
        $errors .= buildError('Software House / Developer is required');

    return $errors;
}

function storeGame(string $name, string $description, string $release_date, string $developer, $game_img, int $roleUser){
    // create a connection istance to talk with the db
    $connection_manager = new DBAccess();
    $conn_ok = $connection_manager->openDBConnection();
    
    if($conn_ok){
        if($roleUser == 1) {

            $validationErrors = gameValidator($name, $description, $release_date, $developer, $game_img);
            
            $name = $connection_manager->escape_string($name);
            $description = $connection_manager->escape_string($description);
            // SERVE VALIDARE LA DATA? L'INPUT FORZA IL FORMATO CORRETTAMENTE...
            $developer = $connection_manager->escape_string($developer);

            if(!$validationErrors){
    
                $insertQuery = "
                    INSERT INTO Game (name, description, release_date, developer, game_img)
                    VALUES ('$name', '$description', '$release_date', '$developer', '$game_img')
                ";
    
                $gameId = $connection_manager->executeQuery($insertQuery);
                if($gameId)
                    return $gameId;
                else
                    return buildError("There was an error during the insert of the game");
            }

            return $validationErrors;

        } else {
            return buildError("This user can't add games");
        }
    } else {
        return buildError("Internal server error");
    }
}

function storeGameGenre($game_id, $genre_id) {
    $connection_manager = new DBAccess();
    $conn_ok = $connection_manager->openDBConnection();

    if (!is_int($game_id)) 
        return buildError("Failed adding record: no game associated to genre_id.");

    if($conn_ok) {
        $query = "INSERT INTO game_genre (game_id, genre_id) VALUES ($game_id,$genre_id)";
        $queryResults = $connection_manager->executeQuery($query);
        return $queryResults;
    }
}

?>