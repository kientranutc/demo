<?php 
session_start(); 
	include("module/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login</title>
    <link rel="icon" href="http://www.iconarchive.com/download/i59043/chromatix/aerial/web.ico" type="image/x-icon" />
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="../style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script language=JavaScript> var txt="(¯`·.º-:¦:-Đăng Nhập Quản Lý Tin Tức-:¦:-º.·´¯)"; var espera=200; var refresco=null; function rotulo_title() { document.title=txt; txt=txt.substring(1,txt.length)+txt.charAt(0); refresco=setTimeout("rotulo_title()",espera); } rotulo_title();</script>
</head>
<?php 
if(isset($_POST["login"]))
	{
		
     $username=$_POST["username"];
     $password=$_POST["password"];
     $sqllogin="select * from admin where username='$username' and pass='$password'";
     $resultlogin=mysqli_query($conn,$sqllogin);
     $num=mysqli_num_rows($resultlogin);
     if($num>0)
     {
     	$data=mysqli_fetch_row($resultlogin);
         $_SESSION["login"]=$data;
         echo "<script> alert('Đăng nhập thành công');</script>";
        header("location:module/quanly.php?view=listbantin");
     }
     else{
     	echo "<script> alert('lỗi đăng nhập');</script>";
     }


	}
 ?>
<body>
	<header id="header">
		<div class="container">
			<h2>QUẢN LÝ TIN TỨC</h2>
		</div>
	</header>
	<section id="content">
		<div class="container">
			<div id="dangnhap">
			<h3>Đăng Nhập</h3>
				<div class="row">
					<div class="col-xs-12 col-md-12">
						<form role="form" action="" method="POST">
							<div class="form-group">
								<div class="input-group">
									<span class="input-group-addon">
										<i class="glyphicon glyphicon-user"></i>
									</span> 
									<input class="form-control" placeholder="Username" name="username" type="text" autofocus >
								</div>
							</div>
							<div class="form-group">
				
								<div class="input-group">
									<span class="input-group-addon">
										<i class="glyphicon glyphicon-lock"></i>
									</span>
									<input class="form-control" placeholder="Password" name="password" type="password">
								</div>
							</div>
							<div class="form-group">
								<input type="submit" name="login" class="btn btn-lg btn-primary btn-block" value="Đăng Nhập">
							</div>

						</form>
					</div>
				</div>
				<a href="">Quên mật khẩu</a>
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