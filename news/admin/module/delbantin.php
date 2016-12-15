<?php 
 if(isset($_GET["id"]))
 {
 	$id=$_GET["id"];
 	$delbantin="delete from bantin where mabt='$id'";
 	mysqli_query($conn,$delbantin);
 	header("location:quanly.php?view=listbantin");
 }

 ?>