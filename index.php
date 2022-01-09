<?php

require_once('php/db.php');
require_once('php/loadArticles.php');

session_start();
use DB\DBAccess;

// prendere il risultato dal DB
$db = new DBAccess();

$connection = $db->openDBConnection();
$user_output = "";
$slides = array();

$limitArticles = 5;
$articlesToLoad = 5;
$lastArticleLoaded = 0;

if($connection){
    $nArticles=5;
    if(isset($_COOKIE['lastArticleLoaded'])){
        $nArticles = $_COOKIE['lastArticleLoaded'] + $articlesToLoad;
    }
    $articles = $db->getTopArticles($nArticles);
    $nArticles = count($articles);                       //anche se il LIMIT della query è nArticles potrebbero essercene di meno nel db
    $tags = $db->getTopArticleTags($nArticles);
    $MostLiked = $db->getMostLikedArticles();
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
                <article>
                    <div class="card-article-image">
                        <img src="images/article_covers/'.$art['cover_img'].'"/>
                    </div>
                    <div class="card-article-info">
                        <h3>'.$art['title'].'</h3>
                        <h4>'.$art['subtitle'].'</h4>
                        <p>'.$art['publication_date'].'</p>';
            $intro=true;
            foreach($CarouselTags[$art['id']] as $tag){
                if($intro){
                    $HTMLSlide .= '<ul id="card-article-tags" class="tag-list">';
                    $intro=false;
                }
                $HTMLSlide .= '<li class="tag">'.$tag['name'].'</li>';
            }
            if(!$intro)
                $HTMLSlide .= '</ul>';
            $HTMLSlide .= '</div>
                                </article>
                                </a>';
            array_push($slides, $HTMLSlide);
        }
    }
} else {
    $user_output = "<p>Something went wrong while loading the page, try again or contact us.</p>";
}

// impaginarlo
/*
$pageHeader = file_get_contents("html/components/header.html");
$pageFooter = file_get_contents("html/components/footer.html");
$htmlPage = file_get_contents("html/home.html");

$htmlPage = str_replace("<AllArticles/>", $user_output, $htmlPage);
$htmlPage = str_replace('<pageHeader/>', $pageHeader, $htmlPage);
echo str_replace('<pageFooter/>', $pageFooter, $htmlPage);
*/

$htmlPage = file_get_contents("html/home.html");

//header footer and dynamic navbar all at once (^^^ sostituisce il commento qua sopra ^^^)
require_once('php/full_sec_loader.php');

//str_replace per il carousel
$carousel="";
if(count($slides)>0){
    $carousel=' <h1 class="subtitle">Most liked articles</h1>
                    <div class="slider">
                        <div class="slides">';
    $i=1;
    foreach($slides as $art){
        if($art!=""){
            $carousel .= '<div id="slide-'.$i.'">'.$art.'</div>';
            $i++;
        }
    }
    $carousel .= '</div></div>';
}

$loadMoreArticles='<button id="more-articles" type="button" onClick=loadMore('.$lastArticleLoaded.')>More Articles</button>';

$htmlPage = str_replace("<carousel/>", $carousel, $htmlPage);
$htmlPage = str_replace("<AllArticles/>", $user_output, $htmlPage);
$htmlPage = str_replace("<loadMoreArticles/>", $loadMoreArticles, $htmlPage);

echo $htmlPage;

?>