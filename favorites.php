<?php

require_once('php/db.php');
require_once('php/error_management.php');

$htmlPage = file_get_contents("html/favorites.html");
//header footer and dynamic navbar all at once (^^^ sostituisce il commento qua sopra ^^^)
require_once('php/full_sec_loader.php');

session_start();
use DB\DBAccess;

// prendere il risultato dal DB
$connection_manager = new DBAccess();

$connection = $connection_manager->openDBConnection();
$user_output = "";

if(isset($_SESSION['username'])){
    if($connection){
        $articles = $connection_manager->getFavArticles($_SESSION['username']);
        $tags = $connection_manager->getFavArticlesTags($_SESSION['username']);
        $connection_manager->closeDBConnection();   //ho finito di usare il db quindi chiudo la connessione
        if($articles){
            $user_output .= '<section id="search-results"><h1>Your favorite articles</h1>';
            foreach($articles as $art){
                $user_output .= 
                    '<a class="card-article-link" href="article.php?id='.$art['id'].'">
                    <article>
                        <div class="card-article-image">
                            <img src="images/article_covers/'.$art['cover_img'].'" alt="' . $art['alt_cover_img'] . '"/>
                        </div>
                        <div class="card-article-info">
                            <h3>'.$art['title'].'</h3>
                            <h4>'.$art['subtitle'].'</h4>
                            <p>'.$art['publication_date'].'</p>';
                $user_output .= '<ul class="tag-list card-article-tags">
                                    <li class="tag game-tag">'.$art['game'].'</li>';
                if($tags){
                    foreach($tags as $tag){
                        if($tag['article_id']==$art['id']){
                            $user_output .= '<li class="tag">'.$tag['name'].'</li>';
                        }
                    }
                }   
                $user_output .= '</ul>';
                $user_output .= '</div>
                </article>
                </a>';
            }        
            $user_output .= "</section>";
        }else{
            $user_output = genericErrorHTML("No saved articles found on this account", "Browse <a href='index.php'>our home</a> and find some worth saving.");
        }
    } else {
        $user_output = createDBErrorHTML();
    }   

    //str_replace finale col conenuto specifico della pagina
    $htmlPage = str_replace("<favArticles/>", $user_output, $htmlPage);

}else{
    $errorMessage = genericErrorHTML(
        "Whoooops! Seems like you are not logged in!", 
        "<p>This page is only accessible while being logged in! Click <a href='login.php'>here</a> to log in</p>"
    );
    $htmlPage = str_replace('<favArticles/>', $errorMessage, $htmlPage);
}

echo $htmlPage;
?>