<div>
	<?php 
     if(isset($_GET["mavi"]))
     {
     	$mavi=$_GET["mavi"];
     $sqlupdate="select * from video where mavi=".$mavi;
     $resulupdate=mysqli_query($conn,$sqlupdate);
     $rowupdat=mysqli_fetch_array($resulupdate);
     if(isset($_POST["capnhat"]))
     {
     
      $trangthai=$_POST["trangthai"];
     $updatetl="update video set Trangthai='$trangthai' where mavi=".$mavi;
     mysqli_query($conn,$updatetl);
     header("location:quanly.php?view=listvideo");
     }
     }
	 ?>
	 <form action="" method="post">
	<table width="400">
		<tr>
		
			<td><div class="form-group"><label for="">Video</label>
			</div></td>
			
			<td>
		
     	<iframe width="200" height="100"
src="<?php echo $rowupdat["ndung"]; ?>">
</iframe>
		</tr>
		
		<tr>
			<td><div class="form-group"><label for="">Trạng Thái</label>
			</div></td>
			<td>
			<div class="form-group">

				<select name="trangthai" class="form-control" required>
				<?php 
                 $gender = array("0"=>"Ẩn","1"=>"Hiện");
					foreach ($gender as $key => $value) {
						$check='';
						if($rowupdat[2]==$key){
							$check="selected";}
				 ?>
				 <option <?php echo $check;?> value="<?php echo $key ?>"><?php echo $value; ?></option>
				 
				 <?php } ?>
					
				</select>
			</div>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" class="btn btn-primary" value="Cập Nhật" name="capnhat" class="form-control" >
			</td>
		</tr>
		
	</table>
</form>
</div>