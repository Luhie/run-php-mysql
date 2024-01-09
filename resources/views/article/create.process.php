<?php
require_once($_SERVER['DOCUMENT_ROOT']."/run-php-mysql/Autoload.php");
use \Services\ArticleService;
$articleService = new ArticleService();
$result = $articleService->createArticle($_POST['title'], $_POST['description'],$_POST['author_id']);
if($result) {
  header("Location: http://localhost:3000/run-php-mysql/index.php");
}else{
  header("Location: http://localhost:3000/run-php-mysql/public/error.php");
}
?>