<?php
session_start();
require_once 'src/Model.php';

// データベースの接続情報
Model::setDbConf([
  'host'=>'mysql', 'user'=>'root','pass'=>'root','dbname'=>'pbl2025db'
]);

// 画面表示の共わない機能（header()による画面遷移時のエラーを避けるため）
$no_header_ouput = [
  'usr_logout', 'usr_check', 'usr_save',
];

$do = $_GET['do'] ?? 'rst_list';
if (in_array($do, $no_header_ouput)){
  include "src/{$do}.php";
}else{
  include("src/pg_header.php");
  include "src/{$do}.php";
  include "src/pg_footer.php";
}