<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $proid = $_POST['proid'];
    $new_qty = $_POST['new_qty'];
    
    $new_subtotal = 0;
    $new_grand_total = 0;

    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as &$item) {
            if ($item['id'] == $proid) {
                $item['quantity'] = $new_qty;
                $new_subtotal = $item['price'] * $new_qty;
            }
            $new_grand_total += ($item['price'] * $item['quantity']);
        }
    }
    echo json_encode([
        'status' => 'success',
        'new_subtotal' => number_format($new_subtotal),
        'new_grand_total' => number_format($new_grand_total)
    ]);
}
?>