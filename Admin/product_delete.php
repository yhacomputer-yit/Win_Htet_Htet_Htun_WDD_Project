<?php
include("db.php");

if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    $get_img = mysqli_query($conn, "SELECT PRO_IMG FROM PRODUCTLIST WHERE PRODUCT_ID = $id");
    
    if (mysqli_num_rows($get_img) > 0) {
        $img_data = mysqli_fetch_assoc($get_img);
        $file_path = "uploads/" . $img_data['PRO_IMG'];
        
        if (file_exists($file_path)) {
            unlink($file_path);
        }

        $sql = "DELETE FROM PRODUCTLIST WHERE PRODUCT_ID = $id";
        
        if (mysqli_query($conn, $sql)) {
            echo "<script>
                    alert('Product deleted successfully!');
                    window.location.href = document.referrer;
                  </script>";
            exit();
        } else {
            echo "Error deleting record: " . mysqli_error($conn);
        }
    } else {
        echo "<script>alert('Product not found!'); window.location.href = document.referrer;</script>";
    }
}
?>