<?php 
$conn = mysqli_connect(
  'localhost',
  'root',
  'nlnl',
  'opentutorials'
);
$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
$list = '';
while($row = mysqli_fetch_array($result)){
  // <li><a href="index.php?id=19">MySQL</a></li>
  // $list = $list."<li><a href=\"index.php?id=19\">{$row['title']}</a></li>";
  $escaped_title = htmlspecialchars($row['title']);
  $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$escaped_title}</a></li>";
  // $list = $list."<li>{$row['title']}</li>";
}

$article = array(
  'title'=>'Welcome',
  'description'=>'Hello, Web'
);

if(isset($_GET['id'])){
  $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
  $sql = "SELECT * FROM topic WHERE id={$filtered_id}";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_array($result);
  $article['title'] = htmlspecialchars($row['title']);
  $article['description'] = htmlspecialchars($row['description']);
}
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
  <ol>
    <?=$list?>
  </ol>
  <a href="create.php">Create</a>
  <h2><?=$article['title']?></H2>
  <?=$article['description']?>
</body>
</html>
