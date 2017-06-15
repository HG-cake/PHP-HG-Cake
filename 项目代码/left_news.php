<div class="left_news">
                                <div class="left_news_t"><span>最新动态</span><em>NEWS</em><h4><a href="news.php?fid=42">更多+</a></h4></div>
                                 <div class="left_news_c">
                                 <ul>
                                    <?php
                $sql='select * from info_co where lm=42 and  pass="yes" order by px desc,id desc limit 10';
				$result=$db->query($sql);
				while ($row=$db->getrow($result)){
				?>
                	
                   
    <li><a href="news_show.php?id=<?php echo $row['id'] ?>&?fid=42"> <span style="font-weight:bold; font-size:9px;">■</span>&nbsp;&nbsp;&nbsp;<?php echo $row['title'] ?></a></li>
    <?php
						}
						$db->freeresult($result);
					  ?>   
                                 </ul>
                               </div>
                           </div>