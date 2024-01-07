<?php
namespace Database;
use \Config\DBConfig;
class Connection {
  function initDBConfig(){
    // require_once(__DIR__.'/config/config.php');
    // $url = $_SERVER["DOCUMENT_ROOT"]."/run-php-mysql/config/config.php";
    // require_once($url);

    $config = new DBConfig();
    mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

    $link = mysqli_connect($config->getHost(), $config->getUser(), $config->getPassword());
    mysqli_select_db($link, $config->getName());
    
    /* get the name of the current default database */
    $result = mysqli_query($link, "SELECT DATABASE()");
    $row = mysqli_fetch_row($result);
    printf("Default database is %s.\n", $row[0]);
    return $link;
  }
}
?>