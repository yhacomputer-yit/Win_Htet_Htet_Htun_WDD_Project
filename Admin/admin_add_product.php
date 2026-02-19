<?php
include("../db.php");

if(isset($_POST['upload'])) {
    $name = $_POST['pro_name'];
    $price = $_POST['pro_price'];
    $cat_id = $_POST['cat_id'];
    $detail = $_POST['pro_detail'];
    

    $img_name = $_FILES['pro_img']['name'];
    $tmp_name = $_FILES['pro_img']['tmp_name'];
    $folder = "uploads/" . $img_name;

    if(move_uploaded_file($tmp_name, $folder)) {
        $sql = "INSERT INTO PRODUCTLIST (CAT_ID, PRO_NAME, PRO_PRICE, PRO_IMG, PRO_DETAIL) 
                VALUES ('$cat_id', '$name', '$price', '$img_name', '$detail')";
        
        if(mysqli_query($conn, $sql)) {
            echo "<script>alert('Product Added Successfully!');</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Failed to upload image.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin - Add Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <div class="card shadow p-4 mx-auto" style="max-width: 500px;">
        <h4 class="text-center mb-4">Add New Crochet Product</h4>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label>Product Name</label>
                <input type="text" name="pro_name" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Category</label>
                <select name="cat_id" class="form-control">
                    <?php
                    $cats = mysqli_query($conn, "SELECT * FROM CATEGORYLIST");
                    while($c = mysqli_fetch_assoc($cats)) {
                        echo "<option value='".$c['CAT_ID']."'>".$c['CAT_NAME']."</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label>Price (ks)</label>
                <input type="number" name="pro_price" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Product Image</label>
                <input type="file" name="pro_img" class="form-control" required>
            </div>
            <div class="mb-3">
                <label>Detail Description</label>
                <textarea name="pro_detail" class="form-control" rows="3"></textarea>
            </div>
            <button type="submit" name="upload" class="btn btn-danger w-100">Upload Product</button>
        </form>
    </div>
</div>
</body>
</html>