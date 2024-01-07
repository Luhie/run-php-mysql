<?php
namespace Config;
class DBConfig{
  private $host;
  private $user;
  private $password;
  private $name;

  function __construct()
  {
    $this->_init(); 
  }
  private function _init(){
    $this->host = getenv('DB_HOST');
    $this->user = getenv('DB_USER');
    $this->password = getenv('DB_PW');
    $this->name = getenv('DB_NAME');

  }

  function getHost()
  {
    return $this->host;
  }
  function getUser()
  {
    return $this->user;
  }
  function getPassword()
  {
    return $this->password;
  }
  function getName()
  {
    return $this->name;
  }
}
?>