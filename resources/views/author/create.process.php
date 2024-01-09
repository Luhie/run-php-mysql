<?php
require_once($_SERVER['DOCUMENT_ROOT']."/run-php-mysql/Autoload.php");
use \Services\AuthorService;
$authorService = new AuthorService();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  [
    'name' => $name, 
    'profile' => $profile
  ] = $_POST;
}
try
{
  $result = $authorService->createAuthor($name, $profile);
  if($result === false){
    header("Location: http://localhost:3000/run-php-mysql/public/error.php");
  } else {
    header("Location: http://localhost:3000/run-php-mysql/resources/views/author/index.php");
  }
}
catch(Exception $e){
  echo '<div>Message: ' .$e->getMessage().'</div>';
}
?>