<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  'nlnl',
  'opentutorials'
);

$sql = "SELECT * FROM topic LIMIT 1000";
$result = mysqli_query($conn, $sql);
if($result){
  var_dump($result->num_rows);
}
?>