<div>
	<?php 
     if(isset($_GET["matl"]))
     {
     	$matl=$_GET["matl"];
     $sqlupdate="select * from theloai where Matl=".$matl;
     $resulupdate=mysqli_query($conn,$sqlupdate);
     $rowupdat=mysqli_fetch_array($resulupdate);
     if(isset($_POST["capnhat"]))
     {
      $theloai=$_POST["theloai"];
      $trangthai=$_POST["trangthai"];
     $updatetl="update theloai set Tentl='$theloai',Trangthai='$trangthai' where Matl=".$matl;
     mysqli_query($conn,$updatetl);
     header("location:quanly.php?view=theloai");
     }
     }
	 ?>
	 <form action="" method="post">
	<table width="400">
		<tr>
		
			<td><div class="form-group"><label for="">Thể Loại</label>
			</div></td>
			
			<td>
			<div class="form-group">
				<input type="text" name="theloai" id="theloai" value="<?php echo $rowupdat[1]; ?> " class="form-control" required>
			</div>
			</td>
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