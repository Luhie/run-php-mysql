<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/run-php-mysql/resources/views/article/select.process.php");

$list = getList();
if(!isset($_GET['id'])){
  $article = [
    'title'=>'Welcome',
    'description'=>'Hello, Web'
  ];
  $update_link = '';
  $delete_link = '';
  $author_link = '';
}else{
  ["id" => $id] = $_GET;
  $article = getDetail($id);
  $update_link = '<a href="./resources/views/article/update.view.php?id='.$_GET['id'].'">update</a>';
  $delete_link = '
    <form action="./resources/views/article/delete.process.php" method="post">
      <input type="hidden" name="id" value="'.$id.'">
      <input type="submit" value="delete">
    </form>
  ';
  $author_link = "<p>by {$article['name']}</p>";
}

// article detail
?>
<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" >
    <title>WEB</title>
</head>
<body>
  <h1>
    <a href="index.php">WEB</a>
  </h1>
  <a href="./resources/views/author/index.php">author</a>
  <ol>
    <?=$list?>
  </ol>
  <p>
    <a href="./resources/views/article/create.view.php">Create</a>
  </p>
  <div>
    <?=$update_link?>
    <?=$delete_link?>
    <h2>
      Title: <?=$article['title']?>
    </H2>
    <?=$article['description']?>
    <?=$author_link?>
  </div>
</body>
</html>
