<h3>アカウント詳細</h3>
<?php 
require_once 'Model.php'; 
$model = new User();

$user_id  = $_GET['user_id']?? '';     // ユーザIDでユーザを特定
$where = "user_id='{$user_id}'";  
$user = $model->getDetail($where);
if ($user) {
    echo '<table border=1>';
    echo '<tr><th>ユーザID</th><td>' . $user['user_id'] . '</td></tr>';
    echo '<tr><th>ユーザ名</th><td>' . $user['user_name']. '</td></tr>';
    $code  = $user['usertype_id'];     // 数字のユーザ種別を取得
    echo '<tr><th>ユーザ種別</th><td>' . $model->getValue($code, 'user_type') . '</td></tr>';
    echo '</table>';
}else{
    echo '<h3>ユーザが見つかりませんでした！</h3>';
}
