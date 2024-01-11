<?php
require_once($_SERVER['DOCUMENT_ROOT']."/run-php-mysql/Autoload.php");
use \Services\AuthorService;

$authorService = new AuthorService();

// author list
function getList(){
  // $table_form ='';
  $table_form ='
    <table border="1">
      <tr>
        <td>id</td>
        <td>name</td>
        <td>profile</td>
        <?=$table_form?>
  ';
  global $authorService;
  $result = $authorService->selectAuthor();
  foreach($result as $values){
    $filtered = [
      'id'=>htmlspecialchars($values['id']),
      'name'=>htmlspecialchars($values['name']),
      'profile'=>htmlspecialchars($values['profile']),
    ];
    $table_form .= '<tr>';
    $table_form .= '<td>'.$filtered["id"].'</td>';
    $table_form .= '<td>'.$filtered["name"].'</td>';
    $table_form .= '<td>'.$filtered["profile"].'</td>';
    $table_form .= '<td><a href="index.php?id='.$filtered["id"].'">update</a></td>';
    $table_form .= '<td>
      <form action="delete.process.php" method="post" onsubmit="if(!confirm(\'sure?\')){return false;}">
        <input type="hidden" name="id" value="'.$filtered["id"].'">
        <input type="submit" value="delete">
      </form>
    </td>';
    $table_form .= '</tr>';
  }
  $table_form .= '</tr></table>';
  return $table_form;
}
// article detail
function getDetail($id){
  global $authorService;
  $row = $authorService->selectAuthorDetail($id);
  $escaped['name'] = htmlspecialchars($row['name']);
  $escaped['profile'] = htmlspecialchars($row['profile']);

  return $escaped;
}

function getAuthorList(){
  global $authorService;
  $row = $authorService->selectAuthor();
  $select_form = '<select name="author_id">';
  foreach($row as $values){
    $select_form .= '<option value="'.$values['id'].'">'.$values['name'].'</option>';
  }
  return $select_form .= '</select>';
}
?>