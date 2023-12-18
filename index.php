<?php 
$conn = mysqli_connect(
  'localhost',
  'root',
  'nlnl',
  'opentutorials'
);
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
    <?php 
      $sql = "SELECT * FROM topic";
      $result = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_array($result)){
        // echo '<li>'.$row['title'].'</li>';
        echo "<li>{$row['title']}</li>";
      }
    ?>
  </ol>
  <a href="create.php">Create</a>
  <h2>Welcome</H2>
  Aliquip officia est aliquip occaecat dolore laborum aliquip duis excepteur ad voluptate labore quis aute. 
</body>
</html>
