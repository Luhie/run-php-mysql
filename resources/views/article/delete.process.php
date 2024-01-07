<?php
require_once($_SERVER['DOCUMENT_ROOT']."/run-php-mysql/Autoload.php");
use \Database\Connection;
$db = new Connection();
$conn = $db->initDBConfig();

settype($_POST['id'], 'integer');
$filtered = array(
  'id'=>mysqli_real_escape_string($conn, $_POST['id'])
);
$sql = "
  DELETE 
    FROM topic 
    WHERE id = {$filtered['id']}
";
// die($sql);
$result = mysqli_query($conn, $sql);
if($result === false){
  echo 'Error';
  error_log(mysqli_error($conn));
  // print(mysqli_error($conn));
} else {
  echo 'Success! DDDDDDD <a href="../../../index.php">HOME</a>';
}
?>