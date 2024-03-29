<?php 
require_once($_SERVER["DOCUMENT_ROOT"]."/run-php-mysql/resources/views/author/select.process.php");
require_once($_SERVER['DOCUMENT_ROOT']."/run-php-mysql/Autoload.php");
use \Database\Connection;
$db = new Connection();
$conn = $db->initDBConfig();
?>
<!DOCTYPE html>
<html lang="ko">
  <head>
    <meta charset="UTF-8" >
    <title>WEB</title>
</head>
<body>
  <h1><a href="../../../index.php">WEB</a></h1>
  <table border="1">
    <tr>
      <td>id</td>
      <td>name</td>
      <td>profile</td>
      <?php 
        $sql = "SELECT * FROM author";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_array($result)){
          $filtered = array(
            'id'=>htmlspecialchars($row['id']),
            'name'=>htmlspecialchars($row['name']),
            'profile'=>htmlspecialchars($row['profile']),
          )
          ?>
          <tr>
            <td><?=$filtered['id']?></td>
            <td><?=$filtered['name']?></td>
            <td><?=$filtered['profile']?></td>
            <td><a href="index.php?id=<?=$filtered['id']?>">update</a></td>
            <td>
            <form action="delete.process.php" method="post" onsubmit="if(!confirm('sure?')){return false;}">
              <input type="hidden" name="id" value="<?=$filtered['id']?>">
              <input type="submit" value="delete">
            </form>
            </td>
          </tr>
          <?php
        }
      ?>
    </tr>
  </table>
  <?php 
  $escaped = array(
    'name' => '',
    'profile' => ''
  );
  $lable_submit = 'Create Author';
  $form_action = 'create.process.php';
  $form_id='';
  if(isset($_GET['id'])){
    $filtered_id = mysqli_real_escape_string($conn, $_GET['id']);
    // echo gettype($filtered_id);
    settype($filtered_id, 'integer');
    $sql = "SELECT * FROM author WHERE id=$filtered_id";
    // echo $sql;
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result);
    $escaped['name'] = htmlspecialchars($row['name']);
    $escaped['profile'] = htmlspecialchars($row['profile']);
    $lable_submit = 'Update Author';
    $form_action = 'update.process.php';
    $form_id = '<input type="hidden" name="id" value='.$_GET['id'].'">';
  }
  ?>
  <form action="<?=$form_action?>" method="post" >
    <?=$form_id?>
    <p><input type="text" name="name" placeholder="name" value="<?=$escaped['name']?>"></p>
    <p><textarea name="profile" placeholder="profile" ><?=$escaped['profile']?></textarea></p>
    <p><input type="submit" value="<?=$lable_submit?>"></p>
  </form>
</body>
</html>
