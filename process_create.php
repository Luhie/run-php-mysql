<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 1);
$conn = mysqli_connect(
  'localhost',
  'root',
  'nlnl',
  'opentutorials'
);
$filtered = array(
  'title'=>mysqli_real_escape_string($conn, $_POST['title']),
  'description'=>mysqli_real_escape_string($conn, $_POST['description']),
  'author_id'=>mysqli_real_escape_string($conn, $_POST['author_id'])
);
print_r($filtered['author_id']);
$sql = "
  INSERT INTO topic
    (title, description, created, author_id)
    VALUES(
      '{$filtered['title']}',
      '{$filtered['description']}',
      NOW(),
      '{$filtered['author_id']}'
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