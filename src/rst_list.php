<?php 
require_once 'Model.php';
$model = new Restaurant();

$restaurants = $model->getList();
$max_items = 3; // 一行の最大表示件数
$new_line = true;
echo '<h2>店舗一覧</h2>';
echo '<table>';
foreach ($restaurants as $i=>$rst){
  if ($new_line) echo '<tr>', PHP_EOL;
  $rst_id = $rst['rst_id'];
  $imgfile = "img/rst{$rst_id}_photo1.jpg";
  echo '<td>';
  printf('<a href="?do=rst_detail&rst_id=%d">', $rst_id);
  printf('<img src="%s" height="180">', $imgfile);
  echo '</a><br>店舗名：' . $rst['rst_name'];
  echo '</td>', PHP_EOL;
  $new_line  = ($i+1) % $max_items == 0;
  if ($new_line) echo '</tr>', PHP_EOL;
}
if (!$new_line) echo '</tr>', PHP_EOL;
echo '</table>';

