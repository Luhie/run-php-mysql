<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/run-php-mysql/resources/views/author/select.process.php");
$table_form = getList();
$escaped = [
  'name' => '',
  'profile' => ''
];
$form_id='';
if(!isset($_GET['id'])){
  $lable_submit = 'Create Author';
  $form_action = 'create.process.php';
}else{
  ["id" => $id] = $_GET;
  $escaped = getDetail($id);
  $lable_submit = 'Update Author';
  $form_action = 'update.process.php';
  $form_id = '<input type="hidden" name="id" value='.$id.'">';
}
?>
<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" >
    <title>WEB</title>
</head>
<body>
  <h1><a href="../../../index.php">WEB</a></h1>
  <?=$table_form?>
  <hr />
  <form action="<?=$form_action?>" method="post" >
    <?=$form_id?>
    <p><input type="text" name="name" placeholder="name" value="<?=$escaped['name']?>"></p>
    <p><textarea name="profile" placeholder="profile" ><?=$escaped['profile']?></textarea></p>
    <p><input type="submit" value="<?=$lable_submit?>"></p>
  </form>
</body>
</html>
