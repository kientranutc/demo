<?php 
if(isset($_GET["mabt"]))
{
 $mabt=$_GET["mabt"];
  $sqlbt="select * from bantin where mabt=".$mabt;
  $resultbt=mysqli_query($conn,$sqlbt);
  $rowbt=mysqli_fetch_array($resultbt);

  if(isset($_POST["upbantin"]))
  {
    $tenbantin=$_POST["tenbantin"];
   $ndtomtat=$_POST["ndtomtat"];
   $noidungchinh=$_POST["noidungchinh"];
    $trangthai=$_POST["trangthai"];
   $sqlupdate="update bantin set tenbt='$tenbantin',ndtomtat='$ndtomtat',noidung='$noidungchinh',trangthai='$trangthai' where mabt='$mabt'";
  mysqli_query($conn,$sqlupdate);
  header("location:quanly.php?view=listbantin");
  }

}
 ?>



<div id="editbantin">
<h3>Cập nhật bản tin</h3>
	<form action="" method="post" enctype="multipart/form-data">
	<table width="900">
		<tr>
			<td><div class="form-group"><label for="">Tên Bản tin</label>
			</div></td>
			
			<td>
			<div class="form-group">
				<input type="text" name="tenbantin" id="tenbantin" class="form-control" value="<?php echo $rowbt[1]; ?> " required>
			</div>
			</td>
		</tr>
		
		<tr>
		
			<td><div class="form-group"><label for="">Nội Dung Tóm Tắt</label>
			</div></td>
			<td>
			<div class="form-group">
				<textarea name="ndtomtat" id="ndtomtat" class="form-control"><?php echo $rowbt[2]; ?></textarea>
			</div>
			</td>
		</tr>
		<tr>
		
			<td><div class="form-group"><label for="">Nội Dung</label>
			</div></td>
			
			<td>
			<div class="form-group">
				<textarea name="noidungchinh" id="noidungchinh" class="form-control" required><?php echo $rowbt[3]; ?></textarea>
				<script src="../../js/gobal.js"></script>
			</div>
			</td>
		</tr>
		<tr>
			<td><div class="form-group"><label for="">Trạng Thái:</label>
			</div></td>
			<td>
			<div class="form-group">
				<select name="trangthai" class="form-control" required>
				<?php 
                 $gender = array("0"=>"Ẩn","1"=>"Hiện");
					foreach ($gender as $key => $value) {
						$check='';
						if($rowbt["trangthai"]==$key){
							$check="selected";}
				 ?>
				 <option <?php echo $check;?> value="<?php echo $key ?>"><?php echo $value; ?></option>
				 
				 <?php } ?>
				</select>
			</div>
			</td>
		</tr>
		
			<td></td>
			<td><input type="submit" class="btn btn-primary" value="Cập nhật" name="upbantin" class="form-control" >
			
		</tr>
		
	</table>
</form>

</div>