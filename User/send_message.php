<?php
include("../db.php");

if (isset($_POST['send_btn'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);
    $about = mysqli_real_escape_string($conn, $_POST['message']);

    $sql = "INSERT INTO CONTACTME (NAME, EMAIL, PHONE, ADDRESS, ABOUT) 
            VALUES ('$name', '$email', '$phone', '$address', '$about')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Message sent.We will contact you soon.');
                window.location.href='contactme.php';
              </script>";
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>