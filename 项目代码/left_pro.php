<div class="left_about">
                                <div class="left_about_t">产品分类  <em>PRODUCT</em></div>
                                 <div class="left_about_c">
                                 <ul>
                                 
                                 <?php
								
									$sql='select id_lm,fid,title_lm from pro_lm where fid=0  order by px desc,id_lm desc';
									$result=$db->query($sql);
									$list=$db->getrows($result);
									foreach ($list as $v){
										if ($v['fid']==0){
									?>
											
        
            

             <li><a href="product.php?dlm=<?php echo $v['id_lm']?>" <?php if($dlm==$v['id_lm']) {?> class="to"<?php }?>> <span style="font-weight:bold; font-size:9px;">■</span>&nbsp;&nbsp;&nbsp;<?php echo $v['title_lm']?> </a></li>
            
										<?php
                                    }
                                }
                                ?>
                                 </ul>
                                  <div class="clear"></div>
                               </div>
                                <div class="clear"></div>
                           </div>