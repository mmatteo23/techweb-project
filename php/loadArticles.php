<?php

function loadArticles($articles, $tags, int $from, int $to) {
    $user_output .= '
        <section id="latest-articles">
            <h1 class="subtitle">Latest articles</h1>';
    foreach(array_slice($articles, $from, $to) as $art){
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
    return $user_output;
}

?>