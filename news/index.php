<?php 
session_start(); 
include("module/connect.php");
include("module/function.php");
include("module/dem.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<?php 
$titile="";
   if(!isset($_GET["view"]))
   {
    $titile="Trang Chủ";
   }
   
    if(isset($_GET["view"])&&$_GET["matl"])
        {
          $matl=$_GET["matl"];
          $sqltheloai1="select * from theloai where Matl=".$matl;
          $resulttheloai1=mysqli_query($conn,$sqltheloai1);
          $rowtltitile=mysqli_fetch_array($resulttheloai1);
          $titile="Tin tức-".$rowtltitile["Tentl"];
        }
     if(isset($_GET["view"])&&$_GET["mabt"])
     {
     	$mabt1=$_GET["mabt"];
          $sqlbantin11="select * from bantin bt, theloai tl where bt.Matl=tl.Matl and mabt=".$mabt1;
          $resultbantin11=mysqli_query($conn,$sqlbantin11);
          $rowtltitile1=mysqli_fetch_array($resultbantin11);
          $titile=$rowtltitile1["Tentl"]."-".$rowtltitile1["tenbt"];
     }
     
 ?>
	<title><?php echo $titile; ?></title>
    <link rel="icon" href="http://www.iconarchive.com/download/i94540/blackvariant/button-ui-system-folders-drives/Sites.ico" type="image/x-icon"/>
	<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/owl.carousel.css">
	<link rel="stylesheet" href="css/owl.theme.css">
	<link rel="stylesheet" href="style.css">
	<script src="js/jquery-1.9.1.min.js"></script>
	<script src="js/owl.carousel.min.js"></script>
	<script src="js/slide.js">
	</script>
	<script src="js/jquery.sticky.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#menu").sticky({topSpacing:0});
		});

	</script>
	<script src="js/fb.js"></script>
	<script src="js/ajaxsearch.js"></script>


</head>
<body>
	<?php include("module/header.php"); ?>
	<section id="content">
		<?php include("module/slideshow.php"); ?>
		<section id="khung">

			<div class="container">
				<div class="row">
					<div class="col-md-8">


						<?php 
						if(isset($_GET["view"]))
						{
							$view=$_GET["view"];
							include("module/".$view.".php");
						}
						else
						{
							include("module/noibat.php") ;
							?>
							<div id="center-qc">
								<a href=""><img src="img/anhqc2.gif" alt=""></a>
							</div>
							<?php
							include("module/ctheloai.php") ;
							?>
								<div id="clean-fix"></div>

							<?php
                              include("module/gochai.php");
  
						}
						?>
					
						
						
					</div>
					<div class="col-md-4">
						<div id="sidebar">
							<div id="tabbt">
								<div role="tabpanel">

									<ul class="nav nav-tabs" role="tablist">
										<li role="presentation" class="active">
											<a href="#home" aria-controls="home" role="tab" data-toggle="tab">Tin Mới Nhất</a>
										</li>
										<li role="presentation">
											<a href="#tab" aria-controls="tab" role="tab" data-toggle="tab">Tin Xem Nhiều Nhất</a>
										</li>
									</ul>

									<!-- Tab panes -->
									<div class="tab-content">
										<div role="tabpanel" class="tab-pane active" id="home">
											<?php 

											$i=1;
											while ($rowmn=mysqli_fetch_array($resultmoinhat)) {
												if($i==1)
												{

													?>
													<div id="moinhat-first">
														<img src="<?php echo $rowmn["anh"];  ?>" class="thumbnail" alt="">
														<a href="index.php?view=chitietbt&mabt=<?php echo $rowmn[0]; ?>"><?php echo $rowmn["tenbt"]; ?></a>
													</div>

													<?php
												}
												else
												{
													?>
													<div id="moinhat-last">
														<ul>
															<li>
																<a href="index.php?view=chitietbt&mabt=<?php echo $rowmn[0]; ?>"><?php echo $rowmn["tenbt"]; ?></a>
															</li>
														</ul>
													</div>


													<?php

												}

												?>

												<?php
												$i++;}

												?>
											</div>
											<div role="tabpanel" class="tab-pane" id="tab">
												<?php 
												$sqlnn="select * from bantin bt,theloai tl where bt.Matl=tl.Matl and tl.Trangthai=1 order by luotxem limit 0,5";
												$resultnhieunhat=mysqli_query($conn,$sqlnn);
												$i=1;
												while ($rownn=mysqli_fetch_array($resultnhieunhat)) {
													if($i==1)
													{

														?>
														<div id="moinhat-first">
															<img src="<?php echo $rownn["anh"];  ?>" class="thumbnail" alt="">
															<a href="index.php?view=chitietbt&mabt=<?php echo $rownn[0]; ?>"><?php echo $rownn["tenbt"]; ?></a>
														</div>

														<?php
													}
													else
													{
														?>
														<div id="moinhat-last">
															<ul>
																<li>
																	<a href="index.php?view=chitietbt&mabt=<?php echo $rownn[0]; ?>"><?php echo $rownn["tenbt"]; ?></a>
																</li>
															</ul>
														</div>


														<?php

													}

													?>

													<?php
													$i++;}

													?>
												</div>
											</div>
										</div>
									</div>
									<div id="quangcao">
										<a href="https://www.facebook.com/profile.php?id=100005095362877">
											<img src="img/anhqc.gif" class="thumbnail" alt="">
										</a>
									</div>
									<div id="tuyendung">
									<div class="linetd">
											<a href=""><span class="glyphicon glyphicon-briefcase"></span>Tuyển Dụng</a>
										</div>
										<?php 
										$sqltd="select * from bantin bt,theloai tl where bt.Matl=tl.Matl and tl.Trangthai=0 order by luotxem limit 0,3";
										$resulttd=mysqli_query($conn,$sqltd);
										while ($rowtd=mysqli_fetch_array($resulttd)) {
											?>
											<div id="ndtuyendung">
												<img src="<?php echo $rowtd["anh"];  ?> " class="thumbnail" alt="">
												<a href="index.php?view=chitietbt&mabt=<?php echo $rowtd[0]; ?>"><?php echo $rowtd["tenbt"] ?></a>
											</div>
											<?php } ?>
										</div>

										<div id="songuoiol">
										<div class="linetd">
											<a href="">Thống kê truy cập</a>
										</div>
											<!-- Histats.com  (div with counter) --><div id="histats_counter"></div>
											<!-- Histats.com  START  (aync)-->
											<script type="text/javascript">var _Hasync= _Hasync|| [];
												_Hasync.push(['Histats.start', '1,3514386,4,406,165,100,00011111']);
												_Hasync.push(['Histats.fasi', '1']);
												_Hasync.push(['Histats.track_hits', '']);
												(function() {
													var hs = document.createElement('script'); hs.type = 'text/javascript'; hs.async = true;
													hs.src = ('//s10.histats.com/js15_as.js');
													(document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(hs);
												})();</script>
												<noscript><a href="/" target="_blank"><img  src="//sstatic1.histats.com/0.gif?3514386&101" alt="" border="0"></a></noscript>
												<!-- Histats.com  END  -->
											</div>
										</div>
									</div>
								</div>
							</div>
						</section>

						<p id="back-top">
							<a href="#top"><img src="img/top.png" alt=""></a>
						</p>
					</section>
					<footer id="footer">
						<div class="container">
							<div class="row">
								<address>
									CopyRight @ 2016 by <a href="https://www.facebook.com/profile.php?id=100005095362877">Kiên Trần</a>
								</address>
							</div>
						</div>
					</footer>
				</body>
				</html>