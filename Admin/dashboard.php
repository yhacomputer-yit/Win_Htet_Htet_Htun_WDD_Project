<?php
session_start();

if (!isset($_SESSION['user_role']) || $_SESSION['user_role'] != 1) {
    header("Location: login.php");
    exit();
}
?>

<?php
include("../db.php");
$prod_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM PRODUCTLIST"))['total'];
$order_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM ORDERLIST"))['total'];
$custom_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM CUSTOMORDERLIST"))['total'];
$msg_count = mysqli_fetch_assoc(mysqli_query($conn, "SELECT COUNT(*) as total FROM CONTACTME"))['total'];
$recent_orders_sql = "SELECT o.*, u.USER_NAME 
                      FROM ORDERLIST o 
                      LEFT JOIN USERLIST u ON o.USER_ID = u.USER_ID 
                      ORDER BY o.DATE DESC LIMIT 5";
$recent_orders_res = mysqli_query($conn, $recent_orders_sql);
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Crochet Admin Dashboard</title>
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
        .card i { font-size: 2rem; margin-right: 15px; color: #dc3545; }
        .stat-card { border: none; border-radius: 12px; transition: transform 0.2s; }
        .stat-card:hover { transform: translateY(-5px); }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
      <?php include('sidebar.php'); ?>

        <div class="col-lg-10 p-4">
            <h3 class="fw-bold text-secondary">Dashboard Overview</h3>
            
            <div class="row mt-4">
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card stat-card shadow-sm">
                        <div class="card-body d-flex align-items-center">
                            <i class="fa-solid fa-box"></i>
                            <div><h6 class="mb-0 text-muted">Products</h6><strong><?php echo $prod_count; ?></strong></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card stat-card shadow-sm">
                        <div class="card-body d-flex align-items-center">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <div><h6 class="mb-0 text-muted">Total Orders</h6><strong><?php echo $order_count; ?></strong></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card stat-card shadow-sm">
                        <div class="card-body d-flex align-items-center">
                            <i class="fa-solid fa-star"></i>
                            <div><h6 class="mb-0 text-muted">Custom Orders</h6><strong><?php echo $custom_count; ?></strong></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card stat-card shadow-sm">
                        <div class="card-body d-flex align-items-center">
                            <i class="fa-solid fa-comment-dots"></i>
                            <div><h6 class="mb-0 text-muted">Messages</h6><strong><?php echo $msg_count; ?></strong></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h4 class="fw-bold text-secondary">Recent Orders</h4>
                    <a href="order.php" class="btn btn-sm btn-danger">View All</a>
                </div>
                <div class="table-responsive shadow-sm bg-white p-3 rounded">
                    <table class="table table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Product</th>
                                <th>Total (Ks)</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if(mysqli_num_rows($recent_orders_res) > 0) {
                                $i = 1;
                                while($row = mysqli_fetch_assoc($recent_orders_res)) {
                            ?>
                            <tr>
                                <td><?php echo $i++; ?></td>
                                <td><span class="badge bg-secondary">#ORD-<?php echo $row['ORDER_ID']; ?></span></td>
                                <td><?php echo htmlspecialchars($row['USER_NAME'] ?? 'Guest User'); ?></td>
                                <td><?php echo htmlspecialchars($row['PRODUCT_NAME']); ?></td>
                                <td class="fw-bold text-danger"><?php echo number_format($row['TOTAL']); ?></td>
                                <td class="text-muted small"><?php echo date('Y-m-d', strtotime($row['DATE'])); ?></td>
                            </tr>
                            <?php 
                                }
                            } else {
                                echo "<tr><td colspan='6' class='text-center py-4 text-muted'>No recent orders.</td></tr>";
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