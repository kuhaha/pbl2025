<?php
require_once('Model.php');
$model = new User();

if ($_POST['user_password1']===$_POST['user_password2']){
  $data = [
    'user_id' =>  $_POST['user_id'],
    'usertype_id' => $_POST['usertype_id'],
    'user_name' => $_POST['user_name'],
    'user_password' => $_POST['user_password1'],
    'usertype_id' => $_POST['usertype_id'],
  ];
  $act = $_POST['act'] ?? 'update';      
  if ($act=='insert'){  
    $affected_rows = $model->insert($data);
  }else{
    $where = "user_id='{$user_id}'";
    $affected_rows = $model->update($data, $where);
  }
  if ($affected_rows > 0){
    echo "<h3>アカウントが更新されました</h3>";
  }else{
    echo "<h3>エラー：アカウント更新が失敗しました</h3>";
  }  
}else{
  echo '<h3>エラー：パスワードが一致しません</h3>';
}
