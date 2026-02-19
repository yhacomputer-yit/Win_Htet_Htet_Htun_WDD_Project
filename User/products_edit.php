<?php
include("db.php");


if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $res = mysqli_query($conn, "SELECT * FROM PRODUCTLIST WHERE PRODUCT_ID = $id");
    $row = mysqli_fetch_assoc($res);

    if (!$row) {
        die("Product not found!");
    }
}

if (isset($_POST['update_product'])) {

    $update_id = $_POST['pro_id']; 
    $name = mysqli_real_escape_string($conn, $_POST['pro_name']);
    $price = mysqli_real_escape_string($conn, $_POST['pro_price']);
    $detail = mysqli_real_escape_string($conn, $_POST['pro_detail']);

    $sql = "UPDATE PRODUCTLIST SET 
            PRO_NAME='$name', 
            PRO_PRICE='$price', 
            PRO_DETAIL='$detail' 
            WHERE PRODUCT_ID = $update_id";
    
    if (mysqli_query($conn, $sql)) {
     
        echo "<script>
                alert('Updated successfully!');
                window.location.href = 'dashboard.php'; 
              </script>";
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Edit Product</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container card p-4 shadow-sm" style="max-width: 500px;">
        <h4 class="text-danger mb-4">Edit Product</h4>
        
        <form method="POST">
            <input type="hidden" name="pro_id" value="<?= $row['PRODUCT_ID']; ?>">

            <div class="mb-3">
                <label class="fw-bold">Product Name</label>
                <input type="text" name="pro_name" class="form-control" value="<?= $row['PRO_NAME']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="fw-bold">Price (MMK)</label>
                <input type="number" name="pro_price" class="form-control" value="<?= $row['PRO_PRICE']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="fw-bold">Detail</label>
                <textarea name="pro_detail" class="form-control" rows="4"><?= $row['PRO_DETAIL']; ?></textarea>
            </div>
            
            <button type="submit" name="update_product" class="btn btn-danger w-100">Update Now</button>
            <button type="button" onclick="history.back()" class="btn btn-secondary w-100 mt-2">Cancel</button>
        </form>
    </div>
</body>
</html>