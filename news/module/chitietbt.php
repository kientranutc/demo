<?php 
if(isset($_GET["mabt"]))
{
	$mabt=$_GET["mabt"];
	//tang luot xem
	$updateview="update bantin set luotxem=luotxem+1 where mabt=".$mabt;
    mysqli_query($conn,$updateview);
	$sqlct="SELECT * from bantin bt , theloai tl WHERE bt.Matl=tl.Matl and bt.mabt=".$mabt;
	$resultct=mysqli_query($conn,$sqlct);
	
	$rowct=mysqli_fetch_array($resultct);
	
	$sqllaybt="select * from bantin where matl=".$rowct["Matl"]." and mabt<>".$rowct["mabt"]." order by rand()";
	$resultheloai=mysqli_query($conn,$sqllaybt);


}
?>
<div id="chitietbt">
	<div id="linect">
		<h3>Trang chủ>>Tin Tức>><?php echo $rowct["Tentl"]; ?></h3>
	</div>

	<div id="ndchitietbantin">
		<h4><?php echo $rowct["tenbt"]; ?></h4>
		<span><?php echo "Ngày đăng:".$rowct["ngaycn"]; ?></span>
		<div id="nodungct">
			<?php echo $rowct["noidung"]; ?>
		</div>
		<h3><i><?php echo $rowct["nguoicn"]; ?></i></h3>
		<div id="blbantin">
			<span class="glyphicon glyphicon-hand-down">Bình luận ngay</span>
		</div>
		<div class="fb-comments" data-href="" data-colorscheme="light" data-numposts="5" data-width="700"></div>
		<div id="tincu">
			<span>Những tin cũ hơn</span>
		</div>
		<div id="cactincu">
			<div id="tincuhon" class="owl-carousel">
				<?php 
				while ($rowtincu=mysqli_fetch_array($resultheloai)) {
					?>
					<div id="contentcu"> 
						<a href="index.php?view=chitietbt&mabt=<?php echo $rowtincu[0]; ?>" data-toggle="tooltip" data-placement="top" title="<?php echo $rowtincu["tenbt"]; ?>"><img src="<?php echo $rowtincu["anh"]; ?>" alt=""></a>
					</div>
					<?php
				}
				?>


			</div>
		</div>
	</div>
</div>
