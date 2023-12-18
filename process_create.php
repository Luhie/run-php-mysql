<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  'nlnl',
  'opentutorials'
);
$filtered = array(
  'title'=>mysqli_real_escape_string($conn, $_POST['title']),
  'description'=>mysqli_real_escape_string($conn, $_POST['description'])
);
$sql = "
  INSERT INTO topic
    (title, description, created)
    VALUES(
      '{$filtered['title']}',
      '{$filtered['description']}',
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