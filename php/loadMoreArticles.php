<?php

require_once('db.php');
require_once('loadArticles.php');

session_start();
use DB\DBAccess;

// prendere il risultato dal DB
$db = new DBAccess();

$connection = $db->openDBConnection();

if($connection){
    $lastArticle=$_POST['lastArticle'];
    $articles = $db->getTopArticles(6, $lastArticle);
    $tags = $db->getTopArticleTags(5, $lastArticle);
    $user_output="";
    if($articles && count($articles)!=0){
        foreach(array_slice($articles, 0, 5) as $art){
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
    } 
    if(count($articles)>5){
        $lastArticleLoaded=$lastArticle+count($articles);
        $user_output.='<button class="action-button" id="more-articles" type="button" onClick=loadMore('.$lastArticleLoaded.')>Load more</button></div>';
    }
    else{
        $user_output .='<p id="all-the-articles">These are all the articles</p>';
    }
    echo($user_output);
}

?>