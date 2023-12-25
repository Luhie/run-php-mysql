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
  'name'=>mysqli_real_escape_string($conn, $_POST['name']),
  'profile'=>mysqli_real_escape_string($conn, $_POST['profile'])
);

$sql = "
  INSERT INTO author
    (name, profile)
    VALUES(
      '{$filtered['name']}',
      '{$filtered['profile']}'
    )
";

$result = mysqli_query($conn, $sql);
if($result === false){
  echo 'Fail';
  error_log(mysqli_error($conn));
}else{
  // echo 'Success <a href="index.php">Go to Home</a>';
  header('Location: author.php');
}
/*
print_r($result);
1
*/
?>