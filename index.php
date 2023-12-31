<?php 
require_once('Autoload.php');
use \Database\Connection;
$db = new Connection();
$conn = $db->initDBConfig();

$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
$list = '';
while($row = mysqli_fetch_array($result)){
  $escaped_title = htmlspecialchars($row['title']);
  $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
}

$article = array(
  'title'=>'Welcome',
  'description'=>'Hello, Web'
);
$update_link = '';
$delete_link = '';
$author_link = '';
if(isset($_GET['id'])){
  $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
  $sql = "SELECT * FROM topic LEFT JOIN author ON topic.author_id = author.id WHERE topic.id={$filtered_id}";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $article['title'] = htmlspecialchars($row['title']);
  $article['description'] = htmlspecialchars($row['description']);
  $article['name'] = htmlspecialchars($row['name']);
  $update_link = '<a href="./resources/views/article/update.view.php?id='.$_GET['id'].'">update</a>';
  $delete_link = '
    <form action="./resources/views/article/delete.process.php" method="post">
      <input type="hidden" name="id" value="'.$_GET['id'].'">
      <input type="submit" value="delete">
    </form>
  ';
  $author_link = "<p>by {$article['name']}</p>";
}

?>
<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" >
    <title>WEB</title>
</head>
<body>
  <h1><a href="index.php">WEB</a></h1>
  <a href="./resources/views/author/index.php">author</a>
  <ol>
    <?=$list?>
  </ol>
  <p><a href="./resources/views/article/create.view.php">Create</a></p>
  <?=$update_link?>
  <?=$delete_link?>
  <h2><?=$article['title']?></H2>
  <?=$article['description']?>
  <?=$author_link?>
</body>
</html>
