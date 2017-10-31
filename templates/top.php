<?php
session_start();

$connection = mysqli_connect("eu-cdbr-west-01.cleardb.com","bdb88915ffc72f","2503d371");
$db = mysqli_select_db("heroku_e38dcf8a772134f",$connection);
mysqli_set_charset("utf8");
if(!$connection||!$db){
	exit(mysqli_error($connection));
}
?>
<!DOCTYPE HTML>
<html>
<head>
<title>Продажа мебели</title>
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href='//fonts.googleapis.com/css?family=Italiana' rel='stylesheet' type='text/css'><script src="js/jquery-1.11.1.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,600italic,600,400italic,300italic,300' rel='stylesheet' type='text/css'><link rel="stylesheet" href="css/lightbox.css">
<link href='//fonts.googleapis.com/css?family=Yanone+Kaffeesatz:400,200,300,700' rel='stylesheet' type='text/css'>
<script src="js/bootstrap.js"></script>
<script src="js/responsiveslides.min.js"></script>
 <script>
    $(function () {
      $("#slider").responsiveSlides({
      	auto: true,
      	nav: true,
      	speed: 500,
        namespace: "callbacks",
        pager: true,
      });
    });
  </script>

</head>
<body>
		<!--header-->
			<?php if(isset($page)&&$page=="main"){ ?>
			<div class="header">
			<?php } ?>
				<div class="container">
					<div class="header-top">
						<nav class="navbar navbar-default">
							<div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
								<div class="navbar-header">
									  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
											<span class="sr-only">Toggle navigation</span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
											<span class="icon-bar"></span>
									  </button>
									<div class="navbar-brand">
										<h1><a href="index.php">Мебель</a></h1>
									</div>
								</div>

    <!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							  <ul class="nav navbar-nav">
									<li><a href="index.php">Главная</a></li>
									<li><a href="about.php">О нас</a></li>
									<li><a href="product.php">Мебель</a></li>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Филиалы <span class="caret"></span></a>
								<ul class="dropdown-menu">
									<li><a href="filial.php?a=Minsk">Минск</a></li>
									<li><a href="filial.php?a=Grodno">Гродно</a></li>
									<li><a href="filial.php?a=Mogilev">Могилёв</a></li>
								</ul>
									</li>
									<li><a href="login.php">Войти в личный кабинет</a></li>
									
								</ul>
							  
							</div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
						</nav>
<?php if(isset($page)&&$page=="main"){ ?>
					</div>
<?php } ?>
