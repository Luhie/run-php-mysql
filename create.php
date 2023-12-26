<?php 
require("config/config.php");
require("lib/db.php");
$conn = db_init($config["host"], $config["db_user"], $config["db_pw"], $config["db_name"]);

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

$sql = "SELECT * FROM author";
$result = mysqli_query($conn, $sql);
$select_form = '<select name="author_id">';
while($row = mysqli_fetch_array($result)){
  $select_form .= '<option value="'.$row['id'].'" >'.$row['name'].'</option>';
}
// $select_form = $select_form.'</select>';
$select_form .= '</select>';
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
  <form action="process_create.php" method="POST">
    <p><input type="text" name="title" placeholder="title"></p>
    <p><textarea name="description" placeholder="description"></textarea></p>
    <?=$select_form?>
    <p><input type="submit"></p>
  </form>
</body>
</html>