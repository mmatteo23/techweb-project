<?php

require_once('php/db.php');

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
            $user_output .= '<div id="search-results">';
            foreach($articles as $art){
                $user_output .= 
                    '<a class="card-article-link" href="article.php?id='.$art['id'].'">
                    <article>
                        <div class="card-article-image">
                            <img src="images/article_covers/'.$art['cover_img'].'"/>
                        </div>
                        <div class="card-article-info">
                            <h3>'.$art['title'].'</h3>
                            <h4>'.$art['subtitle'].'</h4>
                            <p>'.$art['publication_date'].'</p>';
                if($tags){
                    $user_output .= '<ul id="card-article-tags" class="tag-list">';
                    foreach($tags as $tag){
                        if($tag['article_id']==$art['id']){
                            $user_output .= '<li class="tag">'.$tag['name'].'</li>';
                        }
                    }
                    $user_output .= '</ul>';
                }   
                $user_output .= '</div>
                </article>
                </a>';
            }        
            $user_output .= "</div>";
        }else{
            $user_output = "<p>It seems like you don't have any saved article, browse the <a href='index.php'>latest news</a> to find something you might like!</p>";
        }
    } else {
        $user_output = "<p>Something went wrong while connecting to the database, try again or contact us.</p>";
    }
    $htmlPage = file_get_contents("html/favorites.html");
    //header footer and dynamic navbar all at once (^^^ sostituisce il commento qua sopra ^^^)
    require_once('php/full_sec_loader.php');
    
    if($articles==null){
        $htmlPage =str_replace('<h1>Your favorite articles</h1>', '<h1>Something is missing!</h1>', $htmlPage);
    }
   

    //str_replace finale col conenuto specifico della pagina
    echo str_replace("<favArticles/>", $user_output, $htmlPage);

}else{
    $errorMessage = "<p>This page is only accessible while being logged in! Click <a href='login.php'>here</a> to log in</p>";
    require_once('error.php');
    $htmlPage = str_replace('<error/>', $errorMessage, $htmlPage);
}

?>