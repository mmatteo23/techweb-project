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
        //echo print_r($games);
        for($i = 0; $i < 11; $i++){
            $game = $games[$i];            
            $user_output .= '<li class="card" id="'.$game['name'].'">
            <a href=""><img src="/images/games/' . $game['game_img'] . '" alt="' . $game['name'] . ' cover" class="card-img"></a>
            <div class="card-content">
                <h2 class="card-title">' . $game['name'] . '</h2>
                    <ul class="tag-list">';
                $x = 0;
                $game_tag = $game_tags[$x];
                $found = false;
                while(($found == false) or ($game_tag['game_id'] == $game['id'])){
                    if($game_tag['game_id'] == $game['id']) {
                        $found = true;
                        $user_output .= '<li class="tag">'. $game_tag['name'] .'</li>';
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

// // page header
// $pageHeader = file_get_contents("html/components/header.html");

// // page footer
// $pageFooter = file_get_contents("html/components/footer.html");

// // replace the placeholders
// $htmlPage = str_replace('<pageHeader/>', $pageHeader, $htmlPage);
// $htmlPage = str_replace('<pageFooter/>', $pageFooter, $htmlPage);

//header footer and dynamic navbar all at once (^^^ sostituisce il commento qua sopra ^^^)
require_once('php/full_sec_loader.php');

//str_replace finale col conenuto specifico della pagina
echo str_replace('<content/>', $user_output, $htmlPage);

?>