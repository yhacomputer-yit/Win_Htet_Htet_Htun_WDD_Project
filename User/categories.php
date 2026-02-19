<?php
include("../db.php");
if(isset($_POST['save'])){
    $cat_name = mysqli_real_escape_string($conn, $_POST['name']);
    
    if(!empty($cat_name)){
        $sql = "INSERT INTO CATEGORYLIST (cat_name) VALUES ('$cat_name')";
        $res = mysqli_query($conn, $sql);
        if($res){
            echo "<script>alert('Category added successfully'); window.location.href='categories.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Category Management</title>
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
        .card { border: none; box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075); }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
    <?php include('sidebar.php'); ?>
        <div class="col-lg-10 p-4">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Category Management</h2>
            </div>

            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title mb-3">Add New Category</h5>
                    <form method="post" class="row g-3">
                        <div class="col-md-8">
                            <input type="text" name="name" class="form-control" placeholder="Enter Category Name" required>
                        </div>
                        <div class="col-md-4">
                            <button type="submit" name="save" class="btn btn-danger w-100">
                                <i class="fa-solid fa-plus"></i> Save Category
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="px-4">No</th>
                                    <th>Category ID</th>
                                    <th>Category Name</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sql1 = "SELECT * FROM CATEGORYLIST ORDER BY CAT_ID DESC";
                                $res1 = mysqli_query($conn, $sql1);
                                $i = 1;
                                while($data = mysqli_fetch_array($res1)){
                                ?>
                                <tr>
                                    <td class="px-4"><?php echo $i++; ?></td>
                                    <td><span class="badge bg-secondary">#<?php echo $data["CAT_ID"]; ?></span></td>
                                    <td><strong><?php echo htmlspecialchars($data["CAT_NAME"]); ?></strong></td>
                                    <td class="text-center">
                                        <a href="categories_edit.php?id=<?php echo $data["CAT_ID"]; ?>" class="btn btn-sm btn-outline-success me-1">
                                            <i class="fa-solid fa-pen-to-square"></i> Edit
                                        </a>
                                        <a href="category_delete.php?id=<?php echo $data["CAT_ID"]; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')">
                                            <i class="fa-solid fa-trash"></i> Delete
                                        </a>
                                    </td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>