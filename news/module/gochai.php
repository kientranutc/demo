<div id="gochai">
  <div id="linehai">
  	<a>Góc hài</a>
  </div>
	<div id="hai" class="owl-carousel">
	<?php 
     $sqlvideo="select * from video order by mavi DESC limit 0,5";
     $resultvideo=mysqli_query($conn,$sqlvideo);
     while ($rowvideo=mysqli_fetch_array($resultvideo)) {
     	
	 ?>
	<div class="slidehai"> 
		<iframe
       src="<?php echo $rowvideo["ndung"]; ?>">
       </iframe>
	</div>
	<?php } ?>
	

</div>
</div>