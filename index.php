<?php

require_once('php/db.php');
require_once('php/loadArticles.php');
require_once('php/error_management.php');

session_start();
use DB\DBAccess;

// prendere il risultato dal DB
$db = new DBAccess();

$connection = $db->openDBConnection();
$user_output = "";
$carousel="";
$slides = array();

$articlesToLoad = 5;
$lastArticleLoaded = 0;

if($connection){
    $nArticles=10;

    $articles = $db->getTopArticles($nArticles);
    if($articles=="ErroreDB"){ 
        $db->closeDBConnection();
        $user_output = createEmptyDBErrorHTML("articles");
    }
    else{
        $nArticles = count($articles);                       //anche se il LIMIT della query è nArticles potrebbero essercene di meno nel db
        $tags = $db->getTopArticleTags($nArticles);
        $MostLiked = $db->getMostLikedArticles();
        $HotGames = $db->getHotGames();
        if($MostLiked)
            $CarouselTags = $db->getCarouselTags($MostLiked);
        $db->closeDBConnection();   //ho finito di usare il db quindi chiudo la connessione
        if($articles){
            $user_output = loadArticles($articles, $tags, 0, $nArticles);
            $lastArticleLoaded = $nArticles;
        }
        if($MostLiked){
            foreach($MostLiked as $art){
                $HTMLSlide="";
                $HTMLSlide = 
                    '<a class="card-article-link" href="article.php?id='.$art['id'].'">
                        <div class="card-article-image">
                            <img src="images/article_covers/'.$art['cover_img'].'" alt="' . $art['alt_cover_img'] . '"/>
                        </div>
                        <div class="card-article-info">
                            <h3>'.$art['title'].'</h3>
                            <h4>'.$art['subtitle'].'</h4>
                            <p>'.$art['publication_date'].'</p>';
                $HTMLSlide .= '<ul class="tag-list card-article-tags">
                                    <li class="tag game-tag">'.$art['game'].'</li>';
                if($CarouselTags[$art['id']]){
                    foreach($CarouselTags[$art['id']] as $tag){
                        $HTMLSlide .= '<li class="tag">'.$tag['name'].'</li>';
                    }
                }
                $HTMLSlide .= '</ul>';
                $HTMLSlide .= '</div>
                                    </a>';
                array_push($slides, $HTMLSlide);
            }
        }
        if(isset($HotGames) && $HotGames) {
            $HotGamesHTML = '
            <section id="hot-games">
                <h2 class="subtitle">Hot Games</h2>
                <ul class="game-list" id="game-list">';
            for($i = 0; $i < count($HotGames); $i++){
                $game = $HotGames[$i];            
                $HotGamesHTML .= '<li class="card" id="game_'.$game['id'].'">
                <a tabindex="-1" href="search.php?game='.urlencode($game['name']).'"><img src="/images/games/' . $game['img'] . '" alt="' . $game['name'] . ' cover" class="card-img"></a>
                <div class="card-content">
                    <h2 class="card-title"><a href="search.php?game='.urlencode($game['name']).'" class="card-title-link">' . $game['name'] . '</a></h2>';
                    $HotGamesHTML .= '</div>
                            </li>';
            }
            $HotGamesHTML .= '</ul></section>';
        }
        //str_replace per il carousel
        if(count($slides)>0){
            $carousel=' 
                <aside class="slider">
                    <h2 class="subtitle">Most liked</h2>
                        <div class="slides">';
            $i=1;
            foreach($slides as $art){
                if($art!=""){
                    $carousel .= '<article id="slide-'.$i.'">'.$art.'</article>';
                    $i++;
                }
            }
            $carousel .= '</div>' . $HotGamesHTML . '</aside>';
        }
        $user_output.='<button class="action-button" id="more-articles" type="button" onClick=loadMore('.$lastArticleLoaded.')>Load more</button></section>';
    }      
} else {
    $user_output = createDBErrorHTML();
}

$htmlPage = file_get_contents("html/home.html");

//header footer and dynamic navbar all at once (^^^ sostituisce il commento qua sopra ^^^)
require_once('php/full_sec_loader.php');

$htmlPage = str_replace("<carousel/>", $carousel, $htmlPage);
$htmlPage = str_replace("<AllArticles/>", $user_output, $htmlPage);

echo $htmlPage;

?>