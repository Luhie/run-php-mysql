<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  'nlnl',
  'opentutorials'
);

settype($_POST['id'], 'integer');
$filtered = array(
  'title'=>mysqli_real_escape_string($conn, $_POST['title']),
  'description'=>mysqli_real_escape_string($conn, $_POST['description']),
  'id'=>mysqli_real_escape_string($conn, $_POST['id'])
);
$sql = "
  UPDATE topic
    SET
      title = '{$filtered['title']}',
      description = '{$filtered['description']}'
    WHERE id = {$filtered['id']}
  ";

$result = mysqli_query($conn, $sql);
if($result === false){
  echo 'Error';
  error_log(mysqli_error($conn));
} else {
  echo 'Success <a href="index.php">HOME</a>';
}
?>