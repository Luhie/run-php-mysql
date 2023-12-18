<?php
$conn = mysqli_connect(
  'localhost',
  'root',
  'nlnl',
  'opentutorials'
);

$sql = "SELECT * FROM topic WHERE id = 11";
$result = mysqli_query($conn, $sql);
if($result){
  $row = mysqli_fetch_array($result);
  // print_r($row);
  echo '<h1>'.$row['title'].'</h1>';
  echo '<p>'.$row['description'].'</p>';
  
  // var_dump($result->num_rows);
}
?>