<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  'nlnl',
  'opentutorials'
);

$sql = "
  INSERT INTO topic
    (title, description, created)
    VALUES(
      '{$_POST["title"]}',
      '{$_POST["description"]}',
      NOW()
    )
  ";

$result = mysqli_query($conn, $sql);
if($result === false){
  echo 'Error';
  error_log(mysqli_error($conn));
} else {
  echo 'Success <a href="index.php">HOME</a>';
}
?>