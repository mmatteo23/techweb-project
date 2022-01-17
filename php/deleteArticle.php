<?php

require_once('ArticleController.php');

$articleId=$_POST['deleteId'];
echo DeleteArticle($articleId);

?>