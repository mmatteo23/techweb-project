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
            $gioco = $games[$i];            
            $user_output .= '<li class="card">
            <a href=""><img src="/images/games/' . $gioco['game_img'] . '" alt="' . $gioco['name'] . ' cover" class="card-img"></a>
            <div class="card-content">
                <h2 class="card-title">' . $gioco['name'] . '</h2>
                    <ul class="tag-list">';
                $x = 0;
                $game_tag = $game_tags[$x];
                $found = false;
                while(($found == false) or ($game_tag['game_id'] == $gioco['id'])){
                    if($game_tag['game_id'] == $gioco['id']) {
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
$htmlPage = file_get_contents("html/categories.html");

// page header
$pageHeader = file_get_contents("html/components/header.html");

// page footer
$pageFooter = file_get_contents("html/components/footer.html");

// replace the placeholders
$htmlPage = str_replace('<pageHeader/>', $pageHeader, $htmlPage);
$htmlPage = str_replace('<pageFooter/>', $pageFooter, $htmlPage);
echo str_replace('<content/>', $user_output, $htmlPage);

?>