<?php
require_once 'Model.php'; 
$model = new User();

$user_id = $_POST['user_id'] ;  
$user_password = $_POST['user_password'];
$where = "user_id='{$user_id}' AND user_password='{$user_password}'";  
$user = $model->getDetail($where);
if ($user){ //Login succeeded
  $_SESSION['user_id']   = $user['user_id'];
  $_SESSION['user_name'] = $user['user_name'];
  $_SESSION['usertype_id'] = $user['usertype_id'];
  header('Location:index.php');   
}else{
  header('Location:?do=usr_login');   
}
