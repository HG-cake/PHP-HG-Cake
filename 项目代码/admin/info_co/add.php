<?php
require('../../include/common.inc.php');
checklogin();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加信息</title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script  charset="utf-8" src="../ueditor/ueditor.config.js"></script>
<script  charset="utf-8" src="../ueditor/ueditor.all.min.js"> </script>
<script  charset="utf-8" src="../ueditor/lang/zh-cn/zh-cn.js"></script>
<SCRIPT language="JavaScript" type="text/JavaScript">
function check(){
	if (gt('lm').value=="n"){
		alert("请选择栏目");
		gt('lm').focus();
		return false;
	}
	if (gt('lm').value=="no"){
		alert("所选栏目不允许添加信息");
		gt('lm').focus();
		return false;
	}
	if(gt('title').value==''){
		alert('标题不能为空');
		gt('title').focus();
		return false;
	}
	if((gt('uselink').checked==true)&&(gt('link_url').value=="http://"||gt('link_url').value=="")){
		alert("提示：请填写外部连接地址！");
		gt('link_url').focus();
		return false;
	} 
	if(gt('px').value==''){
		alert('信息的显示顺序不能为空');
		gt('px').focus();
		return false;
	}
}
</SCRIPT>
<script>
<?php 
echo'shu_lm=new Array();'."\n";
$sql='select * from `'.$tablepre.'info_lm`';
$result=$db->query($sql);
$a=0;
while($rs=$db->getrow($result)){
	echo'shu_lm['.$a.']=new Array('.$rs['id_lm'].',"'.$rs['info_link'].'","'.$rs['info_from'].'","'.$rs['info_f_body'].'","'.$rs['info_z_body'].'","'.$rs['info_img_sl'].'","'.$rs['info_wtime'].'","'.$rs['s_pic'].'","'.$rs['s_typ'].'","'.$rs['s_wid'].'","'.$rs['s_hei'].'","'.$rs['dow_sl'].'","'.$rs['vid_sl'].'")'."\n";
	$a++;
}
$db->freeresult($result);
echo'var counter='.$a.';'."\n";
?>
function check_display(){
	var dis_uselink=gt("dis_uselink");
	var dis_info_from=gt("dis_info_from");
	var dis_f_body=gt("dis_f_body");
	var dis_z_body=gt("dis_z_body");
	var dis_img_sl=gt("dis_img_sl");
	var dis_dow_sl=gt("dis_dow_sl");
	var dis_vid_sl=gt("dis_vid_sl");
	var dis_wtime=gt("dis_wtime");
	var dis_frame1=document.getElementById("frame1");
	var lm=gt('lm').value;
	for(i=0;i<counter;i++){
		if(lm==shu_lm[i][0]){
			(shu_lm[i][1]=='yes')?dis_uselink.style.display='':dis_uselink.style.display='none';
			(shu_lm[i][2]=='yes')?dis_info_from.style.display='':dis_info_from.style.display='none';
			(shu_lm[i][3]=='yes')?dis_f_body.style.display='':dis_f_body.style.display='none';
			(shu_lm[i][4]=='yes')?dis_z_body.style.display='':dis_z_body.style.display='none';
			if(shu_lm[i][5]=="yes"){
				dis_img_sl.style.display="";
				dis_frame1.src="up.php?frameid=frame1&kuang=img_sl&img_sl="+img_sl+"&s_pic="+shu_lm[i][7]+"&s_typ="+shu_lm[i][8]+"&s_wid="+shu_lm[i][9]+"&s_hei="+shu_lm[i][10];
			}else{
				dis_img_sl.style.display="none";
			}
			(shu_lm[i][11]=="yes")?dis_dow_sl.style.display="":dis_dow_sl.style.display="none";
			(shu_lm[i][12]=="yes")?dis_vid_sl.style.display="":dis_vid_sl.style.display="none";
			(shu_lm[i][6]=='yes')?dis_wtime.style.display='':dis_wtime.style.display='none';
			break;
		}
	}
}
function checklink(){
	var dis_uselink=gt("dis_uselink");
	var dis_info_from=gt("dis_info_from");
	var dis_f_body=gt("dis_f_body");
	var dis_z_body=gt("dis_z_body");
	var dis_img_sl=gt("dis_img_sl");
	var dis_dow_sl=gt("dis_dow_sl");
	var dis_vid_sl=gt("dis_vid_sl");
	var dis_wtime=gt("dis_wtime");
	var uselink=gt("uselink");
	var link_url=gt("link_url");
	var lm=gt('lm').value;
	if (uselink.checked==true){
		link_url.disabled=false;
		dis_info_from.style.display="none";
		dis_f_body.style.display="none";
		dis_z_body.style.display="none";
		dis_wtime.style.display="none";
			for (i=0;i<counter;i++){
				 if (lm==shu_lm[i][0]){
					(shu_lm[i][5]=='yes')?dis_img_sl.style.display='':dis_img_sl.style.display='none';
				 	break;
				 }
			 }
	}else{
		link_url.disabled=true;
		check_display();
	}
}
</script>
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
    <td><a href="default.php">管理首页</a>&nbsp;|&nbsp;<a href="add.php">添加信息</a></td>
  </tr>
</table>
<br />
<FORM name="form1" id="form1" method="post" action="addd.php" onSubmit="return check()">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="title">
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr class="tdbg">
    <td width="120" align="right">所属栏目：</td>
    <td>
    <select name="lm" id="lm" onchange="check_display()">
      <option value="n" selected="selected">请选择栏目</option>
    	<?php
		addlm(0,'');
		$db->close();
		function addlm($fid,$i){
			global $db,$tablepre;
			if ($i==''){
				$i='• ';
			}elseif ($i=='• '){
				$i=' 　|—';
			}else{
				$i=' 　|'.$i;
			}
			$sql='select * from `'.$tablepre.'info_lm` where `fid`='.$fid.' order by `px` desc,`id_lm` desc';
			$rek=$db->query($sql);
			while($rsk=$db->getrow($rek)){
				if($rsk['add_xx']=='yes'){
					echo'<option value="'.$rsk["id_lm"].'">'.$i.$rsk["title_lm"].'</option>'."\n";	
				}else{
					echo'<option value="no">'.$i.$rsk["title_lm"].'×</option>'."\n";
				}
				addlm($rsk['id_lm'],$i);
			}
			$db->freeresult($rek);
		}
		?>
    </select>

    </td>
  </tr>
  <tr class="tdbg">
    <td width="120" align="right">标　　题：</td>
    <td><INPUT name="title" type="text" id="title" size="50" maxlength="150"> <span class="red">*</span>
    <select name="color_font" id="color_font">
      <option value="" selected>颜色</option>
      <option value="#000000" style="background-color:#000000"></option>
      <option value="#FFFFFF" style="background-color:#FFFFFF"></option>
      <option value="#008000" style="background-color:#008000"></option>
      <option value="#800000" style="background-color:#800000"></option>
      <option value="#808000" style="background-color:#808000"></option>
      <option value="#000080" style="background-color:#000080"></option>
      <option value="#800080" style="background-color:#800080"></option>
      <option value="#808080" style="background-color:#808080"></option>
      <option value="#FFFF00" style="background-color:#FFFF00"></option>
      <option value="#00FF00" style="background-color:#00FF00"></option>
      <option value="#00FFFF" style="background-color:#00FFFF"></option>
      <option value="#FF00FF" style="background-color:#FF00FF"></option>
      <option value="#FF0000" style="background-color:#FF0000"></option>
      <option value="#0000FF" style="background-color:#0000FF"></option>
      <option value="#008080" style="background-color:#008080"></option>
    </select>
    </td>
  </tr>
  <tr  class="tdbg" id="dis_uselink" style="display:none;" >
    <td align="right">连接地址：</td>
    <td>
    <input type="checkbox" name="uselink" id="uselink" value="yes" onClick="checklink()">
    <input name="link_url" type="text" id="link_url" size="57" maxlength="150" disabled="yes" value="http://">
    </td>
  </tr>
  <tr class="tdbg" id="dis_info_from" style="display:none;">           
    <td width="120" align="right">信息来源：</td>          
    <td ><input name="info_from" type="text" id="info_from" value="" size="24"   maxlength="50">
          &nbsp; 信息作者：<input name="info_author" type="text" id="info_author" value="" size="23"   maxlength="50"/>
    </td >
  </tr>
  <tr class="tdbg"  id="dis_f_body" style="display:none;">
    <td align="right" valign="top"><strong><br>
    </strong>信息精要：</td>
    <td ><textarea name="f_body" rows="4" id="f_body" style="width:574px;"></textarea></td>
  </tr>
  <tr class="tdbg" id="dis_z_body">
    <td width="120" align="right">内　　容：</td>
    <td>
		    <script id="editor" type="text/plain" style="width:1024px;height:500px;"></script>
    </td>
  </tr>
  <tr class="tdbg" id="dis_img_sl" style="display:none;">          
    <td width="120" align="right">图片上传：</td>          
    <td ><IFRAME style="margin-top:2px;"height=22 src="up.php?frameid=frame1&kuang=img_sl" width="280" frameborder=0  scrolling=no  name="frame1" id="frame1"></iframe><input type="hidden" name="img_sl" id="img_sl">
    图片尺寸：(banner 1201px*447px)</td>
  </tr>
    <tr class="tdbg" id="dis_dow_sl" style="display:none;">          
        <td width="120" align="right">文件上传：</td>          
        <td ><IFRAME name="frame2" id="frame2" style="margin-top:2px;"height=22 src="upd.php?frameid=frame2&kuang=dow_sl" width="280" frameborder=0  scrolling=no  ></iframe><input type="hidden" name="dow_sl" id="dow_sl"></td>
    </tr>
    <tr class="tdbg" id="dis_vid_sl" style="display:none;">          
        <td width="120" align="right">视频上传：</td>          
        <td ><IFRAME name="frame3" id="frame3" style="margin-top:2px;"height=22 src="upv.php?frameid=frame3&kuang=vid_sl" width="280" frameborder=0  scrolling=no  ></iframe><input type="hidden" name="vid_sl" id="vid_sl"></td>
    </tr>
  <tr class="tdbg" id="dis_wtime">
    <td width="120" align="right">发布时间：</td>
    <td ><input name="wtime" type="text" id="wtime" value="<?php echo date('Y-m-d H:i:s')?>" maxlength="50">              时间格式为“年-月-日 时:分:秒”，如：<font color="#0000FF">2003-5-12 12:32:47</font></td>
  </tr>
  <tr class="tdbg">
    <td width="120" align="right">显示顺序：</td>
    <td><INPUT name="px" type="text" id="px" value="100" size="5" maxlength="11" >
     <span class="red">* (从大到小排序)</span></td>
  </tr>
  <tr class="tdbg">
    <td width="120" align="right">点击数量：</td>
    <td><INPUT name="read_num" type="text" id="read_num" value="100" size="5" maxlength="11" >
     <span class="red"></span></td>
  </tr>
</table>
<p align="center">
<input type="submit" name="Submit" value=" 提 交 " class="btn"> &nbsp; &nbsp; &nbsp;<input name="Cancel" type="button" id="Cancel" value=" 取 消 " onClick="location.href='default.php';" class="btn">
</p>
</FORM>


<script type="text/javascript">

    //实例化编辑器
    //建议使用工厂方法getEditor创建和引用编辑器实例，如果在某个闭包下引用该编辑器，直接调用UE.getEditor('editor')就能拿到相关的实例
    var ue = UE.getEditor('editor');


    function isFocus(e){
        alert(UE.getEditor('editor').isFocus());
        UE.dom.domUtils.preventDefault(e)
    }
    function setblur(e){
        UE.getEditor('editor').blur();
        UE.dom.domUtils.preventDefault(e)
    }
    function insertHtml() {
        var value = prompt('插入html代码', '');
        UE.getEditor('editor').execCommand('insertHtml', value)
    }
    function createEditor() {
        enableBtn();
        UE.getEditor('editor');
    }
    function getAllHtml() {
        alert(UE.getEditor('editor').getAllHtml())
    }
    function getContent() {
        var arr = [];
        arr.push("使用editor.getContent()方法可以获得编辑器的内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getContent());
        alert(arr.join("\n"));
    }
    function getPlainTxt() {
        var arr = [];
        arr.push("使用editor.getPlainTxt()方法可以获得编辑器的带格式的纯文本内容");
        arr.push("内容为：");
        arr.push(UE.getEditor('editor').getPlainTxt());
        alert(arr.join('\n'))
    }
    function setContent(isAppendTo) {
        var arr = [];
        arr.push("使用editor.setContent('欢迎使用ueditor')方法可以设置编辑器的内容");
        UE.getEditor('editor').setContent('欢迎使用ueditor', isAppendTo);
        alert(arr.join("\n"));
    }
    function setDisabled() {
        UE.getEditor('editor').setDisabled('fullscreen');
        disableBtn("enable");
    }

    function setEnabled() {
        UE.getEditor('editor').setEnabled();
        enableBtn();
    }

    function getText() {
        //当你点击按钮时编辑区域已经失去了焦点，如果直接用getText将不会得到内容，所以要在选回来，然后取得内容
        var range = UE.getEditor('editor').selection.getRange();
        range.select();
        var txt = UE.getEditor('editor').selection.getText();
        alert(txt)
    }

    function getContentTxt() {
        var arr = [];
        arr.push("使用editor.getContentTxt()方法可以获得编辑器的纯文本内容");
        arr.push("编辑器的纯文本内容为：");
        arr.push(UE.getEditor('editor').getContentTxt());
        alert(arr.join("\n"));
    }
    function hasContent() {
        var arr = [];
        arr.push("使用editor.hasContents()方法判断编辑器里是否有内容");
        arr.push("判断结果为：");
        arr.push(UE.getEditor('editor').hasContents());
        alert(arr.join("\n"));
    }
    function setFocus() {
        UE.getEditor('editor').focus();
    }
    function deleteEditor() {
        disableBtn();
        UE.getEditor('editor').destroy();
    }
    function disableBtn(str) {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            if (btn.id == str) {
                UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
            } else {
                btn.setAttribute("disabled", "true");
            }
        }
    }
    function enableBtn() {
        var div = document.getElementById('btns');
        var btns = UE.dom.domUtils.getElementsByTagName(div, "button");
        for (var i = 0, btn; btn = btns[i++];) {
            UE.dom.domUtils.removeAttributes(btn, ["disabled"]);
        }
    }

    function getLocalData () {
        alert(UE.getEditor('editor').execCommand( "getlocaldata" ));
    }

    function clearLocalData () {
        UE.getEditor('editor').execCommand( "clearlocaldata" );
        alert("已清空草稿箱")
    }
</script>
</body>
</html>
