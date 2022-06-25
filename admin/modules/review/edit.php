<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
$page = "review";
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";

//создаём запрос на вывод данных выбранного в таблицу редактирования
$sqlCategory = "SELECT * FROM review WHERE id=" . $_GET["id"];
//посылаем запрос   
$result = $conn->query($sqlCategory);
//возвращаем выбранный  из БД в виде массива элементов
$row = mysqli_fetch_assoc($result);

//если есть елик по кнопке 
if(isset($_POST['submit'])) {
    //запрос в БД на редактирование 
    $sqlEdit = "UPDATE review SET 
                  modificator= '" . $_POST["modificator"] . "',
                    unit_id= '" . $_POST["unit_id"] . "',
                      user_id= '" . $_POST["user_id"] . "',
                        data_time= '" . $_POST["data_time"] . "',
                          reviewText= '" . $_POST["reviewText"] . "' 
                            WHERE review.id = '" . $_POST["id"] . "'"; 

        
        //если выполнился запрос то...
        if($conn->query($sqlEdit)) {
              //перход на главную страницу админ-панели
              header("Location: /admin/review.php");
     
        } else {
          //в ином случае выводим Ошибку
          echo "Error!";
        }
  }

?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
    <li class="breadcrumb-item"><a href="/admin/review.php">Review</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
  </ol>
</nav>


<div class="row">
  <div class="col-md-8">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Edit</h4>
        </div>
        <div class="card-body">
          <form method="POST">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Modificator</label>
                    <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
                    <input name="modificator" value="<?php echo $row["modificator"] ?>" type="text" class="form-control" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Unit_id</label>
                    <input name="unit_id" value="<?php echo $row["unit_id"] ?>" type="text" class="form-control" >
                  </div>
                </div>
              </div>
               <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">User_id</label>
                    <input name="user_id" value="<?php echo $row["user_id"] ?>" type="text" class="form-control" >
                  </div>
                </div>
              </div>
               <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Data_time</label>
                    <input name="data_time" value="<?php echo $row["data_time"] ?>" type="text" class="form-control" >
                  </div>
                </div>
              </div>
               <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">ReviewText</label>
                    <input name="reviewText" value="<?php echo $row["reviewText"] ?>" type="text" class="form-control" >
                  </div>
                </div>
              </div>    

              <button name="submit" value="1" type="submit" class="btn btn-success pull-right">EDIT</button>
              <div class="clearfix"></div>
          </form>
        </div>
      </div>
  </div>
</div>
<?php

include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/footer.php";
?> 

