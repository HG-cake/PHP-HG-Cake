<?php
require('../../include/common.inc.php');
checklogin();
?>
<?php
$sql='select * from `'.$tablepre.'setup` where `id`=1';
$result=$db->query($sql);
$row=$db->getrow($result);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加信息</title>
<script type="text/javascript" src="../../ueditor/editor_config.js"></script>
<script type="text/javascript" src="../../ueditor/editor.js"></script>
<script type="text/javascript" src="../../ueditor/editor.min.js"></script>
<link rel="stylesheet" href="../../ueditor/themes/default/ueditor.css" />
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script src="../scripts/function.js"></script>
</head>

<body>
<DIV id=popImageLayer style="VISIBILITY: hidden; WIDTH: 267px; CURSOR: hand; POSITION: absolute; HEIGHT: 260px; background-image:url(../images/bbg.gif); z-index: 100;" align=center  name="popImageLayer"  ></DIV>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td colspan="2">添加信息</td>
  </tr>
  <tr class="tdbg">
    <td width="70" height="26" align="right"><strong>管理导航：</strong></td>
    <td><a href="../setup/">网站基本设置</a></td>
  </tr>
</table>
<br />
<FORM name="form1" id="form1" method="post" action="setup.php" onSubmit="return check()">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="title">
    <td colspan="2">&nbsp;</td>
  </tr>

  <tr class="tdbg">
    <td width="120" align="right">标　　题：</td>
    <td>
		<textarea name="site_title" rows="4" id="site_title" style="width:500px;"><?php echo $row['site_title'];?></textarea><span style="color:red">*文字间不要有换行</span>
    </td>
  </tr>
    <tr class="tdbg">
    <td width="120" align="right">关键词：</td>
    <td>
		<textarea name="site_key" rows="4" id="site_key" style="width:500px;"><?php echo $row['site_key'];?></textarea><span style="color:red">*文字间不要有换行</span>
    </td>
  </tr>
   <tr class="tdbg">
    <td width="120" align="right">描述：</td>
    <td>
		<textarea name="site_des" rows="4" id="site_des" style="width:500px;"><?php echo $row['site_des'];?></textarea><span style="color:red">*文字间不要有换行</span>
    </td>
  </tr>
  <tr class="tdbg">
    <td width="120" align="right">网站底部：</td>
    <td>
		<textarea name="site_bot" rows="4" id="site_bot" style="width:500px;"><?php echo $row['site_bot'];?></textarea><span style="color:red">*文字间不要有换行</span>
    </td>
  </tr>

</table>
<p align="center">
<input type="submit" name="Submit" value=" 提 交 " class="btn"> &nbsp; &nbsp; &nbsp;
</p>
</FORM>
</body>
</html>
