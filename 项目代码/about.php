<?php include 'conn.php'?>
<?php
$id=isset($_GET['id'])?$_GET['id']:'';
if ($id!=''&&!checknum($id)){
	msg('参数错误');
}
$title='';
$z_body='';
if ($id==''||!checknum($id)){
	$sql='select * from `'.$tablepre.'tol_co` where `lm`=2 order by `px` desc,`id` desc limit 1';
	
}else{
	$sql='select * from `'.$tablepre.'tol_co` where `id`='.$id.'';
}
$result=$db->query($sql);
if ($row=$db->getrow($result)){
	$title=$row['title'];
	$z_body=$row['z_body'];
	$id=$row['id'];
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
<a name="c" id="c"></a>
                <div class="nycon">
                        <div class="ny_left">
                             
                           <?php include 'left_about.php'?>
                           <?php include 'left_news.php'?>
                             
                        </div>
                        <div class="ny_right">
                           <div class="ny_right_t">
                           <div class="ny_right_z"> 公司简介 <em>   ABOUT US   </em></div>  
                     
                      <div class="ny_right_y">您当前的位置：<a href="index.php">首页</a> > <a href="about.php">公司简介</a> > <?php echo $title?></div>
                           </div>
                           <div class="about_c">
                           
                           <?php echo $z_body?>
                           </div>
                        </div>
                        <div class="clear"></div> 
                </div>


<?php include 'foot.php'?>

</body>
</html>
