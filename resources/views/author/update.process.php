<?php
require_once($_SERVER['DOCUMENT_ROOT']."/run-php-mysql/Autoload.php");
use \Services\AuthorService;

$authorService = new AuthorService();

settype($_POST['id'], 'integer');
[
  'id' => $id,
  'name' => $name,
  'profile' => $profile
] = $_POST;
try {
  $result = $authorService->updateAuthor($id, $name, $profile);
  if($result === false){
    header("Location: http://localhost:3000/run-php-mysql/public/error.php");
  } else {
    header("Location: http://localhost:3000/run-php-mysql/resources/views/author/index.php?id={$id}");
  }
} catch (Exception $e) {
  echo '<div>Message: ' .$e->getMessage().'</div>';
}
?>