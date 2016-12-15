
<?php 
 if(isset($_POST["addbantin"]))
 {
   $tenbantin=$_POST["tenbantin"];
   $ndtomtat=$_POST["ndtomtat"];
   $noidungchinh=$_POST["noidungchinh"];
   $theloai=$_POST["theloai"];
   $nguoicn=$_POST["nguoicn"];
   $ngaycn=ngaythang();
   
 	$path = "upload/";//tao duong dan vat ly upload
	$tmp_name = $_FILES["anh"]["tmp_name"];//laay ra duong dan file dc dua len server
	$fileName = $_FILES["anh"]["name"];//lay ra ten file
	$temfileName = $path.$fileName;
	if($_FILES["anh"]["type"]=="image/jpeg"|| $_FILES['anh']['type'] == "image/png"
      || $_FILES['anh']['type'] == "image/gif"){//kiem tra file up len co dung dinh dang ko
		//di chuyen file tu thu muc tam sang thu muc upload
		move_uploaded_file($tmp_name, "../../".$path . $fileName);
	}else{
		echo "<script> alert('upload không thành công')</script>";
	}
	$insertbantin="insert into bantin(tenbt,ndtomtat,noidung,ngaycn,nguoicn,luotxem,anh,trangthai,Matl)";
	$insertbantin.="value('$tenbantin','$ndtomtat','$noidungchinh','$ngaycn','$nguoicn','0','$temfileName','1','$theloai')";
	mysqli_query($conn,$insertbantin);
	header("location:quanly.php?view=listbantin");
 }

 ?>
<div id="addbantin">
<form action="" method="post" enctype="multipart/form-data">
	<table width="800">
		<tr>
			<td><div class="form-group"><label for="">Tên Bản tin</label>
			</div></td>
			
			<td>
			<div class="form-group">
				<input type="text" name="tenbantin" id="tenbantin" class="form-control" required>
			</div>
			</td>
		</tr>
		
		<tr>
		
			<td><div class="form-group"><label for="">Nội Dung Tóm Tắt</label>
			</div></td>
			
			<td>
			<div class="form-group">
				<textarea name="ndtomtat" id="ndtomtat" class="form-control"></textarea>
			</div>
			</td>
		</tr>
		<tr>
		
			<td><div class="form-group"><label for="">ảnh tiêu đề</label>
			</div></td>
			
			<td>
			<div class="form-group">
				<input type="file" name="anh" id="anh" class="form-control" required>
			</div>
			</td>
		</tr>
		<tr>
		
			<td><div class="form-group"><label for="">Nội Dung</label>
			</div></td>
			
			<td>
			<div class="form-group">
				<textarea name="noidungchinh" id="noidungchinh" class="form-control" required></textarea>
				<script src="../../js/gobal.js"></script>
			</div>
			</td>
		</tr>
		<tr>
			<td><div class="form-group"><label for="">Thể Loại</label>
			</div></td>
			<td>
			<div class="form-group">
				<select name="theloai" class="form-control" required>
					<option value="">-Chọn Thể loại-</option>
					<?php while($rowtl=mysqli_fetch_array($result)) {
					 ?>
					<option value="<?php echo $rowtl[0]; ?>"><?php echo $rowtl[1]; ?></option>
					<?php } ?>
					
				</select>
			</div>
			</td>
		</tr>
		<tr>
			<td><div class="form-group"><label for="">Người cập nhật</label>
			</div></td>
			
			<td>
			<div class="form-group">
				<input type="text" name="nguoicn" id="nguoicn" class="form-control" required>
			</div>
			</td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" class="btn btn-primary" value="Tạo mới" name="addbantin" class="form-control" >
			<input type="reset"  class="btn btn-warning" value="Nhập Lại" name="reset" class="form-control" ></td>
		</tr>
		
	</table>
</form>
<a href="quanly.php?view=listbantin">Danh sách bản tin</a>
</div>