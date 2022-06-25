<?php
// подключаем базу данных
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
//если в таблице админки выбран 
if(isset($_GET["id"])) {
  //посылаем запрос в БД на удаление в БД
  $sqlDelete = "DELETE FROM review WHERE id= '" . $_GET["id"] . "' ";
}
  //если запрос выполнен то...
  if( $conn->query($sqlDelete)) {
    //задаём адрес перехода после выполнения запроса
    header("Location: /admin/review.php");
    //в ином случае показываем ошибку
  } else {
    echo "<h2>ERROR!</h2>";
  }
?>

