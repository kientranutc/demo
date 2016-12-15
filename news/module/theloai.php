
<?php 
if(!isset($_GET["matl"])||$_GET["matl"]<1)
  {
    header("location:./");
  }
  else

	if(isset($_GET["matl"]))
	{
		$matl=$_GET["matl"];
		$sqltheloai="select * from theloai where Matl=".$matl;
		$resulttheloai=mysqli_query($conn,$sqltheloai);
		$theloai=mysqli_fetch_array($resulttheloai);
	
	}
  
	
?>
<div id="theloai">
<div id="linetl">


	<h4>Trang Chủ>> <?php echo $theloai["Tentl"]; ?></h4>
  <?php 
$sotintrang=8;
  if(isset($_GET["trang"])){
    $trang=$_GET["trang"];
    settype($trang, "int");
  }
  else
   if(!isset($_GET["trang"])&&$_GET["trang"]<1)
   {
     header('location:index.php?view=theloai&matl='.$matl.'&trang=1');
   }
   {
    $from=($trang-1)*$sotintrang;   
      $sqlbantin="select * from bantin where Matl='$matl' order by mabt DESC LIMIT $from,$sotintrang";
    $resultbantin=mysqli_query($conn,$sqlbantin);
    ?>  
  <div id="khung-tl">
	<?php 
     while ($rowbts=mysqli_fetch_array($resultbantin)) {
     	?>
     	<div id="ndbantin">
     		<img src="<?php echo $rowbts["anh"]; ?>" class="thumbnail"alt="">
     		<div id="content-nd">
     		<a href="index.php?view=chitietbt&mabt=<?php echo $rowbts[0]; ?>"><?php echo $rowbts["tenbt"]; ?></a><br/>
     		<span ><i><?php echo "Ngày cập nhật:".$rowbts["ngaycn"]; ?></i></span>
     		<div id="ndtomtat"><?php echo $rowbts["ndtomtat"]; ?></div>
     		
     		<a id="read" href="index.php?view=chitietbt&mabt=<?php echo $rowbts[0]; ?>">Read more</a>
     	</div>
     	</div>
     <?php
     }
	 ?>
  </div>
</div>
</div>
<div class="menu-pt">
<ul class="pagination">
  <?php 
  $sql1=" select * from bantin where Matl='$matl' order by mabt DESC";
  $query1=mysqli_query($conn,$sql1);
  $tongtrang=mysqli_num_rows($query1);
  $tongsotrang=ceil($tongtrang/$sotintrang);
  if($trang>1)
  {

    echo "<li><a href='index.php?view=theloai&matl=".$matl."&trang=".($trang-1)."'>Back</a></li>";
 }
 for($i=1;$i<=$tongsotrang;$i++)
 {
  ?>
  <li><a class="chon" <?php if($i==$trang) echo "style='background:#3AF6E7; color:red;'"; ?> href="index.php?view=theloai&matl=<?php echo $matl; ?>&trang=<?php echo $i; ?>"><?php echo $i;?></a></li>
  <?php 
  } 
  ?>
  <?php 
  if($trang<$tongsotrang)
    echo "<li><a href='index.php?view=theloai&matl=".$matl."&trang=".($trang+1)."'>Next</a></li>";
  ?>
  <?php } ?>
  </ul>
</div>

