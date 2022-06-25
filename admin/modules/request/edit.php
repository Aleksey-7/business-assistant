<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
$page = "request";
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";

//создаём запрос на вывод данных выбранного в таблицу редактирования
$sqlCategory = "SELECT * FROM request WHERE id=" . $_GET["id"];
//посылаем запрос   
$result = $conn->query($sqlCategory);
//возвращаем выбранный  из БД в виде массива элементов
$row = mysqli_fetch_assoc($result);

//если есть елик по кнопке 
if(isset($_POST['submit'])) {
    //запрос в БД на редактирование 
    $sqlEdit = "UPDATE request SET 
                  title= '" . $_POST["title"] . "',
                    description= '" . $_POST["description"] . "',
                      content= '" . $_POST["content"] . "',
                        category_id= '" . $_POST["category_id"] . "',
                          image= '" . $_POST["image"] . "',
                            cost= '" . $_POST["cost"] . "',
                              user_id= '" . $_POST["user_id"] . "',
                                phone= '" . $_POST["phone"] . "',
                                  status= '" . $_POST["status"] . "' 
                                    WHERE request.id = '" . $_POST["id"] . "'"; 

        
        //если выполнился запрос то...
        if($conn->query($sqlEdit)) {
              //перход на главную страницу админ-панели
              header("Location: /admin/request.php");
     
        } else {
          //в ином случае выводим Ошибку
          echo "Error!";
        }
  }

?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
    <li class="breadcrumb-item"><a href="/admin/request.php">Request</a></li>
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
                    <label class="bmd-label-floating">Title</label>
                    <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
                    <input name="title" value="<?php echo $row["title"] ?>" type="text" class="form-control" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Description</label>
                    <input name="description" value="<?php echo $row["description"] ?>" type="text" class="form-control" >
                  </div>
                </div>
              </div>
               <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Content</label>
                    <input name="content" value="<?php echo $row["content"] ?>" type="text" class="form-control" >
                  </div>
                </div>
              </div>
               <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Category_id</label>
                    <input name="category_id" value="<?php echo $row["category_id"] ?>" type="text" class="form-control" >
                  </div>
                </div>
              </div>
               <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Image</label>
                    <input name="image" value="<?php echo $row["image"] ?>" type="text" class="form-control" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Cost</label>
                    <input name="cost" value="<?php echo $row["cost"] ?>" type="text" class="form-control" >
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
                    <label class="bmd-label-floating">Phone</label>
                    <input name="phone" value="<?php echo $row["phone"] ?>" type="text" class="form-control" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">Status</label>
                    <input name="status" value="<?php echo $row["status"] ?>" type="text" class="form-control" >
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

