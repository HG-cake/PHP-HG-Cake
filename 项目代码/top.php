<!--[if IE 6]>
<style>
.ind_m2L{ width:553px; height:290px; float:left; background:url(images/ind_m2l_bg.jpg) no-repeat left center; margin-left:10px;}
.ind_m1BRT h3{
width:250px;height:16px;float:left;font-size:12px;color:#787578;line-height:16px;font-weight:normal;margin-top:20px; display:inline;}
</style>
<![endif]--> 

<script>
 
  	//加入收藏
	function AddFavorite(sURL, sTitle) {
	   var sURL = window.location.href;
	   var sTitle = document.title;
	   try{
		window.external.addFavorite(sURL, sTitle);
	   }catch(e) {
		try{
	   window.sidebar.addPanel(sTitle, sURL, "");
	   }catch (e) {
		alert("加入收藏失败，请使用Ctrl+D进行添加,或手动在浏览器里进行设置.");
	   }
	  }
	}
	//设为首页
	function SetHome(obj,vrl){
        try{
                obj.style.behavior='url(#default#homepage)';obj.setHomePage(vrl);
        }
        catch(e){
                if(window.netscape) {
                        try {
                                netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
                        }
                        catch (e) {
                                alert("此操作被浏览器拒绝！\n请在浏览器地址栏输入“about:config”并回车\n然后将 [signed.applets.codebase_principal_support]的值设置为'true',双击即可。");
                        }
                        var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
                        prefs.setCharPref('browser.startup.homepage',vrl);
                 }
        }
}
	
</script>
<div id="top">
	<div class="topIn">
    	<div class="topL">
    
        </div>
    	<div class="topR">
        	
        	<div class="topRT"><a  href="javascript:;" onclick="SetHome(this,window.location)">设为首页</a> | <a href="javascript:AddFavorite();">添加收藏</a> | <a href="contact.php">联系我们</a></div>
            <div class="topRB"><img src="images/phone.jpg" />15232103082</div>
        </div>
 
    </div>
</div>
<div id="nav">
	<div class="navIn">
    	<ul>
        	<li style="margin-left:205px; _margin-left:100px;"><a href="index.php">网站首页</a></li>
            <li><a href="product.php">产品展示</a></li>
            <li><a href="about.php">公司简介</a></li>
            <li><a href="news.php?fid=42">最新动态</a></li>
            <li><a href="news.php?fid=43">服务中心</a></li>
            <li><a href="news.php?fid=44">培训中心</a></li>
            <li><a href="contact.php">联系我们</a></li>
        </ul>
                                                                                                                                            
    </div>
</div>
<div id="banner">
	<div class="bannerIn">
    	<div id="slider" class="nivoSlider">
         <?php
                $sql='select * from info_co where lm=41 and pass="yes" order by px desc,id desc limit 3';
				$result=$db->query($sql);
				while ($row=$db->getrow($result)){
				?>
     
<a href="#" target="_blank"><img src="<?php echo $row['img_sl'] ?>" /></a>
    <?php
                }
                $db->freeresult($result);
              ?>    
	
   
    
</div>
        
    </div>
</div>
<div class="clear"></div>