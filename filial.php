<?php require_once ("templates/top.php"); ?>
		</div>
	</div>
					
	<div class="content">
			<!-- gallery -->
		<div class="gallery-top">
			<!-- container -->
			<div class="container">
				<div class="gallery-info">
				<?php if(isset($_GET['a'])){ 
				if($_GET['a']=="Minsk"){
				$gorod="Минск";
				$where="Минске";
				$image="images/g1.jpg";
				$about="улица Славинского 37.";}
				if($_GET['a']=="Grodno"){
				$gorod="Гродно";
				$image="images/g2.jpg";
				$where="Гродно";
				$about="улица Кастуся 4.";}
				if($_GET['a']=="Mogilev"){
				$gorod="Могилилёв";
				$where="Могилилёве";
				$image="images/g3.jpg";
				$about="улица Ленина 5.";}
				}
				?>
					<h2><?php echo $gorod ?></h2>
				</div>
				<div class="gallery-grids-top">
					<div class="gallery-grids">
						<div class="col-md-3 gallery-grid">
							<a class="example-image-link" href="<?php echo $image ?>" data-lightbox="example-set" data-title=""><img class="example-image" src="<?php echo $image ?>" alt=""/></a>
						</div>
						<h2 style="float: left;">Наш магазин в <?php echo $where ?></h2><br><br><br>
						<p style="float: left;"><?php echo $about ?></p>
						<div class="clearfix"> </div>
			
					</div>
					
						
					<script src="js/lightbox-plus-jquery.min.js"></script>
				</div>
			</div>
			<!-- //container -->
		</div>
	<!-- //gallery -->
 <?php require_once ("templates/bottom.php"); ?> 
