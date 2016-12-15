<header id="header-trangchu">
		<div class="container">
			<div class="row title">
				<div class="col-xs-12 col-md-4">
					<a href="./">
						<img id="logo" src="img/logo.png" alt="">
					</a>
				</div>
				<div class="col-xs-12 col-md-8">
					<div id="seacrh">
						<form class="form-wrapper cf" >
							<input type="text" placeholder="Bạn muốn tìm gì.." id="tk" >

							<a  onclick="showResult()">Search</a>
						</form>
						<script>
					         function showResult() {
					         	var sea=document.getElementById("tk").value;
							    window.location="index.php?view=search&s="+sea;
							}

						</script>
					</div>
					
				</div>
			</div>
			
		</div>
		<div id="menu">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<nav class="navbar navbar-default" role="navigation">
							<div class="container-fluid">
								<!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
										<span class="sr-only">Toggle navigation</span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
										<span class="icon-bar"></span>
									</button>


								</div>

								<!-- Collect the nav links, forms, and other content for toggling -->
								<div class="collapse navbar-collapse navbar-ex1-collapse">

									<ul class="nav navbar-nav navbar-left" id="menu-top">
										<li><a  href="./"><img src="img/home.png" data-toggle="tooltip" data-placement="bottom" title="Trang Chủ" alt=""></a></li>
										<?php 
										while ($rowtl=mysqli_fetch_array($resulttheloai)) {
											?>
											<li><a href="index.php?view=theloai&matl=<?php echo $rowtl[0]; ?>"><?php echo $rowtl[1] ?></a></li>
											<?php
										}
										?>
										
										

									</ul>
								</div><!-- /.navbar-collapse -->
							</div>
						</nav>
					</div>
				</div>
			</div>
			
		</div>
	</header>