
<?php 
if(isset($_POST["taomoi"]))
{
  $theloai=$_POST["theloai"];
  $trangthai=$_POST["trangthai"];
  $kttheloai="select * from theloai where Tentl='$theloai'";
  $kt=mysqli_query($conn,$kttheloai);
  $num=mysqli_num_rows($kt);
  if($num>0)
  {
   echo "<script> alert('Thể loại đã tồn tại!');</script>";
  }
  else
  {
  $inserttheloai="insert into theloai(Tentl,Trangthai) value('$theloai','$trangthai')";
  mysqli_query($conn,$inserttheloai);
  header("location:quanly.php?view=theloai");
}
}
 ?>

<div id="theloai">
<h3>Quản Lý Thể Loại</h3>
<form action="" method="post">
	<table width="400">
		<tr>
		
			<td><div class="form-group"><label for="">Thể Loại</label>
			</div></td>
			
			<td>
			<div class="form-group">
				<input type="text" name="theloai" id="theloai" class="form-control" required>
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
<h3>Danh sách thể loại</h3>
<table width="400" border="1">
<tr>
	<th>
		Tên Thể Loại
	</th>
	<th>
		Trạng Thái
	</th>
	<th colspan="2"></th>
</tr>
<?php 
$selecttheloai="select * from theloai";
$resulttheloai=mysqli_query($conn,$selecttheloai);
$numm=mysqli_num_rows($resulttheloai);
if($numm==0)
{
	echo "chưa có bản ghi ";
}
else
{
	while ($row=mysqli_fetch_array($resulttheloai)) {
 ?>
 <tr>
 	<td><?php echo $row["Tentl"]; ?></td>
 	<td><?php echo ($row["Trangthai"])?"Hiện":"Ẩn"; ?></td>
    <td><a href="quanly.php?view=edittheloai&matl=<?php echo $row[0]; ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
 	<td><a href="javascript:void(0)" onclick="xoa(<?php echo $row[0]; ?>)"><span class="glyphicon glyphicon-trash"></span></a></td>
 </tr>

 <?php }}
  ?>
 </table>
</div>
<?php 
 if(isset($_GET["id"]))
 {
 	$id=$_GET["id"];
 	$deletetl="delete from theloai where Matl=".$id;
 	mysqli_query($conn,$deletetl);
 	header("location:quanly.php?view=theloai");
 }

 ?>
<script>
function xoa(id)
{
	check=confirm("bạn có muốn xóa không");
	if(check)
	{
		window.location="quanly.php?view=theloai&id="+id;
	}
	else
	{

	}
}
</script>