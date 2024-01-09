<?php
require_once($_SERVER['DOCUMENT_ROOT']."/run-php-mysql/Autoload.php");
use \Services\ArticleService;
$articleService = new ArticleService();

settype($_POST['id'], 'integer');
try{
  $result = $articleService->updateArticle($_POST['title'], $_POST['description'],$_POST['id']);
  if($result === false){
    header("Location: http://localhost:3000/run-php-mysql/public/error.php");
  } else {
    header("Location: http://localhost:3000/run-php-mysql/resources/views/article/update.view.php?id={$_POST['id']}");
  }
}
catch(Exception $e){
  echo '<div>Message: ' .$e->getMessage().'</div>';
}
?>