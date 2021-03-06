<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
$page = "products";
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";

//создаём запрос на вывод данных выбранного продукта в таблицу редактирования
$sqlProduct = "SELECT * FROM products WHERE id=" . $_GET["id"];
//посылаем запрос   
$result = $conn->query($sqlProduct);
//возвращаем выбранный товар из БД в виде массива элементов
$row = mysqli_fetch_assoc($result);

//если есть елик по кнопке 
if(isset($_POST['submit'])) {
    //запрос в БД на редактирование товара
    $sqlEditProduct = "UPDATE products SET 
                  title= '" . $_POST["title"] . "', 
                    description= '" . $_POST["description"] . "',
                      content= '" . $_POST["content"] . "',
                        cost= '" . $_POST["cost"] . "',
                          image= '" . $_POST["image"] . "',
                            category_id= '" . $_POST["cat_id"] . "',
                              request_id='" . $_POST["request_id"] . "'
                                WHERE products.id = '" . $_POST["id"] . "'"; 

        
        //если выполнился запрос то...
        if($conn->query($sqlEditProduct)) {
              //перход на главную страницу админ-панели
              header("Location: /admin/products.php");
     
        } else {
          //в ином случае выводим Ошибку
          echo "Error!";
        }
  }

?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
    <li class="breadcrumb-item"><a href="/admin/products.php">Products</a></li>
    <li class="breadcrumb-item active" aria-current="page">Edit</li>
  </ol>
</nav>

<div class="row">
  <div class="col-md-8">
      <div class="card">
        <div class="card-header card-header-primary">
          <h4 class="card-title">Edit Product</h4>
        </div>
        <div class="card-body">
          <form method="POST">
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">TITLE</label>
                    <input type="hidden" name="id" value="<?php echo $_GET["id"] ?>">
                    <input name="title" value="<?php echo $row["title"] ?>" type="text" class="form-control" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">DESCRIPTION</label>
                    <textarea name="description"  type="text" class="form-control"><?php echo $row["description"] ?></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">CONTENT</label>
                    <textarea name="content" type="text" class="form-control"><?php echo $row["content"] ?></textarea>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">REQUEST</label>
                    <input name="request_id" value="<?php echo $row["request_id"] ?>" type="text" class="form-control">
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">COST</label>
                    <input name="cost" value="<?php echo $row["cost"] ?>" type="text" class="form-control" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                  <div class="form-group">
                    <label class="bmd-label-floating">IMAGE</label>
                    <input name="image" value="<?php echo $row["image"] ?>" type="text" class="form-control" >
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                      <label>CATEGORY</label>
                        <select class="form-control" name="cat_id"><option><?php echo $row["category_id"] ?></option> 
                          <option value="0">Не выбрано</option>
                          <?php
                              $sql = "SELECT * FROM categories";
                              $result = $conn->query($sql);
                              while ($row = mysqli_fetch_assoc($result)) {
                                echo "<option value='" . $row["id"] . "'>" . $row["title"] . "</option>";
                              }
                          ?>
                        </select>
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




