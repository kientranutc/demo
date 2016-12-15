<div id="tinnoibat">
<div id="line">
	<h3>Tin Nổi Bật</h3>
</div>
<div class="border">
<?php
 $i=1;
             while ($rowbt=mysqli_fetch_array($result)) {
               if($i==1)
               {
               ?>
               
               <div id="noibat-first">
                <img id="anhnoibat" src="<?php echo $rowbt["anh"]; ?>"class="thumbnail" width="400"   alt="<?php echo $rowbt["anh"]; ?>">
                <a href="index.php?view=chitietbt&mabt=<?php echo $rowbt[0]; ?>"><?php echo $rowbt["tenbt"]; ?></a>
                </div>
                
               <?php
               }
                else
                {
                 ?>
                 <div id="noibat-last" >
                     <img src="<?php echo $rowbt["anh"]; ?>"class="thumbnail" width="100"  alt="<?php echo $rowbt["anh"]; ?>">
                   <a href="index.php?view=chitietbt&mabt=<?php echo $rowbt[0]; ?>"><?php echo $rowbt["tenbt"]; ?></a>
               </div>
                 
                 <?php
                }

                 
             	$i++;
             }


 ?>

</div>
</div>