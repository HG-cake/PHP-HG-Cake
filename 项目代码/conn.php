<?php 
require('include/common.inc.php');
$site_title='';
$site_key='';
$site_des='';
$sql='select * from setup where id=1';
$res=$db->query($sql);
if($rsk=$db->getrow($res)){
	$site_title=$rsk['site_title'];
	$site_key=$rsk['site_key'];
	$site_des=$rsk['site_des'];
	$site_bot=$rsk['site_bot'];
}
$db->freeresult($res);

session_start();

?>