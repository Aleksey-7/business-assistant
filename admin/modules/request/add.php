<?php
include $_SERVER["DOCUMENT_ROOT"] . "/configs/db.php";
$page = "request";
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/header.php";

if (isset($_POST["submit"])) {
	$sql = "Insert into request (title, description, content, category_id, image, cost, user_id, phone, status) VALUES ('" . $_POST["title"] . "', '" . $_POST["description"] . "', '" . $_POST["content"] . "', '" . $_POST["category_id"] . "', '" . $_POST["image"] . "', '" . $_POST["cost"] . "', '" . $_POST["user_id"] . "', '" . $_POST["phone"] . "', '" . $_POST["status"] . "')";
	if ($conn->query($sql)) {
		header("Location: /admin/request.php");
	} else {
		echo "Error!";
	}
}
?>

<nav aria-label="breadcrumb">
  <ol class="breadcrumb">
    <li class="breadcrumb-item"><a href="/admin">Home</a></li>
    <li class="breadcrumb-item"><a href="/admin/request.php">Request</a></li>
    <li class="breadcrumb-item active" aria-current="page">Add</li>
  </ol>
</nav>


<div class="row">
	<div class="col-md-8">
	    <div class="card">
		    <div class="card-header card-header-primary">
		      <h4 class="card-title">Add</h4>
		    </div>
		    <div class="card-body">
		        <form method="POST">
			        <div class="row">
			          <div class="col-md-12">
			            <div class="form-group">
			              <label class="bmd-label-floating">Title</label>
			              <input name="title" type="text" class="form-control">
			            </div>
			          </div>
			        </div>
			        <div class="row">
			          <div class="col-md-12">
			            <div class="form-group">
			              <label class="bmd-label-floating">Description</label>
			              <input name="description" type="text" class="form-control">
			            </div>
			          </div>
			        </div>
			        <div class="row">
			          <div class="col-md-12">
			            <div class="form-group">
			              <label class="bmd-label-floating">Content</label>
			              <input name="content" type="text" class="form-control">
			            </div>
			          </div>
			        </div>
			        <div class="row">
			          <div class="col-md-12">
			            <div class="form-group">
			              <label class="bmd-label-floating">Category_id</label>
			              <input name="category_id" type="text" class="form-control">
			            </div>
			          </div>
			        </div>
			        <div class="row">
			          <div class="col-md-12">
			            <div class="form-group">
			              <label class="bmd-label-floating">Image</label>
			              <input name="image" type="text" class="form-control">
			            </div>
			          </div>
			        </div>
			        <div class="row">
			          <div class="col-md-12">
			            <div class="form-group">
			              <label class="bmd-label-floating">Cost</label>
			              <input name="cost" type="text" class="form-control">
			            </div>
			          </div>
			        </div>
			        <div class="row">
			          <div class="col-md-12">
			            <div class="form-group">
			              <label class="bmd-label-floating">User_id</label>
			              <input name="user_id" type="text" class="form-control">
			            </div>
			          </div>
			        </div>
			        <div class="row">
			          <div class="col-md-12">
			            <div class="form-group">
			              <label class="bmd-label-floating">Phone</label>
			              <input name="phone" type="text" class="form-control">
			            </div>
			          </div>
			        </div>
			        <div class="row">
			          <div class="col-md-12">
			            <div class="form-group">
			              <label class="bmd-label-floating">Status</label>
			              <input name="status" type="text" class="form-control">
			            </div>
			          </div>
			        </div>
		          <button name="submit" value="1" type="submit" class="btn btn-success pull-right">SAVE</button>
		          <div class="clearfix"></div>
		        </form>
		    </div>
	    </div>
	</div>
</div>
<?php
include $_SERVER["DOCUMENT_ROOT"] . "/admin/parts/footer.php";
?> 