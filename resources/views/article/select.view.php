<?php
require("config/config.php");
require("lib/db.php");
$conn = db_init($config["host"], $config["db_user"], $config["db_pw"], $config["db_name"]);

echo '<h1>Single row</h1>';
$sql = "SELECT * FROM topic WHERE id = 11";
$result = mysqli_query($conn, $sql);
if($result){
  $row = mysqli_fetch_array($result);
  // print_r($row);
  echo '<h2>'.$row['title'].'</h2>';
  echo '<p>'.$row['description'].'</p>';
  // var_dump($result->num_rows);
}

echo '<h1>Multi row</h1>';
$sql = "SELECT * FROM topic";
$result = mysqli_query($conn, $sql);
if($result){
  while($row = mysqli_fetch_array($result)){
    echo '<h2>'.$row['title'].'</h2>';
    echo '<p>'.$row['description'].'</p>';
  }
}
?>