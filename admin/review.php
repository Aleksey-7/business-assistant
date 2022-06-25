<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
$page = "review";
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
    <li class="breadcrumb-item active" aria-current="page">Review</li>
  </ol>
</nav>


<div class="row">
  <div class="col-md-12">
    <div class="card">
      <div class="card-header card-header-primary">
        <h4 class="card-title ">
          Review
          <a href="modules/review/add.php" class="btn btn-primary">ADD</a>
        </h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table">
            <thead class=" text-primary">
              <th>ID</th>
              <th>Modificator</th>
              <th>Unit_id</th>
              <th>User_id</th>
              <th>Date_time</th>
              <th>ReviewText</th>
              <th>Options</th>
            </thead>
            <tbody>
              <?php
               //создаём запрос к БД на вывод  из таблицы 
               $sql = "SELECT * FROM review";
                //выполнить sql запрос в базе данных
                $result = $conn->query($sql);
                //ложим в перемеенную $row преобразованные в массив полученные из БД данные  
                while ($row = mysqli_fetch_assoc($result)) {
              ?>
                <tr>
                  <!-- Выводим в таблицу данные   -->
                  <td><?php echo $row["id"] ?></td>
                  <td><?php echo $row["modificator"] ?></td>
                  <td><?php echo $row["unit_id"] ?></td>
                  <td><?php echo $row["user_id"] ?></td>
                  <td><?php echo $row["data_time"] ?></td>
                  <td><?php echo $row["reviewText"] ?></td>
                  <td>
                    
                      <a href="modules/review/edit.php?id=<?php echo $row["id"] ?>" class="btn btn-primary">EDIT</a>
                      <a href="modules/review/delete.php?id=<?php echo $row["id"] ?>"class="btn btn-primary">DELETE</a>
                    
                  </td>
                </tr>
              <?php     
              } 
              ?>  
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</div>  
<?php
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/footer.php";
?>      