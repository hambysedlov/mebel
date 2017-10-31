<?php require_once ("templates/top.php"); ?>
<?php if(isset($_SESSION['user_id'])){
?>	
	<script> 
<!-- 
window.onload = function(){ 
location.replace("on.php"); 
} 
//--> 
</script>
<?php	
} ?>
		</div>
	</div>
	<div class="content">
		<div class="typography">
			<!-- container-wrap -->
			<div class="container">
				
					
				<div class="grid_3 grid_5">
					<h3 class="hdg">Вход в личный кабинет</h3>
					<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
						<ul id="myTab" class="nav nav-tabs" role="tablist">
							<li role="presentation" class="active"><a href="#home" id="home-tab" role="tab" data-toggle="tab" aria-controls="home" aria-expanded="true">Войти</a></li>
							<li role="presentation"><a href="#profile" role="tab" id="profile-tab" data-toggle="tab" aria-controls="profile">Регистрация</a></li>
						</ul>
						<div id="myTabContent" class="tab-content">
							<div role="tabpanel" class="tab-pane fade in active" id="home" aria-labelledby="home-tab">
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
							</div>
							<div role="tabpanel" class="tab-pane fade" id="profile" aria-labelledby="profile-tab">
								<p style="font-weight: bold;text-align: center; font-size:19px;">Введите ваше имя, фамилию, e-mail и придумайте пароль</p>
			
			<form method="post" action="register.php">
			<div class="log_values_left">имя:</div>
			<div class="log_values_right"><input name="name"></div>
			<div style=" width:100%; height:1px; clear:both"></div>
			<div class="log_values_left">фамилия:</div>			
			<div class="log_values_right"><input name="surname"></div>
			<div style=" width:100%; height:1px; clear:both"></div>
			<div class="log_values_left">e-mail</div>
			<div class="log_values_right"><input name="email" type="email"></div>
			<div style=" width:100%; height:1px; clear:both"></div>
			<div class="log_values_left">пароль:</div>
			<div class="log_values_right"><input name="password" type="password"></div>
			<div style=" width:100%; height:1px; clear:both"></div>
			
			<div style="text-align:center;"><input style="font-size:16px; margin-top:20px;" class="send" type="submit" value="зарегистрироваться"></div>
			</form>
							</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
			<?php require_once ("templates/bottom.php"); ?> 