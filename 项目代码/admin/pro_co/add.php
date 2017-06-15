<?php
require('../../include/common.inc.php');
checklogin();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加产品</title>
<link href="../css/admin_style.css" type="text/css" rel="stylesheet"/>
<script  charset="utf-8" src="../ueditor/ueditor.config.js"></script>
<script  charset="utf-8" src="../ueditor/ueditor.all.min.js"> </script>
<script  charset="utf-8" src="../ueditor/lang/zh-cn/zh-cn.js"></script>
<SCRIPT language="JavaScript" type="text/JavaScript">
function check(){
	if (gt('lm').value=="n"){
		alert("请选择分类");
		gt('lm').focus();
		return false;
	}
	if (gt('lm').value=="no"){
		alert("所选分类不允许添加产品");
		gt('lm').focus();
		return false;
	}
	if(gt('title').value==''){
		alert('产品名称不能为空');
		gt('title').focus();
		return false;
	}
	if(gt('px').value==''){
		alert('产品的显示顺序不能为空');
		gt('px').focus();
		return false;
	}
}
</SCRIPT>
<script src="../scripts/function.js"></script>
</head>

<body>
<DIV id=popImageLayer style="VISIBILITY: hidden; WIDTH: 267px; CURSOR: hand; POSITION: absolute; HEIGHT: 260px; background-image:url(../images/bbg.gif); z-index: 100;" align=center  name="popImageLayer"  ></DIV>
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="topbg">
    <td colspan="2">添加产品</td>
  </tr>
  <tr class="tdbg">
    <td width="70" height="26" align="right"><strong>管理导航：</strong></td>
    <td><a href="default.php">管理首页</a>&nbsp;|&nbsp;<a href="add.php">添加产品</a></td>
  </tr>
</table>
<br />
<FORM name="form1" id="form1" method="post" action="addd.php" onSubmit="return check()">
<table width="100%" border="0" cellpadding="2" cellspacing="1" class="border">
  <tr class="title">
    <td colspan="2">&nbsp;</td>
  </tr>
  <tr class="tdbg">
    <td width="120" align="right">所属分类：</td>
    <td>
    <select name="lm" id="lm">
      <option value="n" selected="selected">请选择分类</option>
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
			$sql='select * from `'.$tablepre.'pro_lm` where `fid`='.$fid.' order by `px` desc,`id_lm` desc';
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
    <td width="120" align="right">产品名称：</td>
    <td><INPUT name="title" type="text" id="title" size="60" maxlength="80"> <span class="red">*</span></td>
  </tr>
  <tr class="tdbg">
    <td width="120" align="right">售价：</td>
    <td><INPUT name="pro_can1" type="text" id="pro_can1" size="30" maxlength="80"></td>
  </tr>
  <tr class="tdbg2" style="display:none;">
    <td width="120" align="right" class="red">参　　数：</td>
    <td>
    <table border="0" cellspacing="0" cellpadding="2">
  <tr>
    <td>产地：</td>
    <td></td>
    <td>规格：</td>
    <td><INPUT name="pro_can2" type="text" id="pro_can2"  maxlength="50"></td>
  </tr>
  <tr>
    <td>颜色：</td>
    <td><INPUT name="pro_can3" type="text" id="pro_can3"  maxlength="50"></td>
    <td>售价：</td>
    <td><INPUT name="pro_can4" type="text" id="pro_can4"  maxlength="50"></td>
  </tr>
</table>

    </td>
  </tr>
  <tr class="tdbg">
    <td align="right" valign="top"><strong><br>
    </strong>简要介绍：</td>
    <td ><textarea name="f_body" rows="4" id="f_body" style="width:574px;"></textarea></td>
  </tr>
  <tr class="tdbg">
    <td width="120" align="right">详细介绍：</td>
    <td>
	    <script id="editor" type="text/plain" style="width:1024px;height:500px;"></script>
    </td>
  </tr>
  <tr class="tdbg">          
    <td width="120" align="right">图片上传：</td>          
    <td ><IFRAME style="margin-top:2px;"height=22 src="up.php?frameid=frame1&kuang=img_sl" width="280" frameborder=0  scrolling=no   name="frame1" id="frame1"></iframe><input type="hidden" name="img_sl" id="img_sl"></td>
  </tr>
    <tr class="tdbg">
    <td width="120" align="right">显示顺序：</td>
    <td><INPUT name="px" type="text" id="px" value="100" size="5" maxlength="11" >
     <span class="red">* (从大到小排序)</span></td>
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
