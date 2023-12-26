<?php
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
  // DB 연결
  $conn = mysqli_connect('localhost', 'root', 'nlnl', 'opentutorials');
  
  // 인자 확인
  settype($_POST['id'], 'integer');
  $filtered = array(
    'id' =>mysqli_real_escape_string($conn, $_POST['id'])
  );
  
  $sql = "
    DELETE 
      FROM topic
      WHERE author_id = {$filtered['id']}
  ";

  mysqli_query($conn, $sql);

  $sql = "
    DELETE
      FROM author
      WHERE id = {$filtered['id']}
  ";

  // die($sql);
  $result = mysqli_query($conn, $sql);
  var_dump($result);

  if($result === false) {
    echo 'err';
    error_log(mysqli_error($conn));
  } else {
    header('location: author.php');
  }


?>