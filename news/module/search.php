<?php 

if(isset($_GET["s"]))
{
	$s=$_GET["s"];
}

?>
<div id="timkiem">
	<div id="theloai">
		<div id="linetl">
			<h4>Tìm kiêm: <?php echo '"'.$s.'"'; ?></h4>
			<?php 
			$sotintrang=5;
			if(isset($_GET["trang"])){
				$trang=$_GET["trang"];
				settype($trang, "int");
			}
			else
				if(!isset($_GET["trang"])&&$_GET["trang"]<1)
				{
					header('location:index.php?view=search&s='.$s.'&trang=1');
				}
				{
					$from=($trang-1)*$sotintrang;   
					$sqltk="select * from bantin where tenbt like '%$s%' LIMIT $from,$sotintrang";

					$resulttk=mysqli_query($conn,$sqltk);
					?>  
					<div id="khung-tl">
						<?php 
						while ($rowtk=mysqli_fetch_array($resulttk)) {
							?>
							<div id="ndbantin">
								<img src="<?php echo $rowtk["anh"]; ?>" class="thumbnail"alt="">
								<div id="content-nd">
									<a href="index.php?view=chitietbt&mabt=<?php echo $rowtk[0]; ?>"><?php echo $rowtk["tenbt"]; ?></a><br/>
									<span ><i><?php echo "Ngày cập nhật:".$rowtk["ngaycn"]; ?></i></span>
									<div id="ndtomtat"><?php echo $rowtk["ndtomtat"]; ?></div>

									<a id="read" href="index.php?view=chitietbt&mabt=<?php echo $rowtk[0]; ?>">Read more</a>
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
					$sql2="select * from bantin where tenbt like '%$s%'";
					$query2=mysqli_query($conn,$sql2);
					$tongtrang=mysqli_num_rows($query2);
					$tongsotrang=ceil($tongtrang/$sotintrang);
					if($trang>1)
					{

						echo "<li><a href='index.php?view=search&s='.$s.'&trang=".($trang-1)."'>Back</a></li>";
					}
					for($i=1;$i<=$tongsotrang;$i++)
					{
						?>
						<li><a class="chon" <?php if($i==$trang) echo "style='background:#3AF6E7; color:red;'"; ?> href="index.php?view=search&s=<?php echo $s; ?>&trang=<?php echo $i; ?>"><?php echo $i;?></a></li>
						<?php 
					} 
					?>
					<?php 
					if($trang<$tongsotrang)
					{
						?>
						<li><a href="index.php?view=search&s=<?php echo $s; ?>&trang=<?php echo ($trang+1); ?>">Next</a></li>
					<?php
				      }
					?>
					<?php } ?>
				</ul>
			</div>
		</div>