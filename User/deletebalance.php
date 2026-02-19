<?php
include("../db.php"); 

if (isset($_GET['id'])) {
    $bal_id = intval($_GET['id']);

    $sql = "DELETE FROM BALANCE WHERE BAL_ID = $bal_id";

    if (mysqli_query($conn, $sql)) {

        header("Location: balancelist.php?msg=delete_success");
        exit();
    } else {

        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    header("Location: balancelist.php");
    exit();
}
?>