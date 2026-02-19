<?php
include("../db.php");

if (isset($_GET['delete'])) {
    $user_id = intval($_GET['delete']);
    mysqli_query($conn, "DELETE FROM USERLIST WHERE USER_ID = $user_id");
    header("Location: usertable.php");
    exit();
}
if (isset($_POST['add_user'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); 
    $role = intval($_POST['role']);
    $query = "INSERT INTO USERLIST (USER_NAME, USER_PHONE, USER_EMAIL, USER_LOCATION, USER_PASSWORD, USER_ADDRESS, USER_ROLE) 
              VALUES ('$name', '$phone', '$email', '$location', '$password', '$address', '$role')";   
    if (mysqli_query($conn, $query)) {
        echo "<script>alert('Account created successfully!'); window.location='Usertable.php';</script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body { background-color: #f4f6f9; }
        .sidebar { background-color: #dc3545; min-height: 100vh; color: white; position: sticky; top: 0; }
        .sidebar-link { text-decoration: none; color: rgba(255,255,255,0.8); display: block; padding: 12px 20px; transition: 0.3s; font-size: 0.9rem; }
        .sidebar-link i { width: 25px; }
        .sidebar-link:hover, .sidebar-link.active { background: rgba(255,255,255,0.15); color: white; font-weight: bold; border-left: 4px solid white; }
        .main-content { padding: 20px; width: 100%; }
        .card { border: none; border-radius: 15px; }
    </style>
</head>
<body>

<div class="d-flex">
    <?php include('sidebar.php'); ?>

<div class="main-content">
        <div class="container-fluid py-4">
            
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-dark text-white">
                    <h5 class="mb-0"><i class="fa-solid fa-user-plus me-2"></i> Add New User or Admin</h5>
                </div>
                <div class="card-body">
                    <form action="" method="POST" class="row g-3">
                        <div class="col-md-4">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="name" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Location</label>
                            <input type="text" name="location" class="form-control">
                        </div>
                        <div class="col-md-2">
                            <label class="form-label">Role</label>
                            <select name="role" class="form-select">
                                <option value="0">User</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                        <div class="col-md-10">
                            <label class="form-label">Address</label>
                            <input type="text" name="address" class="form-control">
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <button type="submit" name="add_user" class="btn btn-danger w-100">Save</button>
                        </div>
                    </form>
                </div>
            </div>


<div class="card shadow-sm">
                <div class="card-header bg-danger text-white py-3 text-center">
                    <h4 class="mb-0">User & Admin List</h4>
                </div>
                <div class="card-body p-0">
                    <div class="table-responsive">
                        <table class="table table-hover align-middle mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th class="ps-3">ID</th>
                                    <th>User Info</th>
                                    <th>Role</th>
                                    <th>Location</th>
                                    <th>Address</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $res = mysqli_query($conn, "SELECT * FROM USERLIST ORDER BY USER_ID DESC");
                                if ($res && mysqli_num_rows($res) > 0) {
                                    while ($row = mysqli_fetch_assoc($res)) {
                                       
                                        $role_val = isset($row['USER_ROLE']) ? $row['USER_ROLE'] : 0;
                                        
                                        $role_badge = ($role_val == 1) 
                                            ? '<span class="badge bg-primary">Admin</span>' 
                                            : '<span class="badge bg-success">User</span>';
                                        ?>
                                        <tr>
                                            <td class="ps-3">#<?= $row['USER_ID']; ?></td>
                                            <td>
                                                <strong><?= htmlspecialchars($row['USER_NAME']); ?></strong><br>
                                                <small><?= htmlspecialchars($row['USER_EMAIL']); ?></small>
                                            </td>
                                            <td><?= $role_badge; ?></td>
                                            <td><?= htmlspecialchars($row['USER_LOCATION']); ?></td>
                                            <td><?= htmlspecialchars($row['USER_ADDRESS']); ?></td>
                                            <td class="text-center">
                                                <a href="usertable.php?delete=<?= $row['USER_ID']; ?>" 
                                                   class="btn btn-sm btn-outline-danger" 
                                                   onclick="return confirm('Confirm delete?')">
                                                   <i class="fa-solid fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                    }
                                } else {
                                    echo "<tr><td colspan='6' class='text-center py-4'>No users found.</td></tr>";
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

</body>
</html>