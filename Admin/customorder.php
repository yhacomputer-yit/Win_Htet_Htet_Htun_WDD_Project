<?php
include("../db.php");
$sql = "SELECT * FROM CUSTOMORDERLIST ORDER BY DATE DESC";
$res = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Custom Orders Admin</title>
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
        .main-content {  padding: 30px; } 
        .card { border: none; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        .table thead { background-color: #f8f9fa; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
       <?php include('sidebar.php'); ?>>
        <div class="col-lg-10 main-content">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3><i class="fa-solid fa-wand-magic-sparkles text-danger"></i> Custom Orders</h3>
                <span class="badge bg-danger p-2 px-3">Total: <?php echo mysqli_num_rows($res); ?></span>
            </div>

            <div class="card bg-white p-3">
                <div class="table-responsive">
                    <table class="table table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Order Date</th>
                                <th>Product Name</th>
                                <th>Color Request</th>
                                <th>Price</th>
                                <th>Qty</th>
                                <th>Total</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 1;
                            if(mysqli_num_rows($res) > 0) {
                                while($data = mysqli_fetch_array($res)) {
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td class="small"><?php echo date('d-M-Y', strtotime($data['DATE'])); ?></td>
                                <td class="fw-bold"><?php echo htmlspecialchars($data['PRODUCT_NAME']); ?></td>
                                <td>
                                    <span class="badge bg-info text-dark">
                                        <i class="fa-solid fa-palette me-1"></i><?php echo htmlspecialchars($data['PRODUCT_COLOR']); ?>
                                    </span>
                                </td>
                                <td><?php echo number_format($data['PRODUCT_PRICE']); ?> Ks</td>
                                <td><?php echo $data['AMOUNT']; ?></td>
                                <td class="text-danger fw-bold"><?php echo number_format($data['TOTAL']); ?> Ks</td>
                                <td>
                                    <a href="custom_delete.php?id=<?php echo $data['CUSTOMORDER_ID']; ?>" 
                                       class="btn btn-sm btn-outline-danger" 
                                       onclick="return confirm('Sure?')">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                            <?php 
                                }
                            } else {
                                echo "<tr><td colspan='8' class='text-center py-4 text-muted'>No Custom Order Yet</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>