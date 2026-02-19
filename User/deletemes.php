<?php
include("../db.php");

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM CONTACTME WHERE CONTACT_ID = $id";

    if (mysqli_query($conn, $sql)) {
        header("Location: contactme.php?msg=deleted");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
?>
