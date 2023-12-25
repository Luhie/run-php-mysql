<?php
$conn = mysqli_connect('localhost','root','nlnl', 'opentutorials');

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
  header('location: author.php?id='.$filtered['id']);
}
?>