<?php
session_start();
$conn = mysqli_connect('localhost', 'root', 'admin123', 'CROCHET');

if(isset($_POST['confirm_order'])) {
    date_default_timezone_set("Asia/Yangon");
    $date = date('Y-m-d H:i:s'); 


    if(isset($_SESSION['user_id'])) {
        $user_id = $_SESSION['user_id'];
    } else {
        echo "<script>alert('အရင်ဆုံး Login ဝင်ပါ'); window.location.href='login.php';</script>";
        exit();
    }
    $totalAmount = 0;
    if(!empty($_SESSION['cart'])) {
        foreach($_SESSION['cart'] as $item) {
            $totalAmount += $item['price'] * $item['quantity'];
        }
    } else {
        echo "<script>alert('No orders yet');</script>";
        exit();
    }

    mysqli_begin_transaction($conn);

    try {
        $sqlOrder = "INSERT INTO ORDERLIST (USER_ID, TOTAL, DATE, STATUS) 
                     VALUES ('$user_id', '$totalAmount', '$date', 'Pending')";
        if(!mysqli_query($conn, $sqlOrder)) {
            throw new Exception("Order သိမ်းဆည်းရာတွင် အမှားအယွင်းရှိနေပါသည်");
        }
        
        $order_id = mysqli_insert_id($conn);

        foreach($_SESSION['cart'] as $item){
            $pro_id = $item['id'];
            $qty    = $item['quantity'];
            $price  = $item['price'];
            $amount = $price * $qty;


            $sqlOP = "INSERT INTO ORDERPRODUCT (ORDERID, PROID, QTY, AMOUNT)
                      VALUES ('$order_id', '$pro_id', '$qty', '$amount')";
            mysqli_query($conn, $sqlOP);

            $balSql = "SELECT BALANCE FROM BALANCE WHERE PROID='$pro_id' ORDER BY BAL_ID DESC LIMIT 1";
            $balRes = mysqli_query($conn, $balSql);
            $currentBalance = ($balRes && mysqli_num_rows($balRes) > 0) ? mysqli_fetch_assoc($balRes)['BALANCE'] : 0;

            if($currentBalance < $qty){
                throw new Exception("Product ID: $pro_id မှာ Stock မလုံလောက်ပါ (လက်ကျန်: $currentBalance)");
            }

   
            $newBalance = $currentBalance - $qty;
            $sqlBal = "INSERT INTO BALANCE (PROID, SALEQTY, INCOMEQTY, BALANCE, DATET)
                       VALUES ('$pro_id', '$qty', '0', '$newBalance', '$date')";
            mysqli_query($conn, $sqlBal);
        }

        mysqli_commit($conn); 
        unset($_SESSION['cart']);
        echo "<script>alert('Orders confirmed'); window.location.href='designs.php';</script>";
        exit();

    } catch(Exception $e) {
        mysqli_rollback($conn); 
        echo "<script>alert('Error: ".$e->getMessage()."');</script>";
    }
}

if (isset($_GET['action']) && $_GET['action'] == 'remove' && isset($_GET['id'])) {
    $remove_id = $_GET['id'];
    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $item) {
            if ($item['id'] == $remove_id) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                break;
            }
        }
    }
    header("Location: shoppingcart.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
</head>
<body>
      <div class="nav-top d-flex justify-content-end align-items-center gap-2 m-3">
    <button id="btn-login" class="btn rounded-pill border-0 bg-danger bg-opacity-50 ">
        <a href="login.php" class="text-decoration-none text-dark">Login</a>
    </button>
    
    <button id="btn-signup" class="btn rounded-pill border-0 bg-danger bg-opacity-50 ">
        <a href="signup.php" class="text-decoration-none text-dark">Sign up</a>
    </button>

    <i class="fa-solid fa-user ms-2"></i>
</div>
     <!-- nav section start -->
     <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"><img src="./photo_2025-12-30_10-22-42.jpg" alt="Bootstrap" width="100" height="100" alt=""></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav nav-underline me-auto mb-2 w-100 justify-content-center ">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="about.php">About</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="designs.php">Designs</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="contactme.php">Contact Me</a>
        </li>     
      </ul>
    </div>
  </div>
</nav>
    <!-- nav section end -->
<!-- main section start -->

<div class="container py-5">
    <h2 class="text-center fw-bold mb-5">Your Cart</h2>
<div class="table-responsive">
        <table class="table align-middle text-center">
            <thead>
                <tr class="border-top border-bottom border-dark">
                    <th scope="col" class="py-3">Items</th>
                    <th scope="col" class="py-3">Price</th>
                    <th scope="col" class="py-3">Quantity</th>
                    <th scope="col" class="py-3">Total</th>
                </tr>
            </thead>
           <tbody>
    <?php 
    $grand_total = 0;
    if(!empty($_SESSION['cart'])) {
        foreach($_SESSION['cart'] as $item) {
            $id = $item['id']; 
            $total = $item['price'] * $item['quantity'];
            $grand_total += $total;
    ?>
    <tr class="border-bottom">
        <td class="py-4 text-start">
            <div class="d-flex align-items-center ms-md-4">
                <img src="uploads/<?= $item['img']; ?>" 
                     style="width: 70px; height: 70px; object-fit: cover;" 
                     class="rounded shadow-sm me-3"
                     onerror="this.src='https://via.placeholder.com/70'">
                <div>
                    <h6 class="mb-0 fw-bold"><?= $item['name']; ?></h6>
                    <small class="text-muted">ID: #<?= $id; ?></small>
                </div>
            </div>
        </td>

        <td class="py-4">
            <span class="text-muted"><?= number_format($item['price']); ?> ks</span>
        </td>

        <td class="py-4" style="min-width: 140px;">
            <div class="input-group input-group-sm justify-content-center mx-auto" style="width: 110px;">
                <button class="btn btn-outline-dark border-secondary-subtle" type="button" onclick="updateQty(<?= $id; ?>, -1)">
                    <i class="fa-solid fa-minus"></i>
                </button>
                
                <input type="text" class="form-control text-center bg-white fw-bold border-secondary-subtle" 
                       id="qty-<?= $id; ?>" value="<?= $item['quantity']; ?>" readonly>
                
                <button class="btn btn-outline-dark border-secondary-subtle" type="button" onclick="updateQty(<?= $id; ?>, 1)">
                    <i class="fa-solid fa-plus"></i>
                </button>
            </div>
        </td>

        <td class="py-4 fw-bold text-dark">
            <span id="subtotal-<?= $id; ?>"><?= number_format($total); ?></span> ks
        </td>

        <td class="py-4">
            <a href="shoppingcart.php?action=remove&id=<?= $id; ?>" 
               class="btn btn-sm btn-outline-danger border-0" 
               onclick="return confirm('Sure to delete?')">
                <i class="fa-solid fa-trash-can fs-5"></i>
            </a>
        </td>
    </tr>
    <?php 
        } 
    } else {
        echo "<tr><td colspan='5' class='py-5 text-muted'>
                <i class='fa-solid fa-cart-ghost fs-1 mb-3 d-block'></i>
                Your cart is empty!
              </td></tr>";
    }
    ?>
</tbody>
</table>
<div class="d-flex justify-content-between align-items-center mt-4 p-3 bg-light rounded shadow-sm">
    <h4>Total Amount: <span class="text-danger fw-bold" id="grandTotal"><?php echo number_format($grand_total); ?></span> MMK</h4>
    <form method="POST">
        <a href="designs.php" class="btn btn-outline-dark rounded-pill px-4">GO to Shopping</a>
        <button name="confirm_order" class="btn btn-danger rounded-pill px-4" <?php echo empty($_SESSION['cart']) ? 'disabled' : ''; ?>>Order Now</button>
    </form>
</div>
<div class="d-flex justify-content-between mt-4">
    <h5 class="fw-bold">Grand Total:</h5>
    <span class="h5 fw-bold"><span id="grandTotal"><?= number_format($grand_total); ?></span> ks</span>
</div>
        </table>
    </div>

</div>
<!-- main section end -->

<!-- footer section start -->
<div class="container-fluid p-0 mt-5">
    <div class="row g-0">
        <div class="col-md-6 bg-secondary text-white p-5 d-flex flex-column justify-content-center">
            <div class="ms-md-5">
                <p class="mb-3">📧 winhtethtethtun111@gmail.com</p>
                <p class="mb-3">📞 +95 9 788288598</p>
                <p class="mb-0">📍 Yangon, Myanmar.</p>
            </div>
        </div>

        <div class="col-md-6 bg-black text-white p-5 text-center d-flex flex-column align-items-center justify-content-center">
            <p class="fw-bold fs-5 mb-4 px-md-5">
                I usually reply within 24 hours. Your questions and ideas are always welcome.
            </p>
            <div class="d-flex gap-4 fs-3 mt-2">
                <i class="bi bi-facebook"></i>
                <i class="bi bi-messenger"></i>
                <i class="bi bi-telegram"></i>
                <i class="bi bi-instagram"></i>
            </div>
        </div>
    </div>
</div>
 <!-- footer section end -->
  <script>
function updateQty(productId, change) {
    let qtyInput = document.getElementById('qty-' + productId);
    let currentQty = parseInt(qtyInput.value);
    let newQty = currentQty + change;

    if (newQty < 1) return;

    let formData = new FormData();
    formData.append('proid', productId);
    formData.append('new_qty', newQty);

    fetch('update_cart_qty.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            qtyInput.value = newQty;
            document.getElementById('subtotal-' + productId).innerText = data.new_subtotal;
            document.querySelectorAll('#grandTotal').forEach(el => {
                el.innerText = data.new_grand_total;
            });
        }
    })
    .catch(err => console.error('Error:', err));
}
</script>
</body>
</html>