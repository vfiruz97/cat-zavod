<?php include $base."lib/auth.php"; ?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<link rel="stylesheet" type="text/css" href="assets/css/auth.css">
<header class="header-menu">
	<nav>
		<ul>
			<a class="a-menu" href="register.php"><li>Регистрация</li></a>
		</ul>
	</nav>
</header>
<div class="container">
	<div class="row">

		<div class="col-md-offset-3 col-md-6">
			<form class="form-horizontal" action="<?php $_PHP_SELF ?>" method="POST">
				<span class="heading">АВТОРИЗАЦИЯ</span>
				<?php if(isset($ERROR) && !empty($ERROR)): ?>
				<div class="alert alert-danger" role="alert">
					<?php foreach ($ERROR as $key => $value) echo $value.'<br>'; ?>
				</div>
			<?php endif; ?>
			<div class="form-group">
				<input type="email" name="Email" class="form-control" id="Email" placeholder="Email" <?php getValue($Email) ?> required >
				<i class="fa fa-user"></i>
			</div>
			<div class="form-group help">
				<input type="password" name="Password" class="form-control" id="Password" placeholder="Пароль" required >
				<i class="fa fa-lock"></i>
			</div>
			<div class="form-group">
				<div class="main-checkbox">
					<input type="checkbox" value="true" id="checkbox1" name="check" <?php if($checked) echo 'checked'?> />
					<label for="checkbox1"></label>
				</div>
				<span class="text">Запомнить</span>
				<button type="submit" class="btn btn-default">ВХОД</button>
			</div>
		</form>
	</div>

</div><!-- /.row -->
</div><!-- /.container -->