<?php
namespace Services;
use \Database\Connection;

class ArticleService{
  function createArticle($title, $description, $author_id)
  {
    $db = new Connection();
    $conn = $db->initDBConfig();
    $filtered = array(
      'title'=>mysqli_real_escape_string($conn, $title),
      'description'=>mysqli_real_escape_string($conn, $description),
      'author_id'=>mysqli_real_escape_string($conn, $author_id)
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
    $result = mysqli_query($conn, $sql);
    if($result === false) error_log(mysqli_error($conn)); 
    return $result;
  }
  function updateArticle()
  {

  }
}

?>