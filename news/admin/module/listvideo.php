<h3>Danh sách video</h3>
<table width="400" border="1" class="table table-striped">
<tr>
	<th>
		link video
	</th>
	<th>
		Trạng Thái
	</th>
	<th colspan="2"></th>
</tr>
<?php 
$selecttheloai="select * from video";
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
     <td>
     	<iframe width="200" height="100"
src="<?php echo $row["ndung"]; ?>">
</iframe>
     </td>
 	
 	<td><?php echo ($row["trangthai"])?"Hiện":"Ẩn"; ?></td>
    <td><a href="quanly.php?view=editvideo&mavi=<?php echo $row[0]; ?>"><span class="glyphicon glyphicon-edit"></span></a></td>
 	<td><a href="javascript:void(0)" onclick="xoa(<?php echo $row[0]; ?>)"><span class="glyphicon glyphicon-trash"></span></a></td>
 </tr>

 <?php }}
  ?>
 </table>
<?php 
 if(isset($_GET["id"]))
 {
 	$id=$_GET["id"];
 	$deletetl="delete from video where mavi=".$id;
 	mysqli_query($conn,$deletetl);
 	header("location:quanly.php?view=listvideo");
 }

 ?>
<script>
function xoa(id)
{
	check=confirm("bạn có muốn xóa không");
	if(check)
	{
		window.location="quanly.php?view=listvideo&id="+id;
	}
	else
	{

	}
}
</script>