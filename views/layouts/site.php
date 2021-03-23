<?php

/* @var $this \yii\web\View */

/* @var $content string */

use app\widgets\Alert;
use kartik\nav\NavX;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
	<!DOCTYPE html>
	<html lang="en">

	<head>

		<!-- Basic page needs
		============================================ -->
		<title>Main Page</title>
		<meta charset="<?= Yii::$app->charset ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Mobile specific metas
		============================================ -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		
		
		<?php $this->registerCsrfMetaTags() ?>
		<title><?= Html::encode($this->title) ?></title>
		<?php $this->head() ?>
		<!-- Old IE
		============================================ -->

		<!--[if lt IE 8]>
		<div style=' clear: both; text-align:center; position: relative;'>
			<a href="http://windows.microsoft.com/en-US/internet-explorer/products/ie/home?ocid=ie6_countdown_bannercode">
				<img src="http://storage.ie6countdown.com/assets/100/images/banners/warning_bar_0000_us.jpg"
				     border="0"
				     height="42"
				     width="820"
				     alt="You are using an outdated browser. For a faster, safer browsing experience, upgrade for free today."/>
			</a>
		</div>
		<![endif]-->
		<!--[if lt IE 9]>
		<script type="text/javascript" src="js/html5.js"></script>
		<link rel="stylesheet" type="text/css" media="screen" href="css/ie.css">
		<![endif]-->


	</head>

	<body class="page page_home">
	<?php $this->beginBody() ?>
	<div class="wrapper">

		<!-- header -->
		<header class="header">
			<div class="container-fluid">
				<div class="row align-items-center justify-content-between">
					<div class="col-auto col-xl-2 order-1">
						<!-- logo -->
						<a href="/" class="logo header__logo">
							<img src="/img/logo.png" alt="VoyageSales">
						</a>
						<!-- /logo -->
					</div>
					<div class="col-12 col-lg order-3 order-lg-2 d-flex justify-content-center">
						<!-- nav -->
						<nav class="nav header__nav">
							<ul class="nav__list">
								<li class="nav__item nav__item_active">
									<a href="#" class="nav__link">About</a>
								</li>
								<li class="nav__item">
									<a href="#" class="nav__link">Stories</a>
								</li>
								<li class="nav__item">
									<a href="#" class="nav__link">News</a>
								</li>
								<li class="nav__item">
									<a href="#" class="nav__link">Research</a>
								</li>
								<li class="nav__item">
									<a href="#" class="nav__link">Blog</a>
								</li>
								<li class="nav__item">
									<a href="#" class="nav__link">Contacts</a>
								</li>
							</ul>
							<!-- social -->
							<ul class="social nav__social">
								<li class="social__item">
									<a href="#" class="social__link">
										<span class="fa fa-facebook"></span>
									</a>
								</li>
								<li class="social__item">
									<a href="#" class="social__link">
										<span class="fa fa-twitter"></span>
									</a>
								</li>
							</ul>
							<!-- /social -->
							<button class="nav__close">
								<span class="fa fa-times"></span>
							</button>
						</nav>
						<!-- /nav -->
					</div>
					<div class="col-auto col-xl-2 order-2 order-lg-3 d-flex justify-content-end">
						<!-- social -->
						<ul class="social header__social">
							<li class="social__item">
								<a href="#" class="social__link">
									<span class="fa fa-facebook"></span>
								</a>
							</li>
							<li class="social__item">
								<a href="#" class="social__link">
									<span class="fa fa-twitter"></span>
								</a>
							</li>
						</ul>
						<!-- /social -->
						<button class="nav-open">
							<span class="fa fa-bars"></span>
						</button>
					</div>
				</div>
			</div>
		</header>
		<!-- /header -->
		
		<?= $content ?>


	</div>
	<?php $this->endBody() ?>
	</body>
	</html>
<?php $this->endPage() ?>