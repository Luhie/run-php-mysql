<?php
namespace Services;
use \Exception;
use \Database\Connection;

class AuthorService{
  private $db;
  private $conn;
  function __construct()
  {
    $this->db = new Connection();
    $this->conn = $this->db->initDBConfig();
  }
  function createAuthor($name, $profile)
  {
    try{
      $filtered = array(
        'name'=>mysqli_real_escape_string($this->conn, $name),
        'profile'=>mysqli_real_escape_string($this->conn, $profile)
      );
      $sql = "
      INSERT INTO author
        (name, profile)
        VALUES(
          '{$filtered['name']}',
          '{$filtered['profile']}'
        )
      ";
      return mysqli_query($this->conn, $sql);

    }
    catch(Exception $e){
      throw new Exception($e->getMessage());
    }
    finally{
      $this->conn->close();
    }
  }
  function updateAuthor($id, $name, $profile)
  {
    try{
      $filtered = [
        'id' => mysqli_real_escape_string($this->conn, $id),
        'name' => mysqli_real_escape_string($this->conn, $name),
        'profile' => mysqli_real_escape_string($this->conn, $profile)
      ];

      $sql = "
        UPDATE author
          SET
            name = '{$filtered['name']}',
            profile = '{$filtered['profile']}'
          WHERE
            id = '{$filtered['id']}'
      "; 
      return mysqli_query($this->conn, $sql);
    }catch(Exception $e){
      throw new Exception($e->getMessage());
    }finally{
      $this->conn->close();
    }
  }
  function deleteAuthor($id)
  {
    $id = mysqli_real_escape_string($this->conn, $id);
    $sql_topic = "
      DELETE 
        FROM topic
        WHERE author_id = {$id}
    ";
    $sql_author = "
      DELETE
        FROM author
        WHERE id = {$id}
    ";
    try{

      mysqli_autocommit($this->conn,FALSE);
      mysqli_query($this->conn, $sql_topic);
      mysqli_query($this->conn, $sql_author);
      if (!mysqli_commit($this->conn)){
        echo "fail";
        exit();
      }

      return mysqli_rollback($this->conn);
      // return mysqli_query($this->conn, $sql);
    }catch(Exception $e){
      throw new Exception($e->getMessage());
    }finally{
      $this->conn->close();
    }

  }
}

?>