                       <div class="left_about">
                                <div class="left_about_t">公司简介  <em>ABOUT US</em></div>
                                 <div class="left_about_c">
                                 <ul>
                                 <?php
$sql='select `id`,`title` from `'.$tablepre.'tol_co` where `lm`=2 order by `px` desc,`id` desc';
$result=$db->query($sql);
while ($row=$db->getrow($result)){
?>
                  <li><a href="about.php?id=<?php echo $row['id']?>#c"<?php if($id==$row['id']) {?> class="to"<?php } ?>> <span style="font-weight:bold; font-size:9px;">■</span>&nbsp;&nbsp;&nbsp;<?php echo $row['title']?></a></li>
                 
                  <?php
}
$db->freeresult($result);
?>
                                 </ul>
                               </div>
                           </div>