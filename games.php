<?php

require_once('php/db.php');
use DB\DBAccess;

// create a connection istance to talk with the db
$connection_manager = new DBAccess();
$conn_ok = $connection_manager->openDBConnection();

// variables
$user = "";
$user_output = "";  // html code to send to the page

if($conn_ok){
    $games = $connection_manager->getGames();
    $game_tags = $connection_manager->getGamesTags();
    $connection_manager->closeDBConnection();
    if($games != null){  // there's at least one game exists        
        $num_of_games = count($games);
        for($i = 0; $i < $num_of_games; $i++){
            $game = $games[$i];            
            $user_output .= '<li class="card" id="'.$game['name'].'">
            <a href="search.php?game='.urlencode($game['name']).'"><img src="/images/games/' . $game['game_img'] . '" alt="' . $game['name'] . ' cover" class="card-img"></a>
            <div class="card-content">
                <h2 class="card-title"><a href="search.php?game='.urlencode($game['name']).'" class="card-title-link">' . $game['name'] . '</a></h2>
                    <ul class="tag-list">';
                $x = 0;
                $game_tag = $game_tags[$x];
                $found = false;
                while(($found == false) or ($game_tag['game_id'] == $game['id'])){
                    if($game_tag['game_id'] == $game['id']) {
                        $found = true;
                        $user_output .= '<li class="tag"><a href="search.php?tag='.urlencode($game_tag['name']).'">'. $game_tag['name'] .'</a></li>';
                    }
                    $x++;
                    $game_tag = $game_tags[$x];                        
                }
                $user_output .= '</ul>
                            </div>
                        </li>';
        }
    }
} else { 
    $user_output = "<p>Something went wrong while loading the page, try again.</p>";
}
// paginate the content
// page structure
$htmlPage = file_get_contents("html/games.html");

//header footer and dynamic navbar all at once
require_once('php/full_sec_loader.php');

//str_replace finale col conenuto specifico della pagina
echo str_replace('<content/>', $user_output, $htmlPage);

?>