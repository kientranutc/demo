<?php 
if(isset($_SESSION["login"]))
{
  
}
else{
  header("location:../index.php");
}

 ?>
<div id="listbantin">
  <h3>Danh sách bản tin</h3>
  <?php 
  $sotintrang=10;
  if(isset($_GET["trang"])){
    $trang=$_GET["trang"];
    settype($trang, "int");
  }
  else
   if(!isset($_GET["trang"])&&$_GET["trang"]<1)
   {
     header('location:quanly.php?view=listbantin&trang=1');
   }
   {
    $from=($trang-1)*$sotintrang;   
    ?>	
    <table width="800" class="table table-striped">
      <tr>
       <th>Tên Bản Tin</th>
       <th>Trạng Thái</th>
       <th>Ngày Cập Nhật</th>
       <th>Thể loại</th>
     </tr>
     <?php 	
     $listbantin="select bt.mabt, bt.tenbt,tl.Tentl,bt.trangthai,bt.ngaycn from bantin bt, theloai tl where bt.Matl=tl.Matl ORDER BY bt.mabt DESC LIMIT $from,$sotintrang";
     $resultbt=mysqli_query($conn,$listbantin);
     while ($rowbt=mysqli_fetch_array($resultbt)){
      ?>

      <tr>
        <td><?php echo $rowbt["tenbt"]; ?></td>
        <td><?php echo  ($rowbt["trangthai"])?"Hiện":"Ẩn"; ?></td>
        <td><?php echo $rowbt["ngaycn"]; ?></td>
        <td><?php echo $rowbt["Tentl"]; ?></td>
      </tr>
      <tr>
       <td colspan="4"> <a href="">View</a> <a href="quanly.php?view=editbantin&mabt=<?php echo $rowbt[0]; ?>">edit</a> <a href="javascript:void(0)" onclick="del(<?php echo $rowbt[0]; ?>)">Delete</a></td>
     </tr>
     <?php }

     ?>
   </table>
 </div>
 <div class="menu">
  <?php 
  $sql1=" select * from bantin order by mabt desc";
  $query1=mysqli_query($conn,$sql1);
  $tongtrang=mysqli_num_rows($query1);
  $tongsotrang=ceil($tongtrang/$sotintrang);
  if($trang>1)
  {

   echo "<a href='quanly.php?view=listbantin&trang=".($trang-1)."'>Back</a>";
 }
 for($i=1;$i<=$tongsotrang;$i++)
 {
  ?>
  <a class="chon" <?php if($i==$trang) echo "style='background:white; color:red;border:1px solid #45E7A4'"; ?>href="quanly.php?view=listbantin&trang=<?php echo $i; ?>"><?php echo $i;?></a>
  <?php } 
  ?>
  <?php 
  if($trang<$tongsotrang)
    echo "<a href='quanly.php?view=listbantin&trang=".($trang+1)."'>Next</a>";
  ?>
  <?php } ?>
</div>
<script>
  function del(id)
  {
    check=confirm("bạn có muốn xóa không");
    if(check)
    {
     window.location="quanly.php?view=delbantin&id="+id;
   }

   else
   {
     window.location="quanly.php?view=listbantin";
   }
 }

</script>