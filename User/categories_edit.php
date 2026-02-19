<?php
include ("../db.php");
if(isset($_GET ['id'])){
    $id = $_GET['id'];
}
if(isset($_POST['save'])){
 $name = $_POST['name'];

 $sql1 = "UPDATE CATEGORYLIST SET CAT_NAME = '$name' WHERE CAT_ID = $id";
  $res1 = mysqli_query($conn,$sql1);
    if($res1){
        header("Location:categories.php");
    }
}
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
  </head>
  <body>
     <!-- home section start -->
      <div class="container-fluid">
        <img src="./photo_2025-12-30_10-22-42.jpg" alt="Bootstrap" width="120" height="120">
        <div class="row" style="height: 100vh;">
                
          <div class="col-lg-2 bg-danger">
          <li class="list-group-item  bg-danger py-3">
          <a class="nav-link text-light" href="">
          <i class="fa-solid fa-house-user py-3"></i>Dashboard</a>
          </li>
          <hr>
          <li class="list-group-item bg-danger py-3">
          <a class="nav-link text-light" href="">
          <i class="fa-solid fa-list"></i>Categories</a>
          </li>
           <li class="list-group-item bg-danger py-3">
          <a class="nav-link text-light" href="">
          <i class="fa-brands fa-wpforms"></i>Product Lists</a>
          </li>
          <li class="list-group-item  bg-danger py-3">
          <a class="nav-link text-light" href="">
          <i class="fa-solid fa-chart-simple"></i>Orders</a>
          </li>
          <li class="list-group-item  bg-danger py-3">
          <a class="nav-link text-light" href="">
            <i class="fa-regular fa-user"></i>Custom order</a>
          </li>
               <li class="list-group-item  bg-danger py-3">
          <a class="nav-link text-light" href="">
          <i class="fa-solid fa-message"></i>Messages</a>
          </li>
      </div>
      <div class="col-lg-10">
        <h3>Category Lists</h3>
        <?php
        $sql = "SELECT * FROM CATEGORYLIST WHERE CAT_ID = $id";
        $res = mysqli_query($conn, $sql);
        $data = mysqli_fetch_array($res);
        ?>
      <form method="post">
      <div class="mb-3 mt-5">
      <label for="categoryname" class="form-label">Category Name</label>
      <input type="text" value="<?php echo $data["CAT_NAME"]; ?>" name="name" class="form-control" id="categoryname" aria-describedby=""  >
      </div>
      <input type="submit"  name="save" class="submit btn btn-primary">
    </form>
</div>
     <!-- home section end -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>