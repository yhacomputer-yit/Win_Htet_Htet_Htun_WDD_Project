<?php
include("../db.php");
$sql = "SELECT * FROM CONTACTME ORDER BY CONTACT_ID DESC";
$res = mysqli_query($conn, $sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Messages - Admin</title>
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
        .card { border: none; border-radius: 12px; box-shadow: 0 4px 12px rgba(0,0,0,0.05); }
        .table thead { background-color: #f1f1f1; border-top: 2px solid #dee2e6; }
        .msg-text { max-width: 300px; white-space: nowrap; overflow: hidden; text-overflow: ellipsis; }
    </style>
</head>
<body>

<div class="container-fluid">
    <div class="row">
       <?php include('sidebar.php'); ?>

        <div class="col-lg-10 main-content">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="fw-bold"><i class="fa-solid fa-envelope-open-text text-danger me-2 mt-5"></i> Customer Messages</h3>
                <span class="badge bg-danger rounded-pill px-3 py-2"><?php echo mysqli_num_rows($res); ?> New Messages</span>
            </div>

            <div class="card bg-white">
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead>
                                <tr>
                                    <th class="ps-4">No</th>
                                    <th>Customer Info</th>
                                    <th>Contact</th>
                                    <th>Address</th>
                                    <th>Message (About)</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                if(mysqli_num_rows($res) > 0) {
                                    $i = 1;
                                    while($row = mysqli_fetch_assoc($res)) {
                                ?>
                                <tr>
                                    <td class="ps-4 fw-bold text-muted"><?php echo $i++; ?></td>
                                    <td>
                                        <div class="fw-bold text-dark"><?php echo htmlspecialchars($row['NAME']); ?></div>
                                        <div class="small text-muted"><?php echo htmlspecialchars($row['EMAIL']); ?></div>
                                    </td>
                                    <td><i class="fa-solid fa-phone-flip me-1 text-success small"></i> <?php echo htmlspecialchars($row['PHONE']); ?></td>
                                    <td class="small text-muted"><?php echo htmlspecialchars($row['ADDRESS']); ?></td>
                                    <td>
                                        <div class="msg-text text-dark" title="<?php echo htmlspecialchars($row['ABOUT']); ?>">
                                            <?php echo htmlspecialchars($row['ABOUT']); ?>
                                        </div>
                                    </td>
                                    <td class="text-center">
                                        <button class="btn btn-sm btn-outline-primary me-1" data-bs-toggle="modal" data-bs-target="#viewMsg<?php echo $row['CONTACT_ID']; ?>">
                                            <i class="fa-solid fa-eye"></i>
                                        </button>
                                        <a href="deletemes.php?id=<?php echo $row['CONTACT_ID']; ?>" class="btn btn-sm btn-outline-danger" onclick="return confirm('ဖျက်မှာ သေချာပါသလား?')">
                                            <i class="fa-solid fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>

                                <div class="modal fade" id="viewMsg<?php echo $row['CONTACT_ID']; ?>" tabindex="-1" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header bg-light">
                                                <h5 class="modal-title fw-bold">Message Details</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p><strong>From:</strong> <?php echo htmlspecialchars($row['NAME']); ?></p>
                                                <p><strong>Message:</strong></p>
                                                <div class="p-3 bg-light rounded border italic">
                                                    " <?php echo htmlspecialchars($row['ABOUT']); ?> "
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <a href="mailto:<?php echo $row['EMAIL']; ?>" class="btn btn-danger btn-sm rounded-pill px-3">Reply via Email</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <?php 
                                    }
                                } else {
                                    echo "<tr><td colspan='6' class='text-center py-5 text-muted'>No Messages</td></tr>";
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
<?php if(isset($_GET['msg']) && $_GET['msg'] == 'deleted'): ?>
<script>
    alert('Deleted Messages');
    window.history.replaceState({}, document.title, "contactme.php");
</script>
<?php endif; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>