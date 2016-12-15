<?php 
session_start(); 
include("connect.php");
include("droptheloai.php");
include("function.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quản lý tin tức</title>
	<link rel="icon" href="http://www.iconarchive.com/download/i59043/chromatix/aerial/web.ico" type="image/x-icon" />
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/quanly.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script src="../../ckeditor/ckeditor.js"></script>
	
</head>

<body>
	<header id="header">
		<div class="container">
			<div class="row">
				<div class="col-md-10">
				
			<h2>QUẢN LÝ TIN TỨC</h2>
				</div>
				<div class="col-md-2 logout">
					<a href="quanly.php?view=logout">Logout:<?php echo "(".$_SESSION["login"][1].")" ?></a>
				</div>
			</div>
		</div>
	</header>
	<section id="content">
	<div class="container">
	     <div class="row">
	     <div class="col-md-2">
		<div id="sidebar">
		<h3>Danh mục quản lý</h3>
			<nav id="menu-ql">
				<ul>
					<li><a href="quanly.php?view=addslide">Quản lý slideshow</a></li>
					<li><a href="quanly.php?view=theloai">Quản lý Thể Loại</a></li>
					<li><a href="quanly.php?view=addbantin">Quản lý bản Tin</a></li>
					<li><a href="quanly.php?view=addvideo">Quản lý video Hài</a></li>
					<li><a href="../../index.php">vê trang chủ</a></li>

				</ul>
			</nav>
		</div>
		</div>
		<div class="col-md-10">
		<div id="noidung">
		  <h3>Quản lý tin tức</h3>
			<?php 
             if(isset($_GET["view"]))
             {
             	$view=$_GET["view"];
             	include("../module/".$view.".php");
             }
             else
             {
              header("location:quanly.php");
             }
			 ?>
		</div>
		</div>
		</div>
		</div>
	</section>
	<footer id="footer">
		<div class="container">
		<address>
			CopyRight @ 2016 by <a href="https://www.facebook.com/profile.php?id=100005095362877">Kiên Trần</a>
		</address>
		</div>
	</footer>

</body>
</html>

