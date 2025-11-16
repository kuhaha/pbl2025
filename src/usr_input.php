<?php
require_once('Model.php');
$model = new User();

$user_id = $_GET['user_id'] ?? ''; 
$codes = $model->getCodes('user_type');
$user = $model->getDetail("user_id='{$user_id}'");

if ($user) {
  $act = 'update';
}else{
  $act = 'insert';
  $user = [
    'user_id' => $user_id,'user_name' => '', 'user_password'=>'', 'usertype_id' => 1
  ];
}
?>
<h2>アカウント登録・編集</h2>
<form action="?do=usr_save" method="post">
<input type="hidden" name="act" value="<?=$act; ?>">
<table>
<tr><td>ユーザID：</td><td>
<?php
if ($act=='insert'){
  echo '<input type="text" name="user_id">';//テキストボックス
}else {
  $hidden = '<input type="hidden" name="user_id" value="%s"><b>%s</b>' . PHP_EOL;
  printf($hidden, $user_id, $user_id);//非表示送信
}
?>
</td></tr>
<tr><td>氏　名：</td><td>
  <input type="text" name="user_name"  value="<?=$user['user_name']?>">
</td></tr>
<tr><td>パスワード</td><td>
  <input type="password" name="user_password1">
</td></tr>
<tr><td>（再入力）</td><td>
  <input type="password" name="user_password2">
</td></tr>
<tr><td>ユーザ種別</td><td>
<?php
  foreach ($codes as $key => $value){
    $checked = $key==$user['usertype_id'] ? 'checked' : '';
    $input = '<input type="radio" name="usertype_id" value="%s" %s>%s' . PHP_EOL ;
    printf($input, $key, $checked, $value);
  }
?>  
</td></tr>
</table>
<input type="submit" value="登録">
<input type="reset" value="取消">
</form>