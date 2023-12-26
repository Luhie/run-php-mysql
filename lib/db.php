<?php
  error_reporting(E_ALL);
  ini_set("display_errors", 1);
  
  function db_init($host, $db_user, $db_pw, $db_name){
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $link = mysqli_connect($host, $db_user, $db_pw);
    mysqli_select_db($link, $db_name);
    
    /* get the name of the current default database */
    $result = mysqli_query($link, "SELECT DATABASE()");
    $row = mysqli_fetch_row($result);
    printf("Default database is %s.\n", $row[0]);
    return $link;
  }


?>