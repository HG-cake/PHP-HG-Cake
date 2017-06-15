<?php
require('../../include/common.inc.php');
checklogin();
$id=isset($_POST['id'])?html($_POST['id']):'';
$lm=isset($_POST['lm'])?html($_POST['lm']):'';
$title=isset($_POST['title'])?html($_POST['title']):'';
$pro_can1=isset($_POST['pro_can1'])?html($_POST['pro_can1']):'';
$pro_can2=isset($_POST['pro_can2'])?html($_POST['pro_can2']):'';
$pro_can3=isset($_POST['pro_can3'])?html($_POST['pro_can3']):'';
$pro_can4=isset($_POST['pro_can4'])?html($_POST['pro_can4']):'';
$f_body=isset($_POST['f_body'])?html($_POST['f_body']):'';
$z_body=isset($_POST['editorValue'])?$_POST['editorValue']:'';
$img_sl=isset($_POST['img_sl'])?html($_POST['img_sl']):'';
$px=isset($_POST['px'])?html($_POST['px']):'';
$url=isset($_POST['url'])?$_POST['url']:'default.php';

if ($id==''||!checknum($id)||$lm==''||!checknum($lm)||$title==''||$px==''||!checknum($px)){
	msg('参数错误');
}

$sql='update `'.$tablepre.'pro_co` set `lm`='.$lm.',`title`="'.$title.'",`pro_can1`="'.$pro_can1.'",`pro_can2`="'.$pro_can2.'",`pro_can3`="'.$pro_can3.'",`pro_can4`="'.$pro_can4.'",`f_body`="'.$f_body.'",`z_body`="'.$z_body.'",`img_sl`="'.$img_sl.'",`px`='.$px.' where `id`='.$id.'';
$db->execute($sql);
msg('保存成功','location="'.$url.'"');
?>