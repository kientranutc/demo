<div id="cactheloai">
							
							<?php 
							while ($rowtl2=mysqli_fetch_array($resulttheloai1)) {

								?>
								
								<div class="theloai">
									<div class="lines">
										<a href="javascript:void(0)"><?php echo $rowtl2["Tentl"]; ?>&nbsp;<span class="glyphicon glyphicon-th-list"></span></a>
									</div>
									<?php 
									$sqlbat="select * from bantin where Matl='$rowtl2[0]' order by mabt DESC limit 0,5";
									$resultsqlbt=mysqli_query($conn,$sqlbat);
									$i=1;
									while ($rows=mysqli_fetch_array($resultsqlbt)) {
										if($i==1)
										{
											?>
											<div class="theloaione">
												<img src="<?php echo $rows["anh"]; ?>" class="thumbnail" alt="">
												<a href="index.php?view=chitietbt&mabt=<?php echo $rows[0]; ?>"><?php echo $rows["tenbt"]; ?></a><br/>
												<span><i>Ngày đăng:<?php echo $rows["ngaycn"]; ?></i></span>
											</div>
											<?php
										}
										else
										{
										?>
										<div class="theloaitwo">
											<ul> 
												<li>
													<a href="index.php?view=chitietbt&mabt=<?php echo $rows[0]; ?>"><?php echo $rows["tenbt"]; ?></a>

												</li>

											</ul>

										</div>
										<?php
										}$i++;}
										?>
										<a href="index.php?view=theloai&matl=<?php echo $rowtl2[0]; ?>">Xem tiếp...</a>
									</div>
									<?php

								}
								?>

							</div>