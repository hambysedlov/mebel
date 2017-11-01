<?php require_once ("templates/top.php"); ?>
		</div>
	</div>
	<div class="content">
		<div class="typography">
			<!-- container-wrap -->
			<div class="container">
				
					
				<div class="grid_3 grid_5">
					<?php 
			
			if(isset($_POST['select'])&&isset($_POST['message'])){
				echo $_POST['select']."<br>".$_POST['message'];
				require_once ("templates/subs.php");
				
			}
			
			if(isset($_GET['a'])&&$_GET['a']=="exit"){
				unset($_SESSION["user_id"]);
			}
			
			if(isset($_GET['sub'])&&$_GET['sub']=="no"&&isset($_SESSION['user_id'])){
				$resultUnsub = mysqli_query ("UPDATE `subscribers` SET sections_id='' WHERE id=".$_SESSION['user_id'],$connection);
			}
			
			if((isset($_POST['email'])&&isset($_POST['password']))||isset($_SESSION['user_id'])){ 
			
			if(!isset($_SESSION['user_id'])){
			$postPassword=$_POST['password'];
			$postEmail=$_POST['email'];

			$result= mysqli_query("SELECT * FROM `subscribers`",$connection);
			
			$proverka=0;
			$id=999999999;
			
			while($row = mysqli_fetch_array($result)){
								
				$email=$row['email'];
				$password=$row['password'];

				if($email==$postEmail&&$postPassword==$password&&$row['id']!=0){$proverka=1;$id=$row['id'];}else if($email==$postEmail&&$postPassword==$password&&$row['id']==0){$proverka=2;$id=0;}
				
				
			}
			}else{if($_SESSION['user_id']!=0){$proverka=1;$id=$_SESSION['user_id'];}else {$proverka=2;$id=$_SESSION['user_id'];}}
			
			
			
			if($proverka==2){
				
				$_SESSION['user_id'] = $id;
				
				echo"здравствуйте, админ!";echo "<a style='cursor:pointer; float:right;' href='on.php?a=exit'>выйти</a>";
				require_once ("templates/admin.php"); 
				
				?>
					
				<?php
			}
			
			if($proverka==1){
				
				$_SESSION['user_id'] = $id;
				
				$resultSub= mysqli_query("SELECT * FROM `subscribers` WHERE id=".$_SESSION['user_id'],$connection);
				
				while($rowSub = mysqli_fetch_array($resultSub)){			
				$sections_id=$rowSub['sections_id'];
				$name=$rowSub['name'];
				}
				
				echo "<h3 style='text-align:center;'>Здравствуйте ".$name.", добро пожаловать в личный кабинет</h3>";
				
				echo "<a style='cursor:pointer; float:right;' href='on.php?a=exit'>выйти</a>";
				
				require_once ("templates/send.php");
				
				
				
				
				
				
			}else if($proverka!=2){echo "<h3 style='padding-left:20px;text-align:center;'>Вы ввели некорректные данные</h3>";}
			}
			
			if (isset($_POST['chb'])){
				require_once ("templates/idByDot.php");
				$resultUpdates = mysqli_query ("UPDATE `subscribers` SET sections_id='".$text."' WHERE id=".$_SESSION['user_id'],$connection);
				?>
<script>
	document.location.href='on.php';
</script>
				<?php
			} 

			
			if(!isset($_SESSION['user_id'])&&!isset($_POST['name'])&&!isset($_POST['surname'])&&!isset($_POST['email'])&&!isset($_POST['password'])){
			?>
				<p style="font-weight: bold;text-align: center; font-size:19px;">Введите ваш e-mail и пароль</p>
				
				<form method="post" action="on.php">
				
				<div class="log_values_left">e-mail</div>
				<div class="log_values_right"><input name="email" type="email"></div>
				<div style=" width:100%; height:1px; clear:both"></div>
				<div class="log_values_left">пароль:</div>
				<div class="log_values_right"><input name="password" type="password"></div>
				<div style=" width:100%; height:1px; clear:both"></div>
				
				<div style="text-align:center;"><input style="font-size:16px; margin-top:20px;" class="send" type="submit" value="войти"></div>
				</form>
			<?php } ?>
				</div>
				
			</div>
			<?php require_once ("templates/bottom.php"); ?> 
