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
  $list = $list."<li><a href=\"index.php?id={$row['id']}\">{$row['title']}</a></li>";
  // $list = $list."<li>{$row['title']}</li>";
}



?>
<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" >
    <title>WEB</title>
</head>
<body>
  <h1>WEB</h1>
  <ol>
    <?=$list?>
  </ol>
  <a href="create.php">Create</a>
  <h2>Welcome</H2>
  Aliquip officia est aliquip occaecat dolore laborum aliquip duis excepteur ad voluptate labore quis aute. 
</body>
</html>
