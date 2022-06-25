<div class="col-4">
    <div class="card m-3" style="border-radius: 30px;">
  		<div class="card-body">
		    <h5 class="card-title" alt="35px" >
		    	<a href="product.php?id=<?php echo $row['id']; ?>">
		    	<?php echo $row["title"]; ?>
		    	</a>
		    </h5>
		    <p class="card-text"><?php echo $row["description"]; ?></p>
		    <p class="card-text"><?php echo $row["cost"]; ?></p>
		    <button class="btn btn-warning" onclick="addToFavorites(this)" data-id='<?php echo $row['id']; ?>'>
		    	<img src="assets/img/favorites.png">
			</button>
			 <button class="btn btn-warning ml-3">
			 	<a href="order.php?id=<?php echo $row['id']; ?>">
		    	Купить
		    	</a>
			</button>
  		</div>
  	</div>
</div> <!-- закрываем div row внутри col-4-->