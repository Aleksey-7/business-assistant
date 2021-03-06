<?php
include $_SERVER['DOCUMENT_ROOT'] . '/shop/configs/settings.php';
?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<title><?php echo $nameSite?></title>
</head>
<body style="background: #8080b07b;">
	<nav class="navbar navbar-expand-lg navbar-dark bg-dark" style="border-radius: 15px; background-color: #003f99bd;">
		<?php
		if (isset($_COOKIE["user_id_b"])) {
			?>
			<a class="navbar-brand" href="/shop/product_map.php"><?php echo $nameSite?></a>
			<?php
		} else {
			?>
        	<a class="navbar-brand" href="/shop/"><?php echo $nameSite?></a>
			<?php
		}
		?>
	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="navbar-toggler-icon"></span>
	    </button>

	    <div class="collapse navbar-collapse" id="navbarSupportedContent" style="border-radius: 20px; background-color: #036f;">
		    <ul class="navbar-nav mr-auto">
		    	<li class="nav-item <?php if($page == "home"){ ?> active <?php } ?>">
		    	<?php
				if (isset($_COOKIE["user_id_b"])) {
					?>
		        	<a class="nav-link" href="/shop/product_map.php">Подписки</a>
					<?php
				} else {
					?>
		        	<a class="nav-link" href="/shop/">Продукты</a>
					<?php
				}
				?>
				</li>
		        <li class="nav-item <?php if($page == "about"){ ?> active <?php } ?>">
		        	<a class="nav-link" href="../shop/about.php">Про нас</a>
		        </li>
		        <li class="nav-item <?php if($page == "contacts"){ ?> active <?php } ?>">
		        	<a class="nav-link" href="../shop/contacts.php">Контакты</a>
		        </li>
		    </ul>

		    <?php 
	        if (isset($_COOKIE["user_id"])) {
	        	?>
	        	<a href="favorites.php" class="btn btn-primary" id="go-favorites" style="border-radius: 30px; background-color: #36c9;">
			        <img src="assets/img/favorites.png" width="32">
			        <span></span>
			    </a>
			    <a class="nav-link" href="../shop/account.php">Кабинет</a> 
	        	<?php
	        } else if (isset($_COOKIE["user_id_b"])) { 
	        	?> <a class="nav-link" href="../shop/account_b.php">Кабинет</a> <?php
	        } else { 
	        	?>
			    <form class="form-inline my-2 my-lg-0">
			        <a href="favorites.php" class="btn btn-primary" id="go-favorites" style="border-radius: 30px; background-color: #36c9;">
			        <img src="assets/img/favorites.png" width="32">
			        <span></span>
			        </a>
					<a class="nav-link" href="../shop/authorization.php" style="border-radius: 20px; background-color: #003c66ff;">Войти</a>
					<a class="nav-link" href="../shop/authorization_b.php" style="border-radius: 20px; background-color: #003c66ff;">Войти (бизнес)</a>
			    </form>
			    <?php
			}
				?>
	    </div>
	</nav>