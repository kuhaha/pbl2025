<?php
require_once 'Model.php';
$codes = Model::getCodes('user_type');
$codes[0] = '全て';

$usertype_id = $_POST['usertype_id'] ?? 0;
$keyword = $_POST['keyword'] ?? '';

echo '<form action="?do=usr_list" method="post">';
echo 'キーワード:';
echo '<input type="text" name="keyword" value="'. $keyword. '">';
echo '<br>';
foreach ($codes as $role=>$name){
  $checked = ($role==$usertype_id)?' checked' : '';
  echo '<input type="radio" name="usertype_id" value="'. $role. '" '. $checked. '>' . $name;
}
echo '<input type="submit" value="検索">';
echo '</form>';
$where = '1';
if ($usertype_id != 0){
  $where .=" AND usertype_id={$usertype_id}";
}
if ( !empty($keyword) ) {
  $where .=" AND ( user_name LIKE '%$keyword%'";
  $where .=" OR user_id LIKE '%$keyword%')";
}