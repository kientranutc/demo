<?php 
	$sqlbantin="select * from bantin order by rand() limit 0,5";
	$result=mysqli_query($conn,$sqlbantin);
	//theloai
	$sqltheloai="select * from theloai where Trangthai=1";
	$resulttheloai=mysqli_query($conn,$sqltheloai);
	//bài viết mới nhất
	//theloai2
	$sqltheloai1="select * from theloai where Trangthai=1";
	$resulttheloai1=mysqli_query($conn,$sqltheloai1);
	//
	$sqlmn="select * from bantin bt,theloai tl where bt.Matl=tl.Matl and tl.Trangthai=1 order by mabt DESC limit 0,5";
	$resultmoinhat=mysqli_query($conn,$sqlmn);
	
	
 ?>