<?php

require_once('utilityFunctions.php');
require_once('php/db.php');
use DB\DBAccess;


function validator($title, $subtitle, $article_text, $publication_date, $cover_img, $read_time){
    $errors = "";

    if($title == '')
        $errors .= buildError('Title is required');

    if($subtitle == '')
        $errors .= buildError('Subtitle is required');

    if($article_text == '')
        $errors .= buildError('Article text is required');
    elseif(strlen($article_text) < 100)
        $errors .= buildError('Article text must be at least 100 characters long');
    
    if($read_time <= 0)
        $errors .= buildError('Read time need to be a positive value');

    return $errors;
}

function store(string $title, string $subtitle, string $article_text, string $publication_date, $cover_img, string $read_time, $isApproved, string $author){
    // create a connection istance to talk with the db
    $connection_manager = new DBAccess();
    $conn_ok = $connection_manager->openDBConnection();
    
    if($conn_ok){
        if($connection_manager->getUserInfo($author)){      // this is a valid author

            $validationErrors = validator($title, $subtitle, $article_text, $publication_date, $cover_img, $read_time);
            if(!$validationErrors){
    
                $insertQuery = "
                    INSERT INTO Article (title, subtitle, text, publication_date, cover_img, read_time, is_approved, author)
                    VALUES ('$title', '$subtitle', '$article_text', $publication_date, NULL, $read_time, false, '$author')
                ";
    
                $articleId = $connection_manager->executeQuery($insertQuery);
                if($articleId)
                    return $articleId;
                else
                    return buildError("There was an error during the insert of the article");
            }

            return $validationErrors;

        } else {
            return buildError("This user can't write articles");
        }
    } else {
        return buildError("Internal server error");
    }
}


?>