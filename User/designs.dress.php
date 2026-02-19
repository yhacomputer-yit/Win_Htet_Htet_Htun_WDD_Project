<?php
session_start();
include("../db.php"); 

$cat_res = mysqli_query($conn, "SELECT CAT_ID FROM CATEGORYLIST WHERE CAT_NAME LIKE '%Dress%' LIMIT 1");
$cat_data = mysqli_fetch_assoc($cat_res);
$dress_id = $cat_data['CAT_ID'] ?? 0;

if(isset($_POST['add_to_cart']) || isset($_POST['add_to_cart_ajax'])) {
    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_img = $_POST['product_img'];

    $cart_item = array(
        'id' => $product_id,
        'name' => $product_name,
        'price' => $product_price,
        'img' => $product_img,
        'quantity' => 1
    );

    if(!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array();
    }

    $ids = array_column($_SESSION['cart'], 'id');
    if(!in_array($product_id, $ids)) {
        $_SESSION['cart'][] = $cart_item;
        if(!isset($_POST['add_to_cart_ajax'])) {
            echo "<script>alert('Added to cart!'); window.location.href='designs.dress.php';</script>";
        } else {
            exit("success");
        }
    } else {
        if(!isset($_POST['add_to_cart_ajax'])) {
            echo "<script>alert('Already in cart!');</script>";
        } else {
            exit("already_in_cart");
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Handmade Dresses</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body style="background-color: #fde2e4;">

    <div class="nav-top d-flex justify-content-end align-items-center gap-2 m-3">
        <a href="login.php" class="btn rounded-pill border-0 bg-danger bg-opacity-50 text-dark text-decoration-none px-3">Login</a>
        <a href="signup.php" class="btn rounded-pill border-0 bg-danger bg-opacity-50 text-dark text-decoration-none px-3">Sign up</a>
        <i class="fa-solid fa-user ms-2"></i>
    </div>

    <nav class="navbar navbar-expand-lg bg-white shadow-sm sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="#"><img src="./photo_2025-12-30_10-22-42.jpg" width="80" height="80" class="rounded-circle"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mx-auto nav-underline mb-2 mb-lg-0">
                    <li class="nav-item"><a class="nav-link" href="home.php">Home</a></li>
                    <li class="nav-item"><a class="nav-link" href="about.php">About</a></li>
                    <li class="nav-item"><a class="nav-link active" href="designs.php"><button class="bg-danger bg-opacity-50 rounded-pill px-3 border-0">Designs</button></a></li>
                    <li class="nav-item"><a class="nav-link" href="contactme.php">Contact Me</a></li>
                </ul>
                <a href="shoppingcart.php" class="btn bg-danger bg-opacity-50 rounded-pill px-3 position-relative">
                    <i class="fa-solid fa-cart-shopping"></i>
                    <?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                        <span class="position-absolute top-0 start-100 translate-middle badge rounded-circle bg-dark" style="font-size: 0.7rem;">
                            <?= count($_SESSION['cart']); ?>
                        </span>
                    <?php endif; ?>
                </a>
            </div>
        </div>
    </nav>

    <div class="container-fluid py-4">
        <div class="container bg-danger text-white p-5 rounded-5 shadow-sm">
            <div class="row align-items-center">
                <div class="col-md-7 text-center text-md-start">
                    <h2 class="fw-bold display-6 mb-4 border-bottom border-white d-inline-block pb-2">Handmade Dress Designs</h2>
                    <p class="fs-5 fw-medium lh-base mt-3">Elegant, unique, and thoughtfully handcrafted crochet dresses for your special moments.</p>
                </div>
                <div class="col-md-5 text-center">
                    <img src="./photo_2025-12-31_21-17-41.jpg" class="img-fluid rounded-circle border border-white border-4 shadow" style="width: 250px; height: 250px; object-fit: cover;">
                </div>
            </div>
        </div>
    </div>

    <div class="container py-5">
        <h3 class="text-secondary fw-bold mb-4"><i class="fa-solid fa-shirt"></i> Dress Collection</h3>
        <div class="row g-4">
            <?php
          
            $res = mysqli_query($conn, "SELECT * FROM PRODUCTLIST WHERE CAT_ID = '$dress_id'");
            if(mysqli_num_rows($res) > 0) {
                while($row = mysqli_fetch_assoc($res)) {
            ?>
            <div class="col-md-4 col-sm-6 text-center">
                <form method="POST">
                    <div class="bg-white p-3 rounded-4 shadow-sm h-100 d-flex flex-column">
                        <div class="ratio ratio-1x1 mb-3 overflow-hidden rounded-3 shadow-sm border border-light">
                            <img src="uploads/<?= trim($row['PRO_IMG']); ?>" onerror="this.src='https://via.placeholder.com/300'" class="w-100" style="object-fit: cover;">
                        </div>
                        <h6 class="fw-bold mb-2"><?= $row['PRO_NAME']; ?></h6>
                        
                        <input type="hidden" name="product_id" value="<?= $row['PRODUCT_ID']; ?>">
                        <input type="hidden" name="product_name" value="<?= $row['PRO_NAME']; ?>">
                        <input type="hidden" name="product_price" value="<?= $row['PRO_PRICE']; ?>">
                        <input type="hidden" name="product_img" value="<?= $row['PRO_IMG']; ?>">

                        <div class="mt-auto">
                            <div class="d-flex justify-content-center align-items-center gap-2">
                                <small class="text-muted fw-bold"><?= number_format($row['PRO_PRICE']); ?> ks</small>
                                <button type="submit" name="add_to_cart" class="btn btn-dark btn-sm rounded-pill px-3 py-1">Add To Cart</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
            <?php 
                } 
            } else {
                echo "<div class='col-12 text-center'><p class='text-muted'>No dresses found in this category.</p></div>";
            }
            ?>
        </div>
    </div>

    <div class="container-fluid py-5">
        <div class="container bg-danger-subtle p-5 rounded-5 shadow-sm text-center">
            <h2 class="fw-bold mb-5 border-bottom border-dark d-inline-block pb-2">Something special for you</h2>
            <div class="row justify-content-center g-5">
                <?php
                $special_res = mysqli_query($conn, "SELECT * FROM PRODUCTLIST WHERE IS_SPECIAL = 1 AND CAT_ID = '$dress_id' LIMIT 2");
                while($special_row = mysqli_fetch_assoc($special_res)) {
                ?>
                <div class="col-md-5 col-lg-4">
                    <form class="ajax-cart-form">
                        <div class="d-flex flex-column align-items-center">
                            <div class="mb-3 shadow border border-dark border-2 rounded-5 overflow-hidden" style="width: 250px; height: 250px;">
                                <img src="uploads/<?= trim($special_row['PRO_IMG']); ?>" class="w-100 h-100" style="object-fit: cover;">
                            </div>
                            <h5 class="fw-bold mb-2"><?= $special_row['PRO_NAME']; ?></h5>
                            
                            <input type="hidden" name="product_id" value="<?= $special_row['PRODUCT_ID']; ?>">
                            <input type="hidden" name="product_name" value="<?= $special_row['PRO_NAME']; ?>">
                            <input type="hidden" name="product_price" value="<?= $special_row['PRO_PRICE']; ?>">
                            <input type="hidden" name="product_img" value="<?= $special_row['PRO_IMG']; ?>">
                            <input type="hidden" name="add_to_cart_ajax" value="1">

                            <div class="d-flex align-items-center gap-2 mt-2">
                                <span class="fw-bold"><?= number_format($special_row['PRO_PRICE']); ?> ks</span>
                                <button type="submit" class="btn btn-dark btn-sm rounded-pill px-3">Add To Cart</button>
                            </div>
                        </div>
                    </form>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <footer class="container-fluid p-0 mt-3">
        <div class="row g-0">
            <div class="col-md-6 bg-secondary text-white p-5">
                <p>📧 winhtethtethtun111@gmail.com</p>
                <p>📞 +95 9 788288598</p>
                <p>📍 Yangon, Myanmar.</p>
            </div>
            <div class="col-md-6 bg-black text-white p-5 text-center">
                <p class="fw-bold fs-5 mb-4">Questions and ideas are always welcome.</p>
                <div class="d-flex justify-content-center gap-4 fs-3">
                    <i class="fab fa-facebook"></i>
                    <i class="fab fa-facebook-messenger"></i>
                    <i class="fab fa-telegram"></i>
                    <i class="fab fa-instagram"></i>
                </div>
            </div>
        </div>
    </footer>

    <script>
    document.querySelectorAll('.ajax-cart-form').forEach(form => {
        form.addEventListener('submit', function(e) {
            e.preventDefault();
            let formData = new FormData(this);
            fetch('designs.dress.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.text())
            .then(data => {
                if(data.trim() === "success") {
                    alert('Added to cart!');
                    location.reload();
                } else {
                    alert('Already in cart!');
                }
            });
        });
    });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>