<?php require"conn.php"?>
<?php
$dlm='';
$fid=isset($_GET['fid'])?$_GET['fid']:'';
if ($fid!=''&&!checknum($fid)){
	msg('参数错误');
}

$title_lm='';
if ($fid==''||!checknum($fid)){
	$sql='select `id_lm`,`title_lm` from `'.$tablepre.'info_lm` where `fid`=42 order by `px` desc,`id_lm` desc limit 1';	
}else{
	$sql='select `id_lm`,`title_lm` from `'.$tablepre.'info_lm` where `id_lm`='.$fid.'';
}
$result=$db->query($sql);
if ($row=$db->getrow($result)){
	$fid=$row['id_lm'];
	$title_lm=$row['title_lm'];
}
$db->freeresult($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $site_title;?></title>
<meta content="<?php echo $site_key;?>" name="keywords">
<meta content="<?php echo  $site_des;?>" name="description">
<link rel="stylesheet" href="css/style.css" type="text/css" />
<link href="css/css.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="scripts/jquery-1.4.2.js"></script>
<script type="text/javascript" src="scripts/jquery.nivo.slider.pack.js"></script>
<script type="text/javascript">
	$(window).load(function() {
        $('#slider').nivoSlider();
    });
</script>
<!--[if IE 7]>
<script src=”http://ie7-js.googlecode.com/svn/version/2.0(beta)/IE7.js” type=”text/javascript”></script>
<![endif]--> 

</head>
<body>

<?php include 'top.php'?>
                <div class="nycon">
                        <div class="ny_left">
                           <?php include 'left_pro.php'?>
                           <?php include 'left_news.php'?> 
                        </div>
                        <div class="ny_right">
                           <div class="ny_right_t">
                           <?php if($fid==42 || $fid=='') {?>
                           <div class="ny_right_z"> 最新动态 <em>   NEWS   </em></div>
                           <?php } ?>
                           <?php if($fid==43) {?>
                           <div class="ny_right_z"> 服务中心 <em>   S	ERVICE   </em></div>
                           <?php } ?>
                            <?php if($fid==44) {?>
                           <div class="ny_right_z"> 培训中心 <em>   TRAINING   </em></div>
                           <?php } ?>
                     
        <div class="ny_right_y">您当前的位置：<a href="index.php">首页</a> > <a href="news.php?fid=<?php echo $fid ?>"><?php if($fid==42 || $fid=='') {?>最新动态 <?php } ?> <?php if($fid==43) {?>服务中心 <?php } ?> <?php if($fid==44) {?>培训中心<?php } ?></a></div>
                           </div>
                         <div class="news">
                           <ul>
                           <?php
if (!isset($_GET['fid'])){
$sqlcount='select count(*) from `'.$tablepre.'info_co` where pass="yes" and lm=42 order by px desc,id desc';
$sql='select `id`,`title`,`color_font`,`f_body`,`wtime` from `'.$tablepre.'info_co` where pass="yes" and lm=42 order by px desc,id desc';
}else{
$sqlcount='select count(*) from `'.$tablepre.'info_co` where pass="yes" and lm='.$fid.' order by px desc,id desc';
$sql='select `id`,`title`,`color_font`,`f_body`,`wtime` from `'.$tablepre.'info_co` where pass="yes" and lm='.$fid.' order by px desc,id desc';
}

/*$sqlcount='select count(*) from `'.$tablepre.'info_co` where pass="yes" and lm=1';
$sql='select `id`,`title`,`color_font`,`f_body`,`wtime` from `'.$tablepre.'info_co` where pass="yes" and lm=1 order by px desc,id desc';*/

$counter=$db->getqueryallrow($sqlcount);
$p=new page();
$p->setpage($counter,6);
$sql.=$p->getlimit();
$result=$db->query($sql);
while ($row=$db->getrow($result)){
?> 
                              <li>
                               <div class="news_t"><a href="news_show.php?id=<?php echo $row['id'];?>&?fid=<?php echo $fid?>"><?php echo $row['title']?></a><span><?php echo date("Y-m-d",$row['wtime'])?></span></div>
                                  <div class="news_c"><?php echo $row['f_body']?></div>
                              </li>
                             
                               <?php
								}
								$db->freeresult($result);
								?>
                               <div class="clear"></div>
                           </ul>
                         </div>
<?php
if (isset($counter)&&$counter){
?>
	<table border="0" cellspacing="0" cellpadding="0" align="center" style=" margin-top:25px; margin-bottom:35px;">
	  <tr>
		<td>
		<?php 
		$pra='&fid='.$fid;
		echo $p->getpagemenu($pra,2,'','上一页','下一页','');
		?></td>
	  </tr>
	</table>
<?php
}
?>           
                        </div>
                        <div class="clear"></div> 
                </div>


<?php include 'foot.php'?>

</body>
</html>
