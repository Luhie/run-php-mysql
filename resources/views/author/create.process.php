<?php
require_once($_SERVER['DOCUMENT_ROOT']."/run-php-mysql/Autoload.php");
use \Database\Connection;
$db = new Connection();
$conn = $db->initDBConfig();

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
  header('Location: index.php');
}
/*
print_r($result);
1
*/
?>