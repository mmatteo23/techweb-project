<?php

function loadArticles($articles, $tags, int $from, int $to) {
    foreach(array_slice($articles, $from, $to) as $art){
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
    return $user_output;
}

?>