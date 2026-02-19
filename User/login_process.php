<?php
session_start(); 
include("../db.php"); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = $_POST['password'];

    $sql = "SELECT * FROM USERLIST WHERE USER_EMAIL = '$email'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        
        if (password_verify($password, $row['USER_PASSWORD'])) {
            
            // Session ထဲမှာ အချက်အလက်တွေသိမ်းမယ်
            $_SESSION['user_id'] = $row['USER_ID'];
            $_SESSION['user_name'] = $row['USER_NAME'];
            $_SESSION['user_role'] = $row['USER_ROLE']; // Role ကိုပါ သိမ်းထားမယ်

            // Admin ဖြစ်ခဲ့ရင် Admin Dashboard ကိုသွားမယ်
            if ($row['USER_ROLE'] == 1) {
                echo "<script>alert('Admin Login Success'); window.location='dashboard.php';</script>";
            } else {
                // ရိုးရိုး User ဖြစ်ခဲ့ရင် Home ကိုသွားမယ်
                echo "<script>alert('Login Success'); window.location='home.php';</script>";
            }
        } else {
            echo "<script>alert('Password error'); window.location='login.php';</script>";
        }
    } else {
        echo "<script>alert('No account with this email'); window.location='login.php';</script>";
    }
}
?>