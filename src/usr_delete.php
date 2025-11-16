<?php
require_once 'Model.php'; 
$model = new User();

if (isset($_GET['user_id'])){
  $user_id = $_GET['user_id'];
  echo "<h2>{$user_id}を本当に削除しますか?</h2>";
  echo '<a href="?do=usr_delete&user_id2='. $user_id . '">削除</a> | <a href="?do=usr_list">戻る</a>';
}else if (isset($_GET['user_id2'])){
   $user_id = $_GET['user_id2'];
   $model->delete("user_id='{$user_id}'");
  echo "<h2>ユーザ{$user_id}は削除されました。</h2>";
  echo '<a href="?do=usr_list">戻る</a>';
}else{
  echo '<h2>削除するユーザIDは与えられていません</h2>';
  echo '<a href="?do=usr_list">戻る</a>';
}
