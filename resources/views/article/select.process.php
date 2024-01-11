<?php
require_once($_SERVER['DOCUMENT_ROOT']."/run-php-mysql/Autoload.php");
use \Services\ArticleService;
use \Services\AuthorService;

$articleService = new ArticleService();
$authorService = new AuthorService();

// article list
function getList(){
  $list = '';
  global $articleService;
  $row = $articleService->selectArticle();
  foreach($row as $values){
    $escaped_title = htmlspecialchars($values['title']);
    $list = $list."<li><a href=\"index.php?id={$values['id']}\">{$escaped_title}</a></li>";
  }
  return $list;
}
// article detail
function getDetail($id){
  global $articleService;
  $row = $articleService->selectArticleView($id);

  $article['title'] = htmlspecialchars($row['title']);
  $article['description'] = htmlspecialchars($row['description']);
  $article['name'] = htmlspecialchars($row['name']);

  return $article;
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