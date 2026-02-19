<?php
include("db.php");
$get_cat = mysqli_query($conn, "SELECT CAT_ID FROM CATEGORYLIST WHERE CAT_NAME LIKE '%Keychain%' LIMIT 1");
$cat_data = mysqli_fetch_assoc($get_cat);
$keychain_id = $cat_data['CAT_ID'] ?? 0;

if (isset($_POST['save_product'])) {
    $pro_name = mysqli_real_escape_string($conn, $_POST['pro_name']);
    $cat_id = mysqli_real_escape_string($conn, $_POST['cat_id']);
    $pro_price = mysqli_real_escape_string($conn, $_POST['pro_price']);
    $pro_detail = mysqli_real_escape_string($conn, $_POST['pro_detail']);
    $is_special = isset($_POST['is_special']) ? 1 : 0;

    $img_name = $_FILES['pro_img']['name'];
    $tmp_name = $_FILES['pro_img']['tmp_name'];
    $upload_path = "uploads/" . $img_name;

    if (!is_dir('uploads')) {
        mkdir('uploads');
    }

    if (move_uploaded_file($tmp_name, $upload_path)) {
        $sql_insert = "INSERT INTO PRODUCTLIST (CAT_ID, PRO_NAME, PRO_PRICE, PRO_IMG, PRO_DETAIL, IS_SPECIAL) 
                       VALUES ('$cat_id', '$pro_name', '$pro_price', '$img_name', '$pro_detail', '$is_special')";
        
        if (mysqli_query($conn, $sql_insert)) {
            echo "<script>alert('Keychain saved successfully!'); window.location='productkeychain.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "<script>alert('Image upload failed!');</script>";
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Keychain Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar { 
    background-color: #dc3545; 
    min-height: 100vh; 
    color: white; 
    position: sticky; 
    top: 0;
}
.sidebar-link { 
    text-decoration: none; 
    color: rgba(255,255,255,0.8); 
    display: block; 
    padding: 12px 20px; 
    transition: 0.3s; 
    font-size: 0.9rem;
}
.sidebar-link i {
    width: 25px;
}
.sidebar-link:hover, .sidebar-link.active { 
    background: rgba(255,255,255,0.15); 
    color: white; 
    font-weight: bold; 
    border-left: 4px solid white; 
}
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
        <?php include('sidebar.php'); ?>

        <div class="col-lg-10 p-4">
            <h3 class="mb-4 text-secondary">Keychain Management</h3>

            <div class="card shadow-sm border-0 mb-5 p-4">
                <h5 class="mb-3 text-danger"><i class="fa fa-plus-circle"></i> Add New Keychain</h5>
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Keychain Name</label>
                            <input type="text" name="pro_name" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Category</label>
                            <select name="cat_id" id="categoryFilter" class="form-select" required>
                                <option value="">Loading Categories...</option>
                                <?php
                                $cat_query = mysqli_query($conn, "SELECT * FROM CATEGORYLIST");
                                while($cat = mysqli_fetch_assoc($cat_query)) {
                                    echo "<option value='{$cat['CAT_ID']}' data-name='".strtolower($cat['CAT_NAME'])."'>{$cat['CAT_NAME']}</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Price</label>
                            <input type="number" name="pro_price" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-bold">Image</label>
                            <input type="file" name="pro_img" class="form-control" accept="image/*" required>
                        </div>
                        <div class="col-md-5">
                            <label class="form-label fw-bold">Detail Description</label>
                            <input type="text" name="pro_detail" class="form-control">
                        </div>
                        <div class="col-md-3 d-flex align-items-end px-3">
                            <div class="form-check mb-2">
                                <input class="form-check-input border-danger" type="checkbox" name="is_special" value="1" id="specialCheck">
                                <label class="form-check-label fw-bold text-danger" for="specialCheck">Special Product?</label>
                            </div>
                        </div>
                        <div class="col-12 text-end mt-3">
                            <button type="submit" name="save_product" class="btn btn-danger px-4">Save Keychain</button>
                        </div>
                    </div>
                </form>
            </div>

            <hr>

            <h4 class="text-secondary mb-3">Keychain List</h4>
            <div class="table-responsive bg-white p-3 rounded shadow-sm">
                <table class="table table-hover align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql_select = "SELECT * FROM PRODUCTLIST WHERE CAT_ID = '$keychain_id' ORDER BY PRODUCT_ID DESC";
                        $result = mysqli_query($conn, $sql_select);
                        
                        if(mysqli_num_rows($result) > 0) {
                            $i = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><img src="uploads/<?php echo $row['PRO_IMG']; ?>" width="50" height="50" class="rounded border"></td>
                                <td class="fw-bold"><?php echo $row['PRO_NAME']; ?></td>
                                <td><?php echo number_format($row['PRO_PRICE']); ?> MMK</td>
                                <td>
                                    <?php if($row['IS_SPECIAL'] == 1): ?>
                                        <span class="badge bg-warning text-dark">Special</span>
                                    <?php else: ?>
                                        <span class="badge bg-light text-muted">Normal</span>
                                    <?php endif; ?>
                                </td>
                                <td>
                                    <a href="products_edit.php?id=<?php echo $row['PRODUCT_ID']; ?>" class="btn btn-sm btn-outline-success"><i class="fa fa-edit"></i></a>
                                    <a href="product_delete.php?id=<?php echo $row['PRODUCT_ID']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('ဖျက်ရန် သေချာပါသလား?')"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                            <?php 
                            } 
                        } else {
                            echo "<tr><td colspan='6' class='text-center py-4'>No keychains found.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script>
document.addEventListener("DOMContentLoaded", function() {
    const select = document.getElementById('categoryFilter');
    const options = select.options;

    for (let i = options.length - 1; i >= 0; i--) {
        const catName = options[i].getAttribute('data-name');
        
        if (catName === null || !catName.includes('keychain')) {
            select.remove(i); 
        } else {
            options[i].selected = true;
        }
    }
});
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>