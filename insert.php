<?php
require("config/config.php");
require("lib/db.php");
$conn = db_init($config["host"], $config["db_user"], $config["db_pw"], $config["db_name"]);

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

  // print_r($conn);

  $result = mysqli_query($conn, $sql);
  if($result === false){
    echo mysqli_erorr($conn);
  }else{
    echo "<script type='text/javascript'>alert('Success!')</script>";
  }

  mysqli_close($conn);
?> 