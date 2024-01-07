<?php
namespace Services;
use \Database\Connection;
use Exception;

class ArticleService{
  private $db;
  private $conn;
  function __construct()
  {
    $this->db = new Connection();
    $this->conn = $this->db->initDBConfig();
  }
  function createArticle($title, $description, $author_id)
  {
    $filtered = array(
      'title'=>mysqli_real_escape_string($this->conn, $title),
      'description'=>mysqli_real_escape_string($this->conn, $description),
      'author_id'=>mysqli_real_escape_string($this->conn, $author_id)
    );
    $sql = "
    INSERT INTO topic
      (title, description, created, author_id)
      VALUES(
        '{$filtered['title']}',
        '{$filtered['description']}',
        NOW(),
        '{$filtered['author_id']}'
      )
    ";
    $result = mysqli_query($this->conn, $sql);
    if($result === false) error_log(mysqli_error($this->conn)); 
    return $result;
  }
  function updateArticle($title, $description, $author_id)
  {
    $filtered = array(
      'title'=>mysqli_real_escape_string($this->conn, $title),
      'description'=>mysqli_real_escape_string($this->conn, $description),
      'author_id'=>mysqli_real_escape_string($this->conn, $author_id)
    );

    $sql = "
    UPDATE topic
      SET
        title = '{$filtered['title']}',
        description = '{$filtered['description']}'
      WHERE author_id = {$filtered['author_id']}
    ";
    $result = mysqli_query($this->conn, $sql);

  }
  function deleteArticle($id){
    try{
      $filtered_id = mysqli_real_escape_string($this->conn, $id);
      $sql = "
        DELETE 
        FROM topic 
        WHERE id = {$filtered_id}
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
}

?>