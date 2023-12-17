<?php
  $conn = mysqli_connect("localhost", "root", "nlnl", "opentutorials");
  mysqli_query($conn, "
    INSERT INTO topic (
      title,
      description,
      created
    ) VALUES (
      'MySQL',
      'MySQL is ....',
      NOW()
    )");
?>