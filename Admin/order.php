<?php
include("../db.php"); 


if (isset($_GET['complete_id'])) {
    $order_id = intval($_GET['complete_id']);
    mysqli_query($conn, "UPDATE ORDERLIST SET STATUS='Completed' WHERE ORDER_ID = $order_id");
    header("Location: order.php?msg=success");
    exit();
}

$sql = "SELECT o.*, u.USER_NAME 
        FROM ORDERLIST o
        LEFT JOIN USERLIST u ON o.USER_ID = u.USER_ID
        ORDER BY o.DATE DESC";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Order Management - Admin</title>
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
        .main-content { padding: 30px; }
        .card { border: none; border-radius: 15px; box-shadow: 0 4px 15px rgba(0,0,0,0.05); }
        .status-pending { background-color: #fff3cd; color: #856404; }
        .status-completed { background-color: #d4edda; color: #155724; }
    </style>
</head>
<body>

<div class="d-flex">
    <?php include('sidebar.php'); ?>
    
    <div class="main-content w-100">
        <h3 class="fw-bold mb-4"><i class="fa-solid fa-cart-arrow-down me-2 text-danger"></i> Order Management</h3>

        <div class="card bg-white">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">No</th>
                                <th>Customer / Date</th>
                                <th>Ordered Items</th>
                                <th>Total Amount</th>
                                <th>Status</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            if(mysqli_num_rows($result) > 0) {
                                $i = 1;
                                while($row = mysqli_fetch_assoc($result)) {
                                    $order_id = $row['ORDER_ID'];
                                    $statusClass = ($row['STATUS'] == 'Pending') ? 'status-pending' : 'status-completed';
                                    
                                    
                                    $itemSql = "SELECT op.*, p.PRO_NAME 
                                                FROM ORDERPRODUCT op 
                                                JOIN PRODUCTLIST p ON op.PROID = p.PRODUCT_ID 
                                                WHERE op.ORDERID = $order_id";
                                    $itemRes = mysqli_query($conn, $itemSql);
                            ?>
                            <tr>
                                <td class="ps-4">#<?= $i++; ?></td>
                                <td>
                                    <div class="fw-bold text-primary"><?= htmlspecialchars($row['USER_NAME'] ?? 'Guest User'); ?></div>
                                    <small class="text-muted"><?= date('d-M-Y h:i A', strtotime($row['DATE'])); ?></small>
                                </td>
                                <td>
                                    <ul class="list-unstyled mb-0 small">
                                        <?php while($item = mysqli_fetch_assoc($itemRes)): ?>
                                            <li>• <?= htmlspecialchars($item['PRO_NAME']); ?> (x<?= $item['QTY']; ?>)</li>
                                        <?php endwhile; ?>
                                    </ul>
                                </td>
                                <td class="fw-bold text-danger"><?= number_format($row['TOTAL']); ?> Ks</td>
                                <td>
                                    <span class="badge <?= $statusClass; ?> px-3 py-2 rounded-pill">
                                        <?= $row['STATUS']; ?>
                                    </span>
                                </td>
                                <td class="text-center">
                                    <?php if($row['STATUS'] == 'Pending'): ?>
                                        <a href="order.php?complete_id=<?= $order_id; ?>" 
                                           class="btn btn-sm btn-warning rounded-pill px-3 fw-bold"
                                           onclick="return confirm('Order to as Processed?')">
                                            Mark as Done
                                        </a>
                                    <?php else: ?>
                                        <span class="text-success small fw-bold"><i class="fa-solid fa-circle-check"></i> Processed</span>
                                    <?php endif; ?>
                                </td>
                            </tr>
                            <?php 
                                }
                            } else {
                                echo "<tr><td colspan='6' class='text-center py-5'>No orders yet</td></tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>