<?php require"conn.php"?>
<?php
$dlm='';
$id=isset($_GET['id'])?$_GET['id']:'';
if ($id==''||!checknum($id)){
	msg('参数错误');
}

$title='';
$color_font='';
$z_body='';
$wtime='';
$title_lm='';

$sql='select * from `'.$tablepre.'info_co` where `id`='.$id.'';
$result=$db->query($sql);
if(!$row=$db->getrow($result)){
	msg('该信息不存在或已删除');
}else{
	$fid=$row['lm'];
	$title=$row['title'];
	$color_font=$row['color_font'];
	$z_body=$row['z_body'];
	$wtime=date('Y-m-d H:i:s',$row['wtime']);
}
$db->freeresult($result);

$db->execute('update info_co set read_num=read_num+1 where id='.$id.'');

$sql='select * from info_lm where id_lm='.$fid.'';
$result=$db->query($sql);
if ($row=$db->getrow($result)){
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
                           <div style="padding:0px 5px 2px 5px;">
    <div style="text-align:center;font-weight:bold; font-size:14px; padding:5px 0 5px 0px;"><font style="color:<?php echo $color_font?>;"><?php echo $title?></font></div>
    <div style="text-align:right; line-height:22px; color:#999; padding-bottom:5px;">时间：<?php echo $wtime?></div>
    <div style="line-height:180%;"><?php echo $z_body?></div>
    <div style="text-align:right;"><a href="javascript:history.back();">[返回]</a></div>
</div>
                         </div>
                        </div>
                        <div class="clear"></div> 
                </div>



<?php include 'foot.php'?>

</body>
</html>
