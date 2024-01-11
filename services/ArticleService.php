<?php
namespace Services;
use \Database\Connection;
use Exception;

class ArticleService{
  private $db;
  private $conn;

  // init database
  function __construct(){
    $this->getConnect();
  }
  // create aticle
  function createArticle($title, $description, $author_id){
    $filtered = [
      'title'=>mysqli_real_escape_string($this->conn, $title),
      'description'=>mysqli_real_escape_string($this->conn, $description),
      'author_id'=>mysqli_real_escape_string($this->conn, $author_id)
    ];
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
  // update article
  function updateArticle($title, $description, $id){
    try{
      $filtered = array(
        'title'=>mysqli_real_escape_string($this->conn, $title),
        'description'=>mysqli_real_escape_string($this->conn, $description),
        'id'=>mysqli_real_escape_string($this->conn, $id)
      );

      $sql = "
      UPDATE topic
        SET
          title = '{$filtered['title']}',
          description = '{$filtered['description']}'
        WHERE id = {$filtered['id']}
      ";
      return mysqli_query($this->conn, $sql);
    }catch(Exception $e){
      throw new Exception($e->getMessage());
    }
    finally{
      mysqli_close($this->conn);
    }
  }

  // delete article
  function deleteArticle($id){
    try{
      $filtered_id = mysqli_real_escape_string($this->conn, $id);
      $sql = "
        DELETE 
        FROM topic 
        WHERE id = {$filtered_id}
      ";
      return mysqli_query($this->conn, $sql);
    }catch(Exception $e){
      throw new Exception($e->getMessage());
    }finally{
      mysqli_close($this->conn);
    }
  }

  // list 
  function selectArticle(){
    $sql = "SELECT * FROM topic";
    try{
      $result = mysqli_query($this->conn, $sql);
      $articleArray = [];
      while($row = mysqli_fetch_array($result)){
        array_push($articleArray, $row);
      }
      return $articleArray;
    }catch(Exception $e){
      throw new Exception($e->getMessage());
    }finally{
      mysqli_close($this->conn);
    }
  }
  
  // detail
  function selectArticleView($id){
    try{
      $this->getConnect();
      $filtered_id = mysqli_real_escape_string($this->conn, $id);
      $sql = "SELECT * FROM topic LEFT JOIN author ON topic.author_id = author.id WHERE topic.id={$filtered_id}";
      $result = mysqli_query($this->conn, $sql);
      return mysqli_fetch_array($result);
    }catch(Exception $e){
      throw new Exception($e->getMessage());
    }finally{
      mysqli_close($this->conn);
    }
  }

  private function getConnect(){
    $this->db = new Connection();
    $this->conn = $this->db->initDBConfig();
  }
}
?>