<h3>アカウント一覧</h3>
<?php
require_once('Model.php');
$model = new User();

$where = '1';
include('usr_search.inc.php');

$orderby = "usertype_id, user_id";
$users = $model->getList($where, $orderby);
echo '<table border=1>';
foreach ($users as $row) {
  $user_id = $row['user_id'];
  echo '<tr>';
  echo '<td>' . $row['user_id'] . '</td>';
  echo '<td>' . $row['user_name']. '</td>';
  // echo '<td>' . $row['usertype_id']. '</td>';
  $code  = $row['usertype_id'];     // 数字のユーザ種別をで取得
  echo '<td>' . $model->getValue($code, 'user_type') . '</td>'; // ユーザ種別名を出力
  
  echo '<td><a href="?do=usr_detail&user_id='.$user_id.'">詳細</a></td>';  
  echo '<td><a href="?do=usr_add&user_id='.$user_id.'">編集</a></td>'; 
  echo '<td><a href="?do=usr_delete&user_id='.$user_id.'">削除</a></td>';  
  echo '</tr>';
}
echo '</table>';
