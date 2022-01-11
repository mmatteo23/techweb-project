<?php

require_once('php/db.php');
require_once('php/error_management.php');
session_start();
use DB\DBAccess;

// create a connection istance to talk with the db
$connection_manager = new DBAccess();
$conn_ok = $connection_manager->openDBConnection();

// variables
$user = "";
$user_output = "";  // html code to send to the page

if($conn_ok){
    $games = $connection_manager->getGames();
    if($games=="ErroreDB"){ 
        $connection_manager->closeDBConnection();
        $user_output = createEmptyDBErrorHTML("games");
    }
    else{
        $game_tags = $connection_manager->getGamesTags();
        $connection_manager->closeDBConnection();
        if($games != null){  // there's at least one game exists  
            $user_output .= '
                <h1>Search by games</h1>
                    <ul class="game-list" id="game-list">
                ';      
            $num_of_games = count($games);
            $x=0;
            for($i = 0; $i < $num_of_games; $i++){
                $game = $games[$i];            
                $user_output .= '<li class="card" id="'.$game['name'].'">
                <a tabindex="-1" href="search.php?game='.urlencode($game['name']).'"><img src="/images/games/' . $game['game_img'] . '" alt="' . $game['name'] . ' cover" class="card-img"></a>
                <div class="card-content">
                    <h2 class="card-title"><a href="search.php?game='.urlencode($game['name']).'" class="card-title-link">' . $game['name'] . '</a></h2>';
                    if($game_tags[$x]['game_id']==$game['id']){
                        $user_output .= '<ul class="tag-list">';
                        while(($game_tags[$x]['game_id'] == $game['id'])){
                            $user_output .= '<li class="tag"><a href="search.php?tag='.urlencode($game_tags[$x]['name']).'">'. $game_tags[$x]['name'] .'</a></li>';
                            $x++;                     
                        }
                        $user_output .= '</ul>';
                    }   
                    $user_output .= '</div></li>';
            }
            $user_output .= '</ul>';
        }
    }
} else { 
    $user_output = createDBErrorHTML();
}
// paginate the content
// page structure
$htmlPage = file_get_contents("html/games.html");

//header footer and dynamic navbar all at once
require_once('php/full_sec_loader.php');

//str_replace finale col conenuto specifico della pagina
echo str_replace('<content/>', $user_output, $htmlPage);

?>