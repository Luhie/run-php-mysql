<?php
require_once($_SERVER['DOCUMENT_ROOT']."/run-php-mysql/Autoload.php");
use \Database\Connection;
$db = new Connection();
$conn = $db->initDBConfig();

settype($_POST['id'], 'integer');
$filtered = array(
  'id' => mysqli_real_escape_string($conn, $_POST['id']),
  'name' => mysqli_real_escape_string($conn, $_POST['name']),
  'profile' => mysqli_real_escape_string($conn, $_POST['profile'])
);

$sql = "
  UPDATE author
    SET
      name = '{$filtered['name']}',
      profile = '{$filtered['profile']}'
    WHERE
      id = '{$filtered['id']}'
"; 

$result = mysqli_query($conn, $sql);
if($result === false){
  echo 'err';
  error_log(mysqli_error($conn));
} else {
  header('location: index.php?id='.$filtered['id']);
}
?>