<?php require_once ("templates/top.php"); ?>
		</div>
	</div><div class="content">
			
			<div class="services">
				<div class="container">
					<h2>НАША МЕБЕЛЬ:</h2>
					<p style='padding:0px 5px 2px 5px;margin:3px 5px 0px 5px; font-weight: bold;color: black; float:left;'>Поиск по цене:</p>

	<form method="post" action="product.php" style='float:left;'>
				
				
				<p style='padding:0px 0 2px 0;margin:3px 5px 0px 0px; color: black; float:left;'>Стартовая цена: <input style="padding:0px 5px 0px 5px;" name="start_price">
				
	
				Конечная цена: <input style="padding:0px 5px 0px 5px;" name="end_price">
				
				
				<input style="padding:0px 5px 0px 5px;" class="send" type="submit" value="поиск"></p>
				</form>      
      
	<?php 
	
	if((isset($_POST['start_price']))&&(isset($_POST['end_price']))&&(preg_match("|^[\d]*$|",$_POST['start_price']))&&(preg_match("|^[\d]*$|",$_POST['start_price']))){
		$start_price=$_POST['start_price'];
		$end_price=$_POST['end_price'];
		if($start_price>$end_price){
			$start_price=0;
		}
	}
	if((!isset($_POST['end_price']))&&(isset($_POST['start_price']))&&(preg_match("|^[\d]*$|",$_POST['start_price']))){
		$end_price=9999999;
		$start_price=$_POST['start_price'];
	}
	if((!isset($_POST['start_price']))&&(isset($_POST['end_price']))&&(preg_match("|^[\d]*$|",$_POST['end_price']))){
		$start_price=0;
		$end_price=$_POST['end_price'];
	}
	
	?>
	  
      <div style=" width:100%; height:1px; clear:both"></div>
	  
	  <p style='padding:0px 5px 2px 5px;margin:3px 5px 0px 5px;; font-weight: bold;color: black; float:left;'>Поиск по фирме:</p>
	  
	  <?php 
	  
		$sections= mysqli_query("SELECT * FROM `section`", $connection);
	  
		while($rowSection = mysqli_fetch_array($sections)){
			
		$section_name=$rowSection['section_name']; 
		
		echo "<a href='product.php?firm=$section_name' style='padding:2px 5px 2px 5px; font-size:18px; float:left;'>".$section_name."</a>";

		}
		?>
		
	  <a href='product.php' style='padding:2px 5px 2px 5px; font-size:18px; float:left;'>Показать все</a>
	  
	  <div style=" width:100%; height:1px; clear:both"></div>
	  
	  <p style='padding:0px 5px 2px 5px;margin:3px 5px 0px 5px;; font-weight: bold;color: black; float:left;'>Поиск по типу:</p>
	  
	  <?php 
	  
		$types= mysqli_query("SELECT * FROM `type`",$connection);
	  
		while($rowTypes = mysqli_fetch_array($types)){
			
		$type=$rowTypes['type']; 
		$type_id=$rowTypes['id']; 
		
		echo "<a href='product.php?type=$type' style='padding:2px 5px 2px 5px; font-size:18px; float:left;'>".$type."</a>";

		}
		?>
		
	  <a href='product.php' style='padding:2px 5px 2px 5px; font-size:18px; float:left;'>Показать все</a>
					
					<div class="services-grids">
					
					<?php 
	
	$i=0;
	$o=0;
	$c=0;
	
	if(isset($start_price)&&isset($end_price)){
		$product= mysqli_query("SELECT * FROM `furniture` WHERE (cost>='".$start_price."' AND cost<='".$end_price."') ORDER BY cost",$connection);
	}else{
		$product= mysqli_query("SELECT * FROM `furniture`  ORDER BY cost",$connection);
	}
	
	
	
	while($row = mysqli_fetch_array($product)){
		
		$id=$row['id'];
		$firm_id=$row['firm_id'];
		$type_id=$row['type_id'];
		$name=$row['name'];
		$image=$row['image'];
		$cost=$row['cost'];
		$short_description=$row['short_description'];
		$description=$row['description'];
		$characteristics=$row['characteristics'];
		
		$firms= mysqli_query("SELECT * FROM `section`",$connection);
		
		while($rowFirm = mysql_fetch_array($firms)){
			
		$section_name=$rowFirm['section_name']; 

		if(isset($_GET['firm'])&&$_GET['firm']==$section_name){
			$o=$o+1;
		}
		}
		
		if($o>0){
			$section= mysqli_query("SELECT * FROM `section` WHERE (id='".$firm_id."' AND section_name='".$_GET['firm']."')",$connection);
		}else{
			$section= mysqli_query("SELECT * FROM `section` WHERE id=".$firm_id,$connection);
		}
		
		while($rowSection = mysqli_fetch_array($section)){
			
			$section_name=$rowSection['section_name'];
			
			$types= mysqli_query("SELECT * FROM `type`",$connection);
			
			while($rowTyper = mysqli_fetch_array($types)){
			
			$type=$rowTyper['type']; 

			if(isset($_GET['type'])&&$_GET['type']==$type){
				$c=$c+1;
			}
			}
			
			if($c>0){
				$typer= mysqli_query("SELECT * FROM `type` WHERE (id='".$type_id."' AND type='".$_GET['type']."')",$connection);
			}else{
				$typer= mysqli_query("SELECT * FROM `type` WHERE id=".$type_id,$connection);
			}
			
			
		
			while($rowType = mysqli_fetch_array($typer)){
				
				$type=$rowType['type'];
				
				if($i==0){echo "<div class='row'>";}
				if($i%3){}else{echo "</div><div class='row'>";}
				
				
				?>
					
						<div class="col-md-4 services-grid">
							<div class="ser1">
								 <img src="<?php echo $image; ?>" class="img-responsive" alt="" />
								 <h4><?php echo $name; ?></h4>
								 <p><?php echo $short_description; ?></p>
								 <p style="color:red;font-weight:bold;"><?php echo $cost; ?>$</p>
				<a href="furniture.php?id=<?php echo $id; ?>">Посмотреть</a><br><br>
							</div>
						</div>
						<?php

				$i=$i+1;
				
			}
		}
	}

			?>
						<div class="clearfix"></div>
					</div>	
				</div>	
			</div>			
		</div></div>
<?php require_once ("templates/bottom.php"); ?>	
