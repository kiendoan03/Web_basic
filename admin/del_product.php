<?php
include_once("../config/db.php");
if(isset($_GET['product_id'])){
$sqlCheckDel = "SELECT * FROM product WHERE product_id = ".$_GET['product_id'];
$queryCheckDel = mysqli_query($conn, $sqlCheckDel);
    if(mysqli_num_rows($queryCheckDel) > 0){
    $sqlDel = "DELETE FROM product WHERE product_id =" .$_GET['product_id'];
    mysqli_query($conn, $sqlDel);
    header("location: products.php");
    }
    else{
    header("location: products.php");
    }
}
?>