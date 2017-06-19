<?php include 'conn.php'?>
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

<div id="ind_m1">
	<div class="ind_m1In">
    	<div class="ind_m1T">
        	<div class="ind_m1TIn">
        <span>产品展示</span><em>PRODUCTS</em>
       <h4> <a href="product.php">更多+</a></h4>
        	</div>
        </div>
        <div class="ind_m1B">
            <ul>
            
              <?php
                $sql='select * from pro_co where  pass="yes" order by px desc,id desc limit 4';
				$result=$db->query($sql);
				while ($row=$db->getrow($result)){
				?>
                    <li>
                   <div class="ind_m1BL"><a href="product_show.php?id=<?php echo $row['id'] ?>"><img src="<?php echo substr($row['img_sl'],0,strrpos($row['img_sl'],'/')+1).'z'.substr($row['img_sl'],strrpos($row['img_sl'],'/')+1);?>" /></a></div>
                    <div class="ind_m1BR">
                        <div class="ind_m1BRT">
                        <h2><a href="product_show.php?id=<?php echo $row['id'] ?>"><?php echo $row['title'] ?></a></h2>
                        <p><br /><?php echo getstr($row['f_body'],116) ?></p>
                        <h3>本店售价：<div style="color:red; font-size:14px; display:inline">￥<?php echo $row['pro_can1'] ?></div></h3>
                       <a href="product_show.php?id=<?php echo $row['id'] ?>"> <img src="images/ind_zx.jpg" /></a>
                    </div>
                    </div>
                    </li>
                     <?php
						}
						$db->freeresult($result);
					  ?>    
           </ul>
        
        </div>
    </div>
</div>
<div class="ind_m2">
	<div class="ind_m2In">
        <div class="ind_m2L">
        	<div class="ind_m2LT">
            	<div class="ind_m2LTL">
                	<span>关于我们</span>
                    <em>ABOUT US </em>
                </div>
            	<div class="ind_m2LTR">
                	<strong><a href="about.php">更多+</a></strong>
                </div>
                
            </div>
            <div class="ind_m2LB">
            	<div class="ind_m2LBL">
                <p style="color:#000000; font-size:12px; line-height:23px;"><a href="about.php" style="color:#000000">
				    <?php
					$sql='select `z_body` from `'.$tablepre.'tol_co` where `id`=6';
					$result=$db->query($sql);
					$row=$db->getrow($result);
					if($row){
						echo $row['z_body'];
					}
					$db->freeresult($result);
					?>
</a></p>
                </div>
                <div class="ind_m2LBR">
                <a href="about.php"><img src="images/ind_m2r_img.jpg" /></a>
                </div>
            </div>
        </div>
        <div class="ind_m2M">
        	<div class="ind_m2MT">
            	<div class="ind_m2MTL">
                	<span>最新动态</span>
                    <em>News</em>
                </div>
                <div class="ind_m2MTR">
                <strong><a href="news.php?fid=42">更多+</a></strong>
                </div>
            </div>
            <div class="ind_m2MB">
            	<ul>
                     <?php
                $sql='select * from info_co where lm=42 and  pass="yes" order by px desc,id desc limit 6';
				$result=$db->query($sql);
				while ($row=$db->getrow($result)){
				?>
                	<li><a href="news_show.php?id=<?php echo $row['id'] ?>&?fid=42"><?php echo $row['title'] ?></a></li>
                     <?php
						}
						$db->freeresult($result);
					  ?>   
                </ul>
            </div>
        </div>
        
        <div class="ind_m2R">
                <div class="ind_m2RT">
                    <div class="ind_m2RTL">
                        <span>联系我们</span>
                        <em>CONTACT US</em>
                    </div>
                </div>
                <div class="ind_m2RB">
                <p style="font-size:12px; line-height:18px;color:#333333"><?php
$sql='select `z_body` from `'.$tablepre.'tol_co` where `id`=7';
$result=$db->query($sql);
$row=$db->getrow($result);
if($row){
	echo $row['z_body'];
}
$db->freeresult($result);
?></p>
                </div>
        </div>
    </div>
</div>

<?php include 'foot.php' ?>
</body>
</html>
