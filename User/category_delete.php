<?php
include ("../db.php");

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM CATEGORYLIST WHERE CAT_ID = $id";
    $res = mysqli_query($conn, $sql);
    if($res){
        header("Location: categories.php");
    }
}
?>