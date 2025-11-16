<?php
require_once 'Model.php';
$model = new Restaurant();

$rst_id = $_GET['rst_id'] ?? 0 ;
$rst = $model->getDetail("rst_id={$rst_id}");
if (!$rst){
    echo '<h3>エラー：店舗情報が見つかりません。</h3>';
    exit;
}
?>
<h3>店舗詳細</h3>
<img src="img/rst<?=$rst_id?>_photo1.jpg" height="280">
<h4>店舗名：</h4><?=$rst['rst_name']?>
<h4>店舗詳細：</h4><?=$rst['rst_info']?>
<h4>店舗住所：</h4><?=$rst['rst_address']?>
<iframe width="80%" height="500pt" frameborder="0" scrolling="no"
 src="https://maps.google.com/maps?output=embed&hl=ja&q=<?=$rst['rst_address']?>">
</iframe>
