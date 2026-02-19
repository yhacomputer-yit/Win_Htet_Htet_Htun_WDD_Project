<?php
include("../db.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name     = mysqli_real_escape_string($conn, $_POST['username']);
    $phone    = mysqli_real_escape_string($conn, $_POST['phone']);
    $email    = mysqli_real_escape_string($conn, $_POST['email']);
    $location = mysqli_real_escape_string($conn, $_POST['location']);
    $address  = mysqli_real_escape_string($conn, $_POST['address']);
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);


    $sql = "INSERT INTO USERLIST (USER_NAME, USER_PHONE, USER_EMAIL, USER_LOCATION, USER_PASSWORD, USER_ADDRESS) 
            VALUES ('$name', '$phone', '$email', '$location', '$hashed_password', '$address')";

    if (mysqli_query($conn, $sql)) {
        echo "<script>
                alert('Sign Up Successful');
                window.location.href='login.php';
              </script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
mysqli_close($conn);
?>