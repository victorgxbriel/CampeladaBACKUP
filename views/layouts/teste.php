<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\TesteAsset;
use yii\helpers\Url;

TesteAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">

<head>

	<meta charset="<?= Yii::$app->charset ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="teste para tcc">
	<meta name="author" content="Victor">
	<?= Html::csrfMetaTags() ?>
	<title><?= Html::encode($this->title) ?></title>
	<link rel="icon" type="image/png" href="/campelada/web/usuario/img/campelada-icon-black.png"/>
	<?php $this->head() ?>
</head>

<body id="page-top">
	<?php $this->beginBody() ?>


	<!-- Navigation -->
	<nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
      <div class="container">
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav text-uppercase ml-auto">
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#inicio" style="color: black">Início</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#projeto" style="color: black">O projeto</a>
            </li>
            <li class="nav-item">
              <a class="nav-link js-scroll-trigger" href="#quem" style="color: black">Quem somos nós</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

	<div class="container" id="inicio">
		<?= Alert::widget() ?>
		<?= $content ?> 
	</div>

	<!-- Callout -->
	<section class="callout" id="projeto" style="background-image: url(/campelada/web/teste/img/clash.png); background-position: center left; background-size: 400px;">
		<div class="container text-center">
			<h2 class="mx-auto mb-5">KKKKKKKK
				<em>your</em>
			next website!</h2>
			<a class="btn btn-primary btn-xl" href="https://startbootstrap.com/template-overviews/stylish-portfolio/">Download Now!</a>
		</div>
	</section>

	<!-- Callout -->
	<section class="callout" id="quem" style="background-image: url(/campelada/web/teste/img/james.png); background-position: center right; background-size: 400px;">
		<div class="container text-center">
			<h2 class="mx-auto mb-5">Welcome to
				<em>your</em>
			next website!</h2>
			<a class="btn btn-primary btn-xl" href="https://startbootstrap.com/template-overviews/stylish-portfolio/">Download Now!</a>
		</div>
	</section>

	<!-- Footer -->
	<footer class="footer text-center">
		<div class="container">
			<ul class="list-inline mb-5">
				<li class="list-inline-item">
					<a class="social-link rounded-circle text-white mr-3" href="https://www.facebook.com/victorgabriel.advg">
						<i class="icon-social-facebook"></i>
					</a>
				</li>
				<li class="list-inline-item">
					<a class="social-link rounded-circle text-white mr-3" href="https://twitter.com/victorg4br13l">
						<i class="icon-social-twitter"></i>
					</a>
				</li>
				<li class="list-inline-item">
					<a class="social-link rounded-circle text-white" href="#">
						<i class="icon-social-facebook"></i>
					</a>
				</li>
			</ul>
			<p class="text-muted small mb-0">Copyright &copy; Campelada 2018</p>
		</div>
	</footer>

	<!-- Scroll to Top Button-->
	<a class="scroll-to-top rounded js-scroll-trigger" href="#page-top">
		<i class="fas fa-angle-up"></i>
	</a>

	<?php $this->endBody() ?>  
</body>
</html>
<?php $this->endPage() ?>
