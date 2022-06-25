<?php
include 'configs/db.php';
$page = "home";
include 'parts/header.php';

$sql = "SELECT * FROM products WHERE id=" . $_GET['id'];
$result = $conn->query($sql);
$row = mysqli_fetch_assoc($result);

$categoryResult = $conn->query('SELECT * FROM categories WHERE id=' . $row['category_id']);
$category = mysqli_fetch_assoc($categoryResult);
?>


<div class="container">
		<div class="row m-2">

		  	<div class="col-3">
			    <?php include $_SERVER['DOCUMENT_ROOT'] . '/shop/parts/cat_nav.php'; ?>
		  	</div>

		  	<div class="col-9">
		  		<div class="container">

		  			<nav aria-label="breadcrumb">
					  <ol class="breadcrumb">
					    <li class="breadcrumb-item"><a href="/shop/">Home</a></li>
					    <li class="breadcrumb-item">
					    	<a href="shop/cat.php?id=<?php echo $category['id']; ?> ">
					    	<?php echo $category['title']; ?>
					    	</a>
					    </li>
					    <li class="breadcrumb-item active" aria-current="page"><?php echo $row['title']; ?></li>
					  </ol>
					</nav>

					<div class="row">
							<div class="col-12">
								<div class="card" style="border-radius: 30px;">
									<div class="card-body">
									    <h5 class="card-title"> <?php echo $row["title"]; ?> </h5>
									    <p class="card-text"><?php echo $row["description"]; ?></p>
									    <p class="card-text"><?php echo $row["content"]; ?></p>
									    <a href="#" class="btn btn-primary" onclick="addToFavorites(this)" data-id='<?php echo $row['id']; ?>'>В избраное</a>
							  		</div>
								</div>
						</div> <!-- закрываем div row внутри col-4-->
					</div> <!-- закрываем div row внутри col-9-->

<?php include 'parts/footer.php'; ?>