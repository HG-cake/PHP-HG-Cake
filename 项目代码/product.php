<?php include 'conn.php'?>
<?php
$dlm=isset($_GET['dlm'])?$_GET['dlm']:'';
$keyword=(isset($_GET['keyword']))?$_GET['keyword']:'';

if ($dlm!=''&&!checknum($dlm)){
	msg('参数错误');
}

if ($dlm!=''){
	$sq=' and `lm`='.$dlm.'';
	$pra='&dlm='.$dlm.'';
	$sql='select title_lm from pro_lm where id_lm='.$dlm;
	$result=$db->query($sql);
	if($rs=$db->getrow($result)){
		$dao=' &gt; '.$rs["title_lm"].'';
	}
	$db->freeresult($result);
}else{
	$sq='';
	$pra='';
	$dao='';
}

if($keyword!=''){
	$sq.=' and (title like "%'.$keyword.'%" )';
	$pra.='&keyword='.urlencode($keyword).'';
	$dao=' &gt; 搜索结果';
}
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
                           <div class="ny_right_z"> 产品展示 <em>   PRODUCT   </em></div>  
                     
                      <div class="ny_right_y">您当前的位置：<a href="index.php">首页</a> > <a href="product.php">产品展示</a><?php echo $dao ?></div>
                           </div>
                         <div class="pro">
                               <ul>
                               <?php
$sqlcount='select count(*) from pro_co where pass="yes" '.$sq.'';
$sql='select id,title,img_sl,pro_can1,f_body from pro_co  where pass="yes" '.$sq.' order by px desc,id desc';
$counter=$db->getqueryallrow($sqlcount);
$p=new page();
$p->setpage($counter,5);
$sql.=$p->getlimit();
$result=$db->query($sql);
$row=$db->getrows($result);
$db->freeresult($result);
if ($row){
?>

	<?php
    $a=1;
    foreach ($row as $v){
    ?>
                                 <li>
                                 <div class="pro_z"><a href="product_show.php?id=<?php echo $v['id']?>"><img src="<?php echo $v['img_sl']?>" /></a></div>
                                  <div class="pro_y">
                               <h2><a href="product_show.php?id=<?php echo $v['id']?>"> <?php echo $v['title']?></a></h2>
                                   <p> <?php echo $v['f_body']?></p>
                             <h3>本店售价：<font style="color:#F00; font-size:14px;">￥ <?php echo $v['pro_can1']?></font></h3>
                        <span><a href="product_show.php?id=<?php echo $v['id']?>"><img src="images/ind_zx.jpg" /></a></span>
                                  
                                  </div>
                                 </li>
                                 
                                  
        
       
    
	<?php
		$a++;
	}
    ?> 
    
<?php 
}
?>

<?php 
$db->close();
?>
                                 
                            
                               </ul>
                               <div class="clear"></div>
                           </div>
                           <?php
if (isset($counter)&&$counter){
?>
	<table border="0" cellspacing="0" cellpadding="0" align="center" style=" margin-top:25px; margin-bottom:35px;">
	  <tr>
		<td>
		<?php
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
