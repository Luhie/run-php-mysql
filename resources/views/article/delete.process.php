<?php
require_once($_SERVER['DOCUMENT_ROOT']."/run-php-mysql/Autoload.php");
use \Services\ArticleService;
settype($_POST['id'], 'integer');

$articleService = new ArticleService();
try{
  $result = $articleService->deleteArticle($_POST['id']);
  if($result === false){
    header("Location: http://localhost:3000/run-php-mysql/public/error.php");
  } else {
    header('Location: http://localhost:3000/run-php-mysql/index.php');
  }
}
catch(Exception $e){
  echo '<div>Message: ' .$e->getMessage().'</div>';
}

?>