<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/run-php-mysql/resources/views/article/select.process.php");

$list = getList();
$select_form = getAuthorList();
?>
<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" >
    <title>WEB</title>
</head>
<body>
  <h1><a href="../../../index.php">WEB</a></h1>
  <ol>
    <?=$list?>
  </ol>
  <form action="create.process.php" method="POST">
    <p><input type="text" name="title" placeholder="title"></p>
    <p><textarea name="description" placeholder="description"></textarea></p>
    <?=$select_form?>
    <p><input type="submit"></p>
  </form>
</body>
</html>