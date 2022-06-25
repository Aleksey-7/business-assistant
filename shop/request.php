<?php
include $_SERVER['DOCUMENT_ROOT'] . '/shop/configs/db.php';
$page = "account_b";
$nav_activ = "request";
include $_SERVER['DOCUMENT_ROOT'] . '/shop/parts/header.php';
?>

<div class="row m-4">
	<?php 
	//подключаем навигацию
	include 'parts/account_b/nav.php'; 
	//выводим таблицу с заказами данного пользователя
	?>
    <div class="col-6 ml-5">
        <h4 class="card-title">Ваши предложения</h4>

        <?php
        //делаем запрос в БД - получаем предложения авторизованого пользователя
        $sql = "SELECT * FROM `request` WHERE `user_id`=" . $user_id_b;
        //получаем результат
        $result = $conn->query($sql);
        //получаем все поля где user_b_id соответствует user_b_id авторизованому пользователю
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="card mt-3">
              <h5 class="card-header"><?php echo $row['title']; ?></h5>
              <div class="card-body">
                <h5 class="card-title"><?php echo $row['description']; ?></h5>
                <p class="card-text"><?php echo "Цена: " . $row['cost'] . "грн"; ?></p>       
                <p class="text-right"><?php echo "Статус: " . $row['status']; ?></p>
                <button onclick="deleteProductUserB(this, <?php echo $row['id']; ?>)" class="btn btn-primary">Удалить</button>
              </div>
            </div>
        <?php
        }
        ?>
        <a class="btn btn-primary mt-3" href="new_request.php">
            Подать заявку
        </a>
    </div>

<?php 
include 'parts/footer.php'; 
?>