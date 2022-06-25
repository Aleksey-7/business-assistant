<?php
	// подключаем базу данных
	include $_SERVER['DOCUMENT_ROOT'] . '/configs/db.php';

	// название страницы
	$page = ' services';

	// подключаем хеадер
	include $_SERVER['DOCUMENT_ROOT'] . "/parts/header.php";
?>

<!-- Хлебные крошки -->
<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/">Домашняя</a></li>
    <li class="breadcrumb-item"><a href="/">Услуги</a></li>
  </ol>
</nav>

<!-- выводим продукты в поле контента -->
<div class="row" id="products">
	<?php

			if(isset($_GET['page'])){
				//запрос в БД, выбираем все продукты 
				$sql = "SELECT * FROM products LIMIT 6 OFFSET " . ( ($_GET['page'] - 1) * 6);
			}
			else{
				$sql = "SELECT * FROM products LIMIT 6";
			}

		
		$result = $conn->query($sql);
		while ( $row = mysqli_fetch_assoc($result) ) {
			include 'parts/product_card.php';
		}
		?>
</div>		

<!-- кнопка Показать еще -->
<div class="row" >
	<div class="col-4 offset-5">
		<input type="hidden" value="1" id="current-page">
		<button class="btn btn-primary mt-5" id="showMore">Показать еще</button>
	</div>
</div><!-- закрываем кнопку Показать еще -->

<!-- Пагинация -->
<?php
	include $_SERVER['DOCUMENT_ROOT'] . "/parts/pagination.php";
?><!-- закрываем пагинацию -->

	<script src="/assets/js/main.js"></script>

<?php	// подключаем футер
	include $_SERVER['DOCUMENT_ROOT'] . "/parts/futer.php";
?>