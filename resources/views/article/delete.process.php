<?php
require_once($_SERVER['DOCUMENT_ROOT']."/run-php-mysql/Autoload.php");
use \Services\ArticleService;
settype($_POST['id'], 'integer');

$articleService = new ArticleService();
try{
  $result = $articleService->deleteArticle($_POST['id']);
  if($result === false){
    echo 'Error';
    error_log(mysqli_error($conn));
    // print(mysqli_error($conn));
  } else {
    header('Location: http://localhost:3000/run-php-mysql/index.php');
    // header('Location: ../../../'.dirname($_SERVER["PHP_SELF"]).'/index.php');
    // http://localhost:3000/run-php-mysql/resources//run-php-mysql/resources/views/article/index.phpk
    // http://localhost:3000/run-php-mysql//run-php-mysql/resources/views/article/index.php
  }
}
catch(Exception $e){
  echo '<div>Message: ' .$e->getMessage().'</div>';
}

?>