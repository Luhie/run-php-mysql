<?php
require_once($_SERVER['DOCUMENT_ROOT']."/run-php-mysql/Autoload.php");
use \Services\AuthorService;

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  [
    'id' => $id
  ] = $_POST;
}
settype($id, 'integer');
try{
  $authorService = new AuthorService();
  $result = $authorService->deleteAuthor($id);

  if($result === false) {
    header("Location: http://localhost:3000/run-php-mysql/public/error.php");
  } else {
    header("Location: http://localhost:3000/run-php-mysql/resources/views/author/index.php");
  }
}catch(Exception $e){
  echo '<div>Message: ' .$e->getMessage().'</div>';
}
?>