<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 1);

  $sql = "
      INSERt INTO topic (
      title,
      description,
      created
    ) VALUES (
      'MySQL',
      'MySQL is ....',
      NOW()
    )";

  $conn = mysqli_connect("localhost", "root", "nlnl", "opentutorials");

  // print_r($conn);

  $result = mysqli_query($conn, $sql);
  if($result === false){
    echo mysqli_erorr($conn);
  }else{
    echo "<script type='text/javascript'>alert('Success!')</script>";
  }

  mysqli_close($conn);
?> 