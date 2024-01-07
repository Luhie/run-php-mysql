<?php
require_once($_SERVER['DOCUMENT_ROOT']."/run-php-mysql/Autoload.php");
use \Services\ArticleService;
$articleService = new ArticleService();

settype($_POST['id'], 'integer');
try{
  $result = $articleService->updateArticle($_POST['title'], $_POST['description'],$_POST['id']);
  if($result === false){
    echo 'Error';
    error_log(mysqli_error($conn));
    // print(mysqli_error($conn));
  } else {
    header('Location: http://localhost:3000/run-php-mysql/index.php');

  }
}
catch(Exception $e){
  echo '<div>Message: ' .$e->getMessage().'</div>';
}
?>