<?php 
  if(isset($_POST["taomoi"]))
  {
  	$video=$_POST["video"];
  	$trangthai=$_POST["trangthai"];
  	$insertvideo="insert into video(ndung,trangthai) value('$video','$trangthai')";
  	mysqli_query($conn,$insertvideo);
  	header("location:quanly.php?view=listvideo");
  }

 ?>
<form action="" method="post">
	<table width="400">
		<tr>
		
			<td><div class="form-group"><label for="">Link video</label>
			</div></td>
			
			<td>
			<div class="form-group">
				<input type="text" name="video" id="video" class="form-control" required>
			</div>
			</td>
		</tr>
		<tr>
			<td><div class="form-group"><label for="">Trạng Thái</label>
			</div></td>
			<td>
			<div class="form-group">
				<select name="trangthai" class="form-control" required>
					<option value="">-Chọn Trạng Thái-</option>
					<option value="1">Hiện</option>
					<option value="0">Ẩn</option>
				</select>
			</div>
			</td>
		</tr>
		
		<tr>
			<td></td>
			<td><input type="submit" class="btn btn-primary" value="Tạo mới" name="taomoi" class="form-control" >
			<input type="reset"  class="btn btn-warning" value="Nhập Lại" name="reset" class="form-control" ></td>
		</tr>
		
	</table>
</form>
<a href="quanly.php?view=listvideo">List video</a>