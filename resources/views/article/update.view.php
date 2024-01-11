<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/run-php-mysql/resources/views/article/select.process.php");
// require_once($_SERVER['DOCUMENT_ROOT']."/run-php-mysql/Autoload.php");

// article list
$list = getList();
if(!isset($_GET['id'])){
  $article = [
    'title'=>'Welcome',
    'description'=>'Hello, Web'
  ];
  $update_link = '';
}else{
  ["id" => $id] = $_GET;
  $article = getDetail($id);
  $update_link = '<a href="update.php?id='.$id.'">update</a>'; 
}
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
  <form action="update.process.php" method="POST">
    <input type="hidden" name="id" value="<?=$id?>">
    <p><input type="text" name="title" placeholder='title' value="<?=$article['title']?>"></p>
    <p><textarea name="description" placeholder='description'><?=$article['description']?></textarea></p>
    <p><input type="submit"></p>
  </form>
</body>
</html>