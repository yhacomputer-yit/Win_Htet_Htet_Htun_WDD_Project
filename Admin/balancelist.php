<?php
include("../db.php"); 

if (isset($_POST['btn_save'])) {
    $pro_id = mysqli_real_escape_string($conn, $_POST['proid']);
    $inc_qty = (int)$_POST['income_qty'];

    date_default_timezone_set('Asia/Yangon');
    $date = date("Y-m-d H:i:s");

    $latest_balance_sql = "SELECT BALANCE FROM BALANCE WHERE PROID = '$pro_id' ORDER BY BAL_ID DESC LIMIT 1";
    $latest_bal_res = mysqli_query($conn, $latest_balance_sql);

    if ($row = mysqli_fetch_assoc($latest_bal_res)) {
        $current_bal = $row['BALANCE'];
        $total_bal = $current_bal + $inc_qty;
        
        $sql = "INSERT INTO BALANCE (PROID, DATET, INCOMEQTY, BALANCE, SALEQTY) 
                VALUES ('$pro_id', '$date', '$inc_qty', '$total_bal', '0')";
    } else {

        $sql = "INSERT INTO BALANCE (PROID, DATET, INCOMEQTY, BALANCE, SALEQTY) 
                VALUES ('$pro_id', '$date', '$inc_qty', '$inc_qty', '0')";
    }
    
    if(mysqli_query($conn, $sql)) {
        header("Location: balancelist.php?msg=success");
        exit();
    }
}


$products = mysqli_query($conn, "SELECT PRODUCT_ID, PRO_NAME FROM PRODUCTLIST");


$table_sql = "SELECT b.BAL_ID, p.PRO_NAME, b.INCOMEQTY, b.BALANCE, b.SALEQTY, b.DATET
              FROM BALANCE b 
              JOIN PRODUCTLIST p ON b.PROID = p.PRODUCT_ID 
              ORDER BY b.BAL_ID DESC";
$table_result = mysqli_query($conn, $table_sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Balance - Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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
        .main-content { padding: 30px; }
        .card { border: none; border-radius: 15px; box-shadow: 0 4px 12px rgba(0,0,0,0.08); }
        .btn-danger { background-color: #dc3545; border-radius: 10px; }
        .table thead { background-color: #f1f1f1; }
        th, td { padding: 12px !important; }
    </style>
</head>
<body>

<div class="d-flex">
    <?php include('sidebar.php'); ?>

    <div class="main-content w-100">
        <div class="container-fluid">
            <h3 class="fw-bold mb-4"><i class="fa-solid fa-wallet text-danger me-2"></i> Balance Quantity Management</h3>

            <div class="card bg-white p-4 mb-4">
                <h5 class="fw-bold mb-3">Add New Stock</h5>
                <form method="POST" class="row g-3 align-items-end">
                    <div class="col-md-4">
                        <label class="form-label small fw-bold">Select Product</label>
                        <select name="proid" class="form-select" required>
                            <option value="">Choose Product...</option>
                            <?php while($p = mysqli_fetch_assoc($products)): ?>
                                <option value="<?= $p['PRODUCT_ID'] ?>"><?= $p['PRO_NAME'] ?></option>
                            <?php endwhile; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label small fw-bold">Income Quantity</label>
                        <input type="number" name="income_qty" class="form-control" placeholder="0" required min="1">
                    </div>
                    <div class="col-md-3">
                        <button type="submit" name="btn_save" class="btn btn-danger w-100 fw-bold">
                            <i class="fa-solid fa-save me-2"></i> Save Balance
                        </button>
                    </div>
                </form>
            </div>

            <div class="card bg-white">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0 text-center">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-4">No</th>
                                    <th class="text-start">Product Name</th>
                                    <th>Income Qty</th>
                                    <th>Sale Qty</th>
                                    <th>Current Balance</th>
                                    <th>Updated Date</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                $no = 1;
                                if(mysqli_num_rows($table_result) > 0) {
                                    while($row = mysqli_fetch_assoc($table_result)) {
                                ?>
                                <tr>
                                    <td class="ps-4 text-muted"><?= $no++ ?></td>
                                    <td class="text-start fw-bold"><?= htmlspecialchars($row['PRO_NAME']) ?></td>
                                    <td class="text-primary fw-bold">+ <?= number_format($row['INCOMEQTY']) ?></td>
                                    <td class="text-danger fw-bold">- <?= number_format($row['SALEQTY']) ?></td>
                                    <td class="bg-light fw-bold text-dark fs-5"><?= number_format($row['BALANCE']) ?></td>
                                    <td class="small text-muted"><?= date('d M Y, h:i A', strtotime($row['DATET'])) ?></td>
                                    <td>
                                        <a href="deletebalance.php?id=<?= $row['BAL_ID'] ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('ဖျက်မှာ သေချာပါသလား?')">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                                <?php 
                                    }
                                } else {
                                    echo "<tr><td colspan='7' class='py-5 text-muted'>No data found in inventory.</td></tr>";
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>