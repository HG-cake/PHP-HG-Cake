<?php include 'conn.php'?>
<?php

$id=(isset($_GET['id'])&&checknum($_GET['id']))?$_GET['id']:'';
if ($id==''){
	msg('参数错误');
}

$fid='';
$dlm='';
$title='';
$img_sl='';
$z_body='';
$title_lm='';
$sql='select * from pro_co where id='.$id.' and pass="yes"';
$result=$db->query($sql);
if (!$row=$db->getrow($result)){
	msg('该信息不存在或已删除');
}else{
	$fid=$row['lm'];
	$title=$row['title'];
	$img_sl=$row['img_sl'];
	$z_body=$row['z_body'];
	$dlm=$row['lm'];
	
	$sql='select * from pro_lm where id_lm='.$fid.' ';
	$res=$db->query($sql);
	if ($rs=$db->getrow($res)){
		$title_lm=$rs['title_lm'];
	}
	$db->freeresult($res);
	
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
                        <div class="ny_right2">
                           <div class="ny_right_t">
                           <div class="ny_right_z"> 产品展示 <em>   PRODUCT   </em></div>  
                     
                      <div class="ny_right_y">您当前的位置：<a href="index.php">首页</a> > <a href="product.php">产品展示</a> > <a href="product.php?dlm=<?php echo $dlm ?>"><?php echo $title_lm?></a></div>
                           </div>
                          <div class="pro">
                          
                          <?php if($img_sl!=''){ ?>
                <div class="show_img"> <img src="<?php echo substr($img_sl,0,strrpos($img_sl,'/')+1).'d'.substr($img_sl,strrpos($img_sl,'/')+1);?>" /></div>
                 <?php }?>
                                <div class="show_t"><?php echo $title ?></div>
                                <div class="show_c_t"><img src="images/show_t.jpg" /></div>
                                <div class="show_c"><?php echo $z_body ?></div>
                                <div style="text-align:right;"><a href="javascript:history.back();">[返回]</a></div>
                               <div class="clear"></div>
                           </div>
                        </div>
                        <div class="clear"></div> 
                </div>

   <?php include 'foot.php'?>


</body>
</html>
